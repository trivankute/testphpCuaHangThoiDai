<?php
    try{
        include_once("../../vendor/autoload.php");
        include_once("../../globalVariables/index.php");
        include_once("../../model/disk.php");
        $disk = new Disk($conn);
        // get specific disk by name
        $disk->name = isset($_GET["name"]) ? $_GET["name"] : die();
        echo $disk->name;
        $a = "%" . $disk->name . "%";
        $disk->name = $a;
        echo $a;
        $result = $disk->get_one_disk();
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
    }
    catch (\Exception $e) {
        echo json_encode($e);
    }
?>