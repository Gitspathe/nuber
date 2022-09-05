<?php
namespace App\Controller;

require(APP_DIR . "/Model/FileUploadModel.php");

class FileUploadController extends \App\Helper\DatabaseHandler
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\FileUploadModel();
    }

    protected function handleUpload($fileParam, $fileName) 
    {
        // File was not uploaded.
        if($_FILES[$fileParam]["name"] == "") {
            throw new \Exception("No file was uploaded.");
        }

        $originalFileName = basename($_FILES[$fileParam]["name"]);
        $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

        // TODO: Replace this with aws s3 buckets!
        $targetDir = APP_DIR . "/Data/DocumentsUpload/";

        $targetFile = $targetDir . $fileName . "." . $imageFileType;
        $targetFileName = $fileName . "." . $imageFileType;

        // File cannot already exist.
        if (file_exists($targetFile)) {
            throw new \Exception("File already exists.");
        }
        // File size limit. (50 MB)
        if ($_FILES[$fileParam]["size"] > 50000000) {
            throw new \Exception("File is too large - maximum 50mb.");
        }
        // File types allowed.
        if($imageFileType != "zip" && $imageFileType != "7z" && $imageFileType != "tar") {
            throw new \Exception("Only zip, 7z and tar archive uploads are allowed.");
        }

        if (move_uploaded_file($_FILES[$fileParam]["tmp_name"], $targetFile)) {
            return $targetFileName;
        } 
        
       throw new \Exception("An error occured while uploading the file.");
    }

    protected function updateDocumentsCheck($val) {
        $pdo = $this->connect()->prepare("UPDATE users SET user_uploadedDocuments = ? WHERE user_ID = ?;");
        $userID = (int)$_SESSION["user_id"];

        if(!$pdo->execute(array($val, $userID))) {
            $pdo = null;
            throw new \Exception("DATABASE ERROR.");
        }

        $pdo = null;
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;

        // User pressed submit files button.
        if(isset($_POST['SubmitButton'])) {
            try {
                $this->handleUpload("documents", (string)$_SESSION["user_id"] . "_documents");
                $this->updateDocumentsCheck(1);
                $_SESSION["user_uploadedDocuments"] = 1;
                header("location: landing.php");
                exit;
            } catch(\Exception $e) {
                $error = $e->getMessage();
            }
        }

        require_once APP_DIR . '/View/FileUploadView.php';
    }
}
?>