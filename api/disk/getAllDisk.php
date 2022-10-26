<!-- Get all disks -->
<?php
    include_once("../../vendor/autoload.php");
    include_once("../../globalVariables/index.php");
    include_once("../../model/disk.php");
    $disk = new Disk($conn);
    $result = $disk->get_all_disk();
    $num = $result->rowCount();
    if($num > 0){
        $disks_arr = array();
        $disks_arr["data"] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $disk_item = array(
                "id" => $id,
                "name" => $name,
                "title" => $title,
                "price" => $price,
                "author" => $author,
                "img" => $img,
                "page" => $page,
                "rating" => $rating,
                "type" => $type
            );
            array_push($disks_arr["data"], $disk_item);
        }
        // Turn to JSON & output add status success
        echo json_encode(
            array(
                "status" => "success",
                "data" => $disks_arr
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "error",
                "message" => "No disks found."
            )
        );
    }
?>
