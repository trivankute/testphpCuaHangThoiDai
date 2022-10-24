<!-- <input type="file" name="uploadedFile" /> -->
<?php
    include_once("../../vendor/autoload.php");
    include_once("../../globalVariables/index.php");
    use Cloudinary\Api\Upload\UploadApi;

    // Upload the image
    $upload = new UploadApi();
    $result = (new UploadApi())->upload($_FILES['image']["tmp_name"]);
    echo json_encode($result);
?>