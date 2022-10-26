<!-- <input type="file" name="uploadedFile" /> -->
<?php
    include_once("../../vendor/autoload.php");
    include_once("../../globalVariables/index.php");
    use Cloudinary\Api\Upload\UploadApi;
    
    // Get the data from input
    $data = json_decode(file_get_contents("php://input"));
    // Upload the image
    // $upload = new UploadApi();
    // $result = (new UploadApi())->upload($_FILES['image']["tmp_name"],
    // [
    //     "folder" => "cuahangthoidai/"]);
    // echo json_encode($result);
    echo json_encode("hello");
?>