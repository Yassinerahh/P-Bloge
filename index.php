<?php
session_start();
if(isset($_POST['logout'])){
	session_destroy();
	header("Location: login.php");
	exit;
 }
 if(isset($_SESSION['admin'])){
	 $admin = $_SESSION['admin'];
	 echo "<script>alert($admin)</script>";
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

					<li><a href="#">Homepage</a></li>
					<?php 
						if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
							echo "<li><a href='createpost.php'>Create Post</a></li>";
							echo "<li><a href='edit_post.php'>Edit Post</a></li>";
							echo "<li><a href='delete_post.php'>Delete Post</a></li>";
							echo "<li><a href='logout.php'>Log out</a></li>";
						} else {
							echo "<li><a href='login.php'>Login</a></li>";
							echo "<li><a href='register.php'>Register</a></li>";
						}

					?>
					
					<li><a href="#">Page 4</a></li>
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
	<section class="fh5co-top-banner">
		<div class="top-banner__inner site-container">
			<div class="top-banner__image">
				<img src="./images/top-banner-author.jpg" alt="author image">
			</div>
			<div class="top-banner__text">
				<div class="top-banner__text-up">
					<span class="brand-span">Hello! I'm</span>
					<h2 class="top-banner__h2">Yassine</h2>
				</div>
				<div class="top-banner__text-down">
					<h2 class="top-banner__h2">Rahhaoui</h2>
					<span class="brand-span">Programer, Writer, Traveler</span>
				</div>
				<p>One Man. One Mission. Can He Go Beyond?One Man. One Mission. Can He Go Beyond?</p>
				<a href="readmor.php" class="brand-button">Read bio > </a>
			</div>
		</div>
	</section>
	<!-- Top banner end -->

	<!-- About me -->
	<section class="fh5co-about-me">
		<div class="about-me-inner site-container">
			<article class="portfolio-wrapper">
				<div class="portfolio__img">
					<img src="./images/about-me.jpg" class="about-me__profile" alt="about me profile picture">
				</div>
				<div class="portfolio__bottom">
					<div class="portfolio__name">
						<span>Y</span>
						<h2 class="universal-h2">assin Rahhaoui</h2>
					</div>
					<p>Yassine Rahhaoui is a short story author, novelist, and award-winning poet.</p>
				</div>
			</article>

			<div class="about-me__text">
				<div class="about-me-slider">
					<div class="about-me-single-slide">
						<h2 class="universal-h2 universal-h2-bckg">About me</h2>
						<p><span>H</span> e has work appearing or forthcoming in over a dozen venues, including Buzzy
							Mag, The Spirit of Poe, and the British Fantasy Society journal Dark Horizons. He is also
							CEO of a company, specializing in custom book publishing and social media marketing
							services, have created a community for authors to learn and connect.He has work appearing or
							forthcoming in over a dozen venues, including Buzzy Mag, The Spirit of Poe, and have created
							a community for authors to learn and connect.</p>
						<h4>Author</h4>
						<p class="p-white">See me</p>
					</div>
					<div class="about-me-single-slide">
						<h2 class="universal-h2 universal-h2-bckg">About me 2</h2>
						<p><span>H</span> e has work appearing or forthcoming in over a dozen venues, including Buzzy
							Mag, The Spirit of Poe, and the British Fantasy Society journal Dark Horizons. He is also
							CEO of a company, specializing in custom book publishing and social media marketing
							services, have created a community for authors to learn and connect.He has work appearing or
							forthcoming in over a dozen venues, including Buzzy Mag, The Spirit of Poe, and have created
							a community for authors to learn and connect.</p>
						<h4>Author</h4>
						<p class="p-white">See me</p>
					</div>
				</div>
			</div>
		</div>
		<div class="about-me-bckg"></div>
	</section>
	<!-- About me end -->


	<!-- Counter -->
	<div class="fh5co-counter counters">
		<div class="counter-inner site-container">

		</div>
	</div>
	<!-- Counter -->

	<!-- Blog -->
	<section class="fh5co-blog">
		<div class="site-container">
			<h2 class="universal-h2 universal-h2-bckg">My Blog</h2>
			<div class="blog-slider blog-inner">
				<div class="single-blog">
					<div class="single-blog__img">
						<img src="./images/blog1.jpg" alt="blog image">
					</div>
					<div class="single-blog__text">
						<h4>The Journey Under the Waves</h4>
						<span>On August 28, 2015</span>
						<p>Quisque vel sapi nec lacus adipis cing bibendum nullam porta lites laoreet aliquam.velitest,
							tempus a ullamcorper et, lacinia mattis mi. Cras arcu nulla, blandit id cursus et, ultricies
							eu leo.</p>
						<br>
						<a href="readmor.php" class="brand-button">Read mor > </a>
					</div>
				</div>
				<div class="single-blog">
					<div class="single-blog__img">
						<img src="./images/blog2.jpg" alt="blog image">
					</div>
					<div class="single-blog__text">
						<h4>The Journey Under the Waves</h4>
						<span>On August 28, 2015</span>
						<p>Quisque vel sapi nec lacus adipis cing bibendum nullam porta lites laoreet aliquam.velitest,
							tempus a ullamcorper et, lacinia mattis mi. Cras arcu nulla, blandit id cursus et, ultricies
							eu leo.</p>
						<br>
						<a href="readmor.php" class="brand-button">Read mor > </a>
					</div>
				</div>
				<div class="single-blog">
					<div class="single-blog__img">
						<img src="./images/blog2.jpg" alt="blog image">
					</div>
					<div class="single-blog__text">
						<h4>The Journey Under the Waves</h4>
						<span>On August 28, 2015</span>
						<p>Quisque vel sapi nec lacus adipis cing bibendum nullam porta lites laoreet aliquam.velitest,
							tempus a ullamcorper et, lacinia mattis mi. Cras arcu nulla, blandit id cursus et, ultricies
							eu leo.</p>
						<br>
						<a href="readmor.php" class="brand-button">Read mor > </a>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog end -->

	<!-- Quotes -->
	<section class="fh5co-quotes">
		<div class="site-container">
			<div class="about-me-slider">
				<div>
					<h2 class="universal-h2 universal-h2-bckg">What People Are Saying</h2>
					<p>“Pudding croissant cake candy canes fruitcake sweet roll pastry gummies sugar plum. Tart pastry
						danish soufflé donut bear claw chocolate cake marshmallow chupa chups. Jelly danish gummi bears
						cake donut powder chocolate cake. Bonbon soufflé lollipop biscuit dragée jelly-o. Wafer pastry
						pudding tiramisu chocolate bar croissant cake. Pie caramels gummies danish.”</p>
					<img src="./images/quotes.svg" alt="quotes svg">
					<h4>David Dixon</h4>
					<p>Reader</p>
				</div>
				<div>
					<h2 class="universal-h2 universal-h2-bckg">What People Are Saying 2</h2>
					<p>“Pudding croissant cake candy canes fruitcake sweet roll pastry gummies sugar plum. Tart pastry
						danish soufflé donut bear claw chocolate cake marshmallow chupa chups. Jelly danish gummi bears
						cake donut powder chocolate cake. Bonbon soufflé lollipop biscuit dragée jelly-o. Wafer pastry
						pudding tiramisu chocolate bar croissant cake. Pie caramels gummies danish.”</p>
					<img src="./images/quotes.svg" alt="quotes svg">
					<h4>David Dixon</h4>
					<p>Reader</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Quotes end -->

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

</body>

</html>