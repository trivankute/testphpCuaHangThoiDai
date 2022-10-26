<!-- <input type="file" name="uploadedFile" /> -->
<?php
    include_once("../../vendor/autoload.php");
    include_once("../../globalVariables/index.php");
    include_once("../../model/disk.php");
    use Cloudinary\Api\Upload\UploadApi;
    
    // Get the data from input
    $data = json_decode(file_get_contents("php://input"));
    // Upload the image
    $upload = new UploadApi();
    $result = (new UploadApi())->upload($_FILES['image']["tmp_name"],
    [
        "folder" => "cuahangthoidai/"]);
    // Create a disk
    $disk = new Disk($conn);
    $disk->name = $data->name;
    $disk->title = $data->title;
    $disk->price = $data->price;
    $disk->author = $data->author;
    $disk->img = $result["url"];
    $disk->page = $data->page;
    $disk->rating = $data->rating;
    $disk->create_disk();
?>