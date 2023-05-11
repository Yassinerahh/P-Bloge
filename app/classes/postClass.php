<?php

class Post extends Database{

    public function store($title, $body, $image, $date){
        try{          
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO posts (title, content, date, image) VALUES (?, ?, ?, ?)";
            $statement = $this->conn->prepare($sql);
            $statement->execute([$title, $body, $date, $image]);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function getPost(){

        try{
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM posts ORDER BY id DESC";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);

            if(count($result) > 0){
                return $result;

            }else{
                return 0;
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getPostById($id){

        try{
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM posts WHERE id = '$id'";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);

            if(count($result) > 0){
                return $result;

            }else{
                return 0;
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function update($id, $title, $body, $image)
    {

        try {

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE posts SET title = " . $this->conn->quote($title) . ", content = " . $this->conn->quote($body) . ", image = " . $this->conn->quote($image) . " WHERE id = '$id'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $statement->fetchAll(PDO::FETCH_OBJ);

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function delete($id)
    {

        try {

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM posts WHERE id ='$id'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $statement->fetchAll(PDO::FETCH_OBJ);

            header('Location: index.php');

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    }


}