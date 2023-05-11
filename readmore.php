<?php
include "app/classes/databaseClass.php";
include "app/classes/postClass.php"; 
session_start();
$post = new Post();

$result = $post->getPost();

if(isset($_POST['delete'])){

    $id = $_POST['post_id'];

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
							echo "<li><a href='edit_post.php'>Edit Post</a></li>";
							echo "<li><a href='delete_post.php'>Delete Post</a></li>";

							echo "
							<form method='post' action=''>
							<li><button type='submit' name='logout'>Log out</button></li>
							
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
                    if ($result) {

                        
                            # code...
                            echo "<img src='" . $result[0]->image . "' alt='author image' style='width: 600px; height: 400px; object-fit: cover;'> ";
                            

                            echo "</div>";
                            echo "<div class='top-banner__text'>";
                            echo "<div class='top-banner__text-up'>";
                            echo "<h3 class='top-banner__h2'>" . $result[0]->title . "</h3>";
                            echo "<span class='brand-span'>" . $result[0]->date . "</span>";
                            echo "<p>" . $result[0]->content . "</p>";
                    }
                ?>
            </div>
            <br>

            <?php

                if ($result){

                    if(isset($_SESSION['user_rank']) && $_SESSION['user_rank'] == 'admin'){
                        $id = $result[0]->id;
                        echo "
                        <a href='show_post.php?id=$id' class='brand-button'> read more </a>
                        ";
                    }
                }
            ?>

        </div>
        <br>
        </div>
        <br>
    </section>
    <!-- Top banner end -->



    <!--Blog -->
    <section class="fh5co-blog">
        <div class="site-container">
            <h2 class="universal-h2 universal-h2-bckg">My Blog</h2>
            <div class="blog-slider blog-inner">

            <?php

                foreach ($result as $value) {
                    # code...
                    $image = $value->image;
                    $title = $value->title;
                    $content = $value->content;
                    $date = $value->date;
                    $id = $value->id;

                    echo "
                    <div class='single-blog'>
                        <div class='single-blog__img'>
                            <img src='$image' alt='blog image' style='width: 300px; height: 380px; object-fit: cover;'>
                        </div>
                        <div class='single-blog__text'>
                            <h4>$title</h4>
                            <span>$date</span>
                            <p>$content</p>
                            <br>
                            <a href='show_post.php?id=$value->id' class='brand-button'>Read mor > </a>
                        </div>
                    </div>";
                }
    
            ?>
            </div>
        </div>
    </section>
    <!-- Blog end -->


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