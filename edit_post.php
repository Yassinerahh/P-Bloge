<?php

include "app/classes/databaseClass.php";
include "app/classes/postClass.php";
session_start();
$post = new Post();

$id = "";
$title = "";
$body = "";
$image = "";

if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $title = urldecode($_GET['title']);
    $body = urldecode($_GET['content']);
    $image = urldecode($_GET['image']);
}

if (isset($_POST['edit'])) {

    if (isset($_GET['id'])) {
        $id = trim($_GET['id']);
    }

    $title = trim($_POST['title']);
    $body = trim($_POST['body']);
    $image = "";

    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_path = "app/uploads/" . $image_name;
        move_uploaded_file($image_tmp_name, $image_path);
        $image = $image_path;
    }

    if (empty($error)) {
        $post->update($id, $title, $body, $image);
        header("Location: index.php");
        exit();
    }
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
    <title>Personal Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <script
        nonce="750cdfa3-9541-41b3-8dae-fa0a095d3d95">(function (w, d) { !function (dk, dl, dm, dn) { dk[dm] = dk[dm] || {}; dk[dm].executed = []; dk.zaraz = { deferred: [], listeners: [] }; dk.zaraz.q = []; dk.zaraz._f = function (dp) { return function () { var dq = Array.prototype.slice.call(arguments); dk.zaraz.q.push({ m: dp, a: dq }) } }; for (const dr of ["track", "set", "debug"]) dk.zaraz[dr] = dk.zaraz._f(dr); dk.zaraz.init = () => { var ds = dl.getElementsByTagName(dn)[0], dt = dl.createElement(dn), du = dl.getElementsByTagName("title")[0]; du && (dk[dm].t = dl.getElementsByTagName("title")[0].text); dk[dm].x = Math.random(); dk[dm].w = dk.screen.width; dk[dm].h = dk.screen.height; dk[dm].j = dk.innerHeight; dk[dm].e = dk.innerWidth; dk[dm].l = dk.location.href; dk[dm].r = dl.referrer; dk[dm].k = dk.screen.colorDepth; dk[dm].n = dl.characterSet; dk[dm].o = (new Date).getTimezoneOffset(); if (dk.dataLayer) for (const dy of Object.entries(Object.entries(dataLayer).reduce(((dz, dA) => ({ ...dz[1], ...dA[1] }))))) zaraz.set(dy[0], dy[1], { scope: "page" }); dk[dm].q = []; for (; dk.zaraz.q.length;) { const dB = dk.zaraz.q.shift(); dk[dm].q.push(dB) } dt.defer = !0; for (const dC of [localStorage, sessionStorage]) Object.keys(dC || {}).filter((dE => dE.startsWith("_zaraz_"))).forEach((dD => { try { dk[dm]["z_" + dD.slice(7)] = JSON.parse(dC.getItem(dD)) } catch { dk[dm]["z_" + dD.slice(7)] = dC.getItem(dD) } })); dt.referrerPolicy = "origin"; dt.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(dk[dm]))); ds.parentNode.insertBefore(dt, ds) };["complete", "interactive"].includes(dl.readyState) ? zaraz.init() : dk.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>
    <style>
        @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

        .info-msg,
        .success-msg,
        .warning-msg,
        .error-msg {
            margin: 10px 0;
            padding: 10px;
            border-radius: 3px 3px 3px 3px;
        }

        .info-msg {
            color: #059;
            background-color: #BEF;
        }

        .success-msg {
            color: #270;
            background-color: #DFF2BF;
        }

        .warning-msg {
            color: #9F6000;
            background-color: #FEEFB3;
        }

        .error-msg {
            color: #D8000C;
            background-color: #FFBABA;
        }

        .burger-btn {
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
                            if (isset($_SESSION['user_rank']) && $_SESSION['user_rank'] == 'admin') {
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
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section universal-h2 universal-h2-bckg">Edit Post</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class=" w-100 wrap d-md-flex justify-content-center">

                        <div class="w-100 login-wrap p-4 p-md-5">
                            <div class="w-100 d-flex">

                                <form method="post" action="" class="w-100 signin-form" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Title</label>
                                        <input type="text" class=" form-control" name="title"
                                            value="<?php echo $title; ?>" placeholder="title" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="label" for="email">Body</label>
                                        <textarea name="body" id="" cols="30" rows="10" class="form-control"
                                            style="resize:none;"><?php echo $body; ?></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="label" for="password">Image</label>
                                        <?php if (!empty($image)): ?>
                                            <input type="file" class="form-control" name="image"
                                                value="<?php echo $image; ?>" placeholder="Password" required>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="edit"
                                            class="form-control btn btn-primary rounded submit px-3">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                </div>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7c1a37a7ec6611a0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
        crossorigin="anonymous"></script>

    <script src="script.js"></script>
</body>

</html>