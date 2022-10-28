<!-- <input type="file" name="uploadedFile" /> -->
<?php
    include_once("../../vendor/autoload.php");
    include_once("../../globalVariables/index.php");
    include_once("../../model/disk.php");
    include_once("../../model/author.php");
    use Cloudinary\Api\Upload\UploadApi;
    // create disk
    $disk = new Disk($conn);
    $author = new Author($conn);
    $disk->name = $_POST["name"];

    $disk->title = $_POST["title"];

    $disk->price = $_POST["price"];

    $disk->author = $_POST["author"];

    $disk->type = $_POST["type"];
    
    $disk->page = $_POST["page"];

    $disk->rating = $_POST["rating"];
    if($author->find_authorId_by_name($disk->author)) {
        $disk->authorId = $author->find_authorId_by_name($disk->author);
    } else {
        $author->name = $disk->author;
        if($author->create_author()) {
            $disk->authorId = $author->find_authorId_by_name($disk->author);
        }
        else {
            echo json_encode(["status"=>"error","message" => "author not created"]);
        }
    }
    $result = $disk->create_disk();
    
    if($result) {
        $upload = new UploadApi();
        $result = (new UploadApi())->upload($_FILES['img']["tmp_name"],
        [
            "folder" => "cuahangthoidai/"]
        );
        $disk->img = $result["secure_url"];
        $imageUpload = $disk->update_disk_image();
        echo $imageUpload;
        if($imageUpload) {
            echo json_encode(["status" => "success", "data" => $disk]);
        }
        else {
            echo json_encode(["status" => "error", "message" => "create disk failed"]);
        }
    }
    else {
        echo json_encode(["status" => "error", "message" => "create disk failed"]);
    }
?>