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

   // get the ID of the post to edit
   $id = $_GET['id'];

   // retrieve the existing post data from the database
   $sql = "SELECT * FROM posts WHERE id = :id";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   $post = $stmt->fetch();

   // check if form is submitted
   if(isset($_POST['submit'])){
      // get the updated post data from the form
      $title = $_POST['title'];
      $content = $_POST['content'];
      $category = $_POST['category'];
      $image = $_FILES['image']['name'];

      // handle image upload
      if(!empty($image)){
         $target_dir = "uploads/";
         $target_file = $target_dir . basename($_FILES['image']['name']);
         move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
      }
      else{
         $image = $post['image']; // keep the existing image if no new one is uploaded
      }

      // update the post in the database
      $sql = "UPDATE posts SET title = :title, content = :content, category = :category, image = :image WHERE id = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':content', $content);
      $stmt->bindParam(':category', $category);
      $stmt->bindParam(':image', $image);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      echo "Post updated successfully";
   }
?>
   <h1>Edit Post</h1>
   <form method="post" enctype="multipart/form-data">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>"><br>

      <label for="content">Content:</label>
      <textarea id="content" name="content"><?php echo $post['content']; ?></textarea><br>

      <label for="category">Category:</label>
      <input type="text" id="category" name="category" value="<?php echo $post['category']; ?>"><br>

      <label for="image">Image:</label>
      <input type="file" id="image" name="image"><br>

      <img src="uploads/<?php echo $post['image']; ?>" width="200"><br>

      <input type="submit" name="submit" value="Save Changes">
   </form>
<?php
}
else{
   echo "You are not authorized to view this page.";
}
?>
