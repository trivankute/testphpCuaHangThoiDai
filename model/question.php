<?php
    class Question{
        public $id_cauhoi;
        public $title;
        public $cau_a;
        public $cau_b;
        public $cau_c;
        public $cau_d;
        public $cau_dung;
        public $userId;
        public $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function read()
        {
            $query = "SELECT * FROM question";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        public function show()
        {
            $query = "SELECT * FROM question WHERE id_cauhoi=? LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1,$this->id_cauhoi);
            $stmt->execute();
            
            $read = $stmt;
            $num = $read->rowCount();
            if($num>0)
            {
                $row = $read->fetch(PDO::FETCH_ASSOC);
                $this->id_cauhoi = $row["id_cauhoi"];
                $this->title = $row["title"];
                $this->cau_a = $row["cau_a"];
                $this->cau_b = $row["cau_b"];
                $this->cau_c = $row["cau_c"];
                $this->cau_d = $row["cau_d"];
                $this->cau_dung = $row["cau_dung"];
                $this->userId = $row["userId"];
            }
            else {                
                echo json_encode(["status"=>"error", "message"=>"Your quiz is not existed."]);
                die();
            }
        }
        public function create()
        {
            $query = "INSERT INTO question (title,cau_a,cau_b,cau_c,cau_d,cau_dung,userId)
            VALUES (:title,:cau_a,:cau_b,:cau_c,:cau_d,:cau_dung,:userId)
            ";
            // clean Data
                $this->title = htmlspecialchars(strip_tags($this->title));
                $this->cau_a = htmlspecialchars(strip_tags($this->cau_a));
                $this->cau_b = htmlspecialchars(strip_tags($this->cau_b));
                $this->cau_c = htmlspecialchars(strip_tags($this->cau_c));
                $this->cau_d = htmlspecialchars(strip_tags($this->cau_d));
                $this->cau_dung = htmlspecialchars(strip_tags($this->cau_dung));
                $this->userId = htmlspecialchars(strip_tags($this->userId));
            // pump data
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":cau_a",$this->cau_a);
            $stmt->bindParam(":cau_b", $this->cau_b);
            $stmt->bindParam(":cau_c", $this->cau_c);
            $stmt->bindParam(":cau_d", $this->cau_d);
            $stmt->bindParam(":cau_dung", $this->cau_dung);
            $stmt->bindParam(":userId", $this->userId);

            if($stmt->execute())
            {
                return true;
            }
            else
            {
                printf("Error %s\n", $stmt->error);
                return false;
            }
        }
        public function update($whoDeleteId)
        {
            // Check Exist
            $query = "SELECT * FROM question WHERE id_cauhoi=:id_cauhoi LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_cauhoi", $this->id_cauhoi);
            $stmt->execute();
            $read = $stmt;
            $num = $read->rowCount();
            if($num==0){
                echo json_encode(["status"=>"error", "message"=>"Your quiz is not existed."]);
                die();
            }
            // Check author
            $query = "SELECT * FROM question WHERE userId=:userId LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":userId", $whoDeleteId);
            $stmt->execute();
            $read = $stmt;
            $num = $read->rowCount();
            if($num==0){
                echo json_encode(["status"=>"error", "message"=>"This post is not in your ownership"]);
                die();
            }
            // Update
            $query = "UPDATE question 
            SET title=:title, cau_a=:cau_a, cau_b=:cau_b, cau_c=:cau_c, cau_d=:cau_d, cau_dung=:cau_dung
            WHERE id_cauhoi=:id_cauhoi";
            $stmt = $this->conn->prepare($query);
            $this->id_cauhoi = htmlspecialchars(strip_tags($this->id_cauhoi));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->cau_a = htmlspecialchars(strip_tags($this->cau_a));
            $this->cau_b = htmlspecialchars(strip_tags($this->cau_b));
            $this->cau_c = htmlspecialchars(strip_tags($this->cau_c));
            $this->cau_d = htmlspecialchars(strip_tags($this->cau_d));
            $this->cau_dung = htmlspecialchars(strip_tags($this->cau_dung));
            $stmt->bindParam(":id_cauhoi", $this->id_cauhoi);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":cau_a",$this->cau_a);
            $stmt->bindParam(":cau_b", $this->cau_b);
            $stmt->bindParam(":cau_c", $this->cau_c);
            $stmt->bindParam(":cau_d", $this->cau_d);
            $stmt->bindParam(":cau_dung", $this->cau_dung);
            if($stmt->execute())
            {
                echo json_encode(["message" => "question ".$this->id_cauhoi." updated successfully"]);
            }
            else
            {
                printf("Error %s\n", $stmt->error);
                echo json_encode(["message" => "question ".$this->id_cauhoi." could not be updated"]);
            }
        }
        public function delete($whoDeleteId) {
            // Check Exist
            $query = "SELECT * FROM question WHERE id_cauhoi=:id_cauhoi LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_cauhoi", $this->id_cauhoi);
            $stmt->execute();
            $read = $stmt;
            $num = $read->rowCount();
            if($num==0){
                echo json_encode(["status"=>"error", "message"=>"Your quiz is not existed."]);
                die();
            }
            // Check author
            $query = "SELECT * FROM question WHERE userId=:userId LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":userId", $whoDeleteId);
            $stmt->execute();
            $read = $stmt;
            $num = $read->rowCount();
            if($num==0){
                echo json_encode(["status"=>"error", "message"=>"This post is not in your ownership"]);
                die();
            }
            // DELETE
            $query = "DELETE FROM question 
            WHERE id_cauhoi=:id_cauhoi AND userId=:userId";
            $stmt = $this->conn->prepare($query);
            $this->id_cauhoi = htmlspecialchars(strip_tags($this->id_cauhoi));
            $stmt->bindParam(":id_cauhoi", $this->id_cauhoi);
            $stmt->bindParam(":userId", $whoDeleteId);
            if($stmt->execute())
            {
                echo json_encode(["status"=>"success","message" => "question ".$this->id_cauhoi." deleted successfully"]);
            }
            else
            {
                echo json_encode(["status"=>"error","message" => "question ".$this->id_cauhoi." could not be deleted"]);
            }
        }
    }
?>