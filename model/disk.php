<?php
    include_once('./author.php');
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

        public function __construct($conn = null)
        {
            $this->conn = $conn;
        }
        public function create_disk()
        {
            
            $query = "INSERT INTO disk (name, title, price, author, authorId, img, page, rating) VALUES (:name, :title, :price, :author, :authorId, :img, :page, :rating)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":author", $this->author);
            $authorId = Author::find_author_by_name($this->author);
            $stmt->bindParam(":authorId", $authorId);
            $stmt->bindParam(":img", $this->img);
            $stmt->bindParam(":page", $this->page);
            $stmt->bindParam(":rating", $this->rating);
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
    }
?>