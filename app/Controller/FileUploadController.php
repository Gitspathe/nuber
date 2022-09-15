<?php

use \Aws\S3\S3Client;  
use \Aws\Exception\AwsException;

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

        $targetDir = APP_DIR . "/Data/DocumentsUpload/";

        $targetFile = $targetDir . $fileName . "." . $imageFileType;
        $targetFileName = $fileName . "." . $imageFileType;

        // File size limit. (50 MB)
        if ($_FILES[$fileParam]["size"] > 50000000) {
            throw new \Exception("File is too large - maximum 50mb.");
        }
        // File types allowed.
        if($imageFileType != "zip" && $imageFileType != "7z" && $imageFileType != "tar") {
            throw new \Exception("Invalid file type - please upload a zip, 7z or tar archive.");
        }

        if (move_uploaded_file($_FILES[$fileParam]["tmp_name"], $targetFile)) {

            $s3Client = new \Aws\S3\S3Client([
                'region' => 'us-east-1',
		'version' => 'latest',
		'credentials' => [
			'key' => 'AKIAZ5MKJLGKNWUO4LZ7',
			'secret' => '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',
		]
            ]);

            $result = $s3Client->putObject([
                'Bucket' => 'nuber-works-bucket',
                'Key' => $fileName,
                'SourceFile' => $targetFile,
            ]);

            return $targetFileName;
        }
        
        throw new \Exception("An error occured while uploading the file.");
    }

    protected function updateDocumentsCheck($val) {
        $pdo = $this->connect()->prepare("UPDATE users SET user_uploadedDocuments = ? WHERE user_ID = ?;");
        $userID = (int)$_SESSION["user_id"];

        if(!$pdo->execute(array($val, $userID))) {
            $pdo = null;
            throw new \Exception("Database error: " . $pdo->errorInfo());
        }

        $pdo = null;
    }

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;
        $showSuccessMessage = false;

        // User pressed submit files button.
        if(isset($_POST['SubmitButton'])) {
            try {
                $this->handleUpload("documents", (string)$_SESSION["user_id"] . "_documents");
                $this->updateDocumentsCheck(1);
                $_SESSION["user_uploadedDocuments"] = 1;
                $showSuccessMessage = true;
            } catch(\Exception $e) {
                $error = $e->getMessage();
            }
        }
        require_once APP_DIR . '/View/FileUploadView.php';
    }
}
?>
