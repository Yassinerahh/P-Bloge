<?php
include "app/classes/databaseClass.php";
include "app/classes/postClass.php"; 

session_start();
$post = new Post();

$image = '';
$title = '';
$content = '';
$date = '';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $result = $post->getPostById($id );

    if($result){
        $image = $result[0]->image;
        $title = $result[0]->title;
        $content = $result[0]->content;
        $date = $result[0]->date;
    }
}

if(isset($_POST['delete'])){

    $post->delete($id);
}

?>

<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slick.css">
    <title>Blog</title>

    <style>
        .burger-btn{
            background: transparent;
            border: none;
            color: white;
            font-size: x-large;
            font-weight: 600;
        }
        .burger-btn:hover {
            color: #777;
        }
      
      

    </style>

</head>
<body>
    <!-- Navigation -->
	<nav class="site-navigation">
		<div class="site-navigation-inner site-container">
			<img src="./images/YR_Programer.png" alt="site logo">
			<div class="main-navigation">
				<ul class="main-navigation__ul">

                <li><a href='index.php'>Homepage</a></li>
					<?php 
						if(isset($_SESSION['user_rank']) && $_SESSION['user_rank'] == 'admin') {
							echo "<li><a href='createpost.php'>Create Post</a></li>";

							echo "
							<form method='post' action=''>
							<li><button type='submit' class='burger-btn' name='logout'>Log out</button></li>
							
							</form>
							";
						} else {
							echo "<li><a href='login.php'>Login</a></li>";
							echo "<li><a href='register.php'>Register</a></li>";
						}

					?>
					
					
				</ul>
			</div>
			<div id="myBtn" class="burger-container" onclick="myFunction(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
			<script>
				function myFunction(x) {
					x.classList.toggle("change");
				}
			</script>

		</div>
	</nav>
    <!-- Navigation end -->

    <!-- Top banner -->
    <section class="fh5co-top-banner " style='padding-bottom: 60px;'>
        <div class="top-banner__inner site-container">
            <div class="top-banner__image">
                <?php
                            # code...
                    echo "<img src='" . $image . "' alt='author image' style='width: 600px; height: 400px; object-fit: cover;'> ";
                    echo "</div>";
                    echo "<div class='top-banner__text'>";
                    echo "<div class='top-banner__text-up'>";
                    echo "<h3 class='top-banner__h2'>" . $title . "</h3>";
                    echo "<span class='brand-span'>" . $date . "</span>";
                    echo "<p>" . $content . "</p>";
                ?>
            </div>
            <br>

            <?php

                if ($result){

                    if (isset($_SESSION['user_rank']) && $_SESSION['user_rank'] == 'admin') {
                        echo "<div style='display:inline-block;'>
                                <a href='edit_post.php?id=".urlencode($id)."&title=".urlencode($title)."&content=".urlencode($content)."&image=".urlencode($image)."' class='brand-button'>Edit</a>
                                <form action='' method='POST' style='display:inline-block;'>
                                    <button type='submit' name='delete' class='brand-button'>Delete</button>
                                </form>
                              </div>";
                    }
                    
                    
                }
                    
            ?>

        </div>
        <br>
    </section>
    <!-- Top banner end -->
    <!-- Social -->
    <section class="fh5co-social">
        <div class="site-container">
            <div class="social">
                <h5>Follow me!!</h5>
                <div class="social-icons">
                    <a href="#" target="_blank"><img src="./images/social-twitter.png" alt="social icon"></a>
                    <a href="#" target="_blank"><img src="./images/social-pinterest.png" alt="social icon"></a>
                    <a href="#" target="_blank"><img src="./images/social-youtube.png" alt="social icon"></a>
                    <a href="#" target="_blank"><img src="./images/social-twitter.png" alt="social icon"></a>
                </div>
                <h5>Share it!</h5>
            </div>
        </div>
    </section>
    <!-- Social -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="site-container">
            <div class="footer-inner">
                <div class="footer-info">
                    <div class="footer-info__left">
                        <img src="./images/footer-img.jpg" alt="about me image">
                        <p>Read more about me</p>
                    </div>
                    <div class="footer-info__right">
                        <h5>Get In Touch</h5>
                        <p class="footer-phone">Phone: +212612345678</p>
                        <p>Email : Yassine@Example.com</p>
                        <div class="social-icons">
                            <a href="#" target="_blank"><img src="./images/social-twitter.png" alt="social icon"></a>
                            <a href="#" target="_blank"><img src="./images/social-pinterest.png" alt="social icon"></a>
                            <a href="#" target="_blank"><img src="./images/social-youtube.png" alt="social icon"></a>
                            <a href="#" target="_blank"><img src="./images/social-twitter.png" alt="social icon"></a>
                        </div>
                    </div>
                </div>
                <div class="footer-contact-form">
                    <h5>Contact Form</h5>
                    <form class="contact-form">
                        <div class="contact-form__input">
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <textarea></textarea>
                        <input type="submit" name="submit" value="Submit" class="submit-button">
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->
    <!-- Scripts -->
    <script src="js/jquery1.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main1.js"></script>

    <script src="script.js"></script>
</body>

</html>