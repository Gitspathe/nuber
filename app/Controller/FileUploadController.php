<?php
namespace App\Controller;

require(APP_DIR . '/Model/FileUploadModel.php');

class FileUploadController
{
    private $model;

    public function __construct() 
    {
        $this->model = new \App\Model\FileUploadModel();
    }

    function handleImageUpload($fileParam, $fileName) 
    {
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

    public function output()
    {
        $model = $this->model;
        $controller = $this;
        $error = null;

        require_once APP_DIR . '/View/FileUploadView.php';
    }
}
?>