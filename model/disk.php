<?php
    class Disk {
        public $id;
        public $name;
        public $title;
        public $price;
        public $author;
        public $authorId;
        public $img;
        public $page;
        public $rating;
        public $type;
        public $conn;

        public function __construct($conn = null)
        {
            $this->conn = $conn;
        }
        public function create_disk()
        {
            
            $query = "INSERT INTO disks (name, title, price, author, authorId, img, page, rating,type) VALUES (:name, :title, :price, :author, :authorId, :img, :page, :rating,:type)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":author", $this->author);
            $stmt->bindParam(":authorId", $this->authorId);
            $stmt->bindParam(":img", $this->img);
            $stmt->bindParam(":page", $this->page);
            $stmt->bindParam(":rating", $this->rating);
            $stmt->bindParam(":type", $this->type);
            try {
                if($stmt->execute()) {
                    echo json_encode(["status"=>"success", "message"=>"disk created successfully"]);
                }
            } catch(exception $e)
            {
                printf("%s\n", $e);
                echo json_encode(["status"=>"error","message" => $e]);   
            }
        }
        public function get_all_disk()
        {
            $query = "SELECT * FROM disks";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        public function get_one_disk()
        {
            $query="SELECT * FROM disks WHERE name LIKE :name";
            echo $query;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->execute();
            return $stmt;
        }









        

    }
?>