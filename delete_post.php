<?php
session_start(); // start the session

// check if user is logged in as an admin
if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true){

   // connect to database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "pblog";

   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
   }
   catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
   }

   // get the ID of the post to delete
   $id = $_GET['id'];

   // retrieve the existing post data from the database
   $sql = "SELECT * FROM posts WHERE id = :id";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   $post = $stmt->fetch();

   // delete the post from the database
   $sql = "DELETE FROM posts WHERE id = :id";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   echo "Post deleted successfully";
?>
   <h1>Delete Post</h1>
   <p>Are you sure you want to delete the following post?</p>
   <h2><?php echo $post['title']; ?></h2>
   <p><?php echo $post['content']; ?></p>
   <img src="uploads/<?php echo $post['image']; ?>" width="200"><br>
   <form method="post">
      <input type="submit" name="delete" value="Delete">
      <a href="index.php">Cancel</a>
   </form>
<?php
}
else{
   echo "You are not authorized to view this page.";
}
?>
