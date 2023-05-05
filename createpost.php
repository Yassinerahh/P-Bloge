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

    // create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // add a new post
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $image = $_POST['image'];
        $sql = "INSERT INTO posts (title, content, date, image) VALUES ( $title, $content, $date, $image)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $title, $content, $image);
        mysqli_stmt_execute($stmt);
        echo "New post added successfully";
    }

    // display list of posts and allow edit/delete
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
    //     echo "<table><tr><th>Title</th><th>Content</th><th>image</th><th>Actions</th></tr>";
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo "<tr><td>" . $row['title'] . "</td><td>" . $row['content'] . "</td><td>" . $row['image'] . "</td><td><a href='edit_post.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_post.php?id=" . $row['id'] . "'>Delete</a></td></tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "No posts found";
    // }

    // close connection
    mysqli_close($conn);

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
                    session_start();

                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
                        echo "<li><a href='createpost.php'>Create Post</a></li>";
                        echo "<li><a href='edit_post.php'>EditPost</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navigation end -->

    <!-- Top banner -->
    <section class="fh5co-top-banner">
        <div class="top-banner__inner site-container">
            <div class="top-banner__image">

            </div>
        </div>
    </section>
    <!-- Top banner end -->
    <!-- Form -->
    <section class="fh5co-about-me">
        <div class="about-me-inner site-container">

            <h2 class="universal-h2 universal-h2-bckg">Create Post</h2>
            <form action="createpost.php" method="post" class="forme-inline my-2 my-lg-0 ">
                <div>
                    <label for="title">Title:</label>
                    <input type="text" name="title" required class="form-control mr-sm-2" type="search"
                        placeholder="Search" aria-label="Search">
                </div>
                <div>
                    <label for="content">Content:</label>
                    <textarea name="content" rows="10" required></textarea>
                </div>
                <div>
                    <label for="author">Date:</label>
                    <input type="date" name="date" required class="form-control mr-sm-2" type="search"
                        placeholder="Search" aria-label="Search">
                </div>
                <div>
                    <label for="author">image:</label>
                    <input type="file" name="image" required class="form-control mr-sm-2" type="search"
                        placeholder="Search" aria-label="Search">
                </div>
                <input type="submit" value="Create Post">
            </form>

        </div>
        </div>
    </section>
    <!-- Form end -->



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