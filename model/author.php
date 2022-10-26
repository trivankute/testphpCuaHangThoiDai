<?php
    class Author {
        public $id;
        public $name;
        public $conn;
        
        public function __construct($conn = null)
        {
            $this->conn = $conn;
        }
        public function create_author()
        {
            $query = "INSERT INTO author (name) VALUES (:name)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            try {
                if($stmt->execute()) {
                    echo json_encode(["status"=>"success", "message"=>"author created successfully"]);
                }
            } catch(exception $e)
            {
                printf("%s\n", $e);
                echo json_encode(["status"=>"error","message" => $e]);   
            }
        }

        public function find_authorId_by_name($name) {
            $query = "SELECT * FROM author WHERE name=:name";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            if($rowCount==0){
                return false;
            }
            else
            {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row["id"];
            }
        }
        
    }
?>