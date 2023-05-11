<?php
include "app/classes/databaseClass.php";
include "app/classes/registerClass.php"; 

$register = new Register();
$error = "";
$validationError = "";

if(isset($_POST['register'])){

    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    $role = 'user';

    $error = "";
    $validationError = "";

    // Generate a verification key

    if(empty($email) && empty($name) && empty($password) && empty($confirm_password)){
        $error .= "Please make sure to fill in all the boxes <br>";
    }else if(empty($email) || !preg_match("/^([a-zA-Z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $email)){
        $error .= "Please enter a valid email address <br>";
    }else if(strlen($password) < 8){
        $error .= "Password must be at least 8 characters long <br>";
    }else if($password !== $confirm_password){
        $error .= "Passwords do not match <br>";
    }else if(empty($password)){
        $error .= "Please enter a password <br>";
    }else if(empty($confirm_password)){
        $error .= "Please enter a confirmation password <br>";
    }

    if(empty($error)){
        $result = $register->registerUser($name, $email, $password, $confirm_password, $role);

        if($result == 1){
          $validationError .= "Used Email has been already taken! <a href='login.php'> [ Log in with that email. ] </a> <br>";
        }
        
    }
    
}


?>


<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
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
    </style>
    </head>

<body>
    <?php
    echo $validationError;
    echo $error;

    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section universal-h2 universal-h2-bckg">Register</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/top-banner-author.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    <?php if(isset($error)){ echo $error; } ?>

                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="confirm_password">confirm password</label>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="confirm password" required>
                                    <?php if(isset($error)){ echo $error; } ?>

                                </div>

                                <div class="form-group">
                                    <button type="submit" name="register" class="form-control btn btn-primary rounded submit px-3">Sign
                                        Up</button>
                                </div>
                            </form>
                            <p class="text-center">I'am a member? <a href="login.php">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7c1a37a7ec6611a0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>