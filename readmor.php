<?php
session_start(); // start the session

// check if user is logged in as an admin
if (isset($_SESSION['admin']) && $_SESSION['admin'] === "admin") {
    // allow access to admin-only content

    // connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pblog";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // add a new post
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $sql = "INSERT INTO posts (title, content, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $title, $content, $image);
        $stmt->execute();
        echo "New post added successfully";
    }

    // display list of posts and allow edit/delete
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     echo "<table><tr><th>Title</th><th>Content</th><th>image</th><th>Actions</th></tr>";
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr><td>" . $row['title'] . "</td><td>" . $row['content'] . "</td><td>" . $row['image'] . "</td><td><a href='edit_post.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_post.php?id=" . $row['id'] . "'>Delete</a></td></tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "No posts found";
    // }

} else {
    // redirect to login page or show an error message
    echo "You do not have access to this page.";
}

// destroy the session when user logs out
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
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
                   

                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
                        echo "<li><a href='createpost.php'>Create Post</a></li>";
                        echo "<li><a href='edit_post.php'>Edit Post</a></li>";
                        echo "<li><a href='delete_post.php'>Delete Post</a></li>";
                        echo "<li><a href='logout.php'>Log out</a></li>";
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='register.php'>Register</a></li>";
                    }

                    ?>
                </ul>
            </div>
            </a>

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
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<img src='" . $img['image'] . "' alt='author image'>";
                            echo "</div>";
                            echo "<div class='top-banner__text'>";
                            echo "<div class='top-banner__text-up'>";
                            echo "<h3 class='top-banner__h2'>" . $row['title'] . "</h3>";
                            echo "<span class='brand-span'>" . $row['date'] . "</span>";
                            echo "<p>" . $row['content'] . "</p>";
                        }
                    }
                ?>
            </div>

            <a href="#" class="brand-button">Read mor > </a>
            <?php

            ?>
        </div>
        </div>
    </section>
    <!-- Top banner end -->



    <!--Blog -->
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