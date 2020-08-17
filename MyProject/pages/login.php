<?php
    session_start();
    if(isset($_SESSION['TOKEN'])){
        if(strlen($_SESSION['TOKEN'])==128){
            header('Refresh: 0; URL=profile.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Font-icon-->
    <script src="https://kit.fontawesome.com/0496651f2b.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link href="../src/scss/login.css" rel="stylesheet">
    <!--JQuery-->
    <script src="../src/library/JQuery/jQuery.js"></script>
    <!--JS-->
    <script src="../src/js/Login/inputAnimation.js"></script>
</head>
<body>
    <?php
        include "../src/php/funcCheckInput.php";
        $token = "";
        $email = "";
        $passWord = "";
        $msg = "";
        if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $passWord = $_POST['password'];
            if(checkLogin($_POST['email']) && checkLogin($_POST['password'])){
                $severname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "myDataBase";
                $connet = new mysqli($severname,$username,$password,$dbname);
                $sql = "";
                if(preg_match("/@/",$email)){
                    $sql = "SELECT TOKEN,EMAIL,PASSWORD FROM USER WHERE EMAIL="."'".$email."'"." AND PASSWORD="."'".$passWord."'";

                }else{
                    $sql = "SELECT TOKEN,USERNAME,PASSWORD FROM USER WHERE USERNAME="."'".$email."'"." AND PASSWORD="."'".$passWord."'";
                }
                $result = $connet->query($sql);
                if($result->num_rows ==1){
                    if(!empty($_POST['checkbox'])){
                        if(empty($_COOKIE['email']) || empty($_COOKIE['password'])){
                            setcookie("email", $email, time()+3600, "/","", 0);
                            setcookie("password", $passWord, time()+3600, "/","", 0);
                        }else{
                            $_COOKIE['email'] = $email;
                            $_COOKIE['email'] = $passWord;
                        }
                    }else{
                        if(!empty($_COOKIE['email']) && !empty($_COOKIE['password'])){
                            setcookie("email","", time()-60, "/","", 0);
                            setcookie("password","", time()-60, "/","", 0);
                        }
                    }
                    $row = $result->fetch_assoc();
                    $_SESSION['TOKEN'] =$row['TOKEN'];
                    $msg = "<p class='msg text-success text-center' style='font-size: 0.8rem'>Đăng nhập thành công</p>";
                    header('Refresh: 0; URL=profile.php');
                }else{
                    $msg = "<p class='msg text-danger text-center' style='font-size: 0.8rem'>Mật khẩu hoặc tài khoản không đúng</p>";
                }
            }else{
                if(checkLogin($_POST['email'])){
                    $msg = "<p class='msg text-danger text-center' style='font-size: 0.8rem'>Mật khẩu không đúng</p>";
                }else{
                    $msg = "<p class='msg text-danger text-center' style='font-size: 0.8rem'>Không đúng định dạng Username hoặc Email</p>";
                }
            }
        }
//        else{
//            $msg = "<p class='msg text-warning text-center' style='font-size: 0.8rem'>Bạn hãy nhập đầy đủ thông tin vào đây</p>";
//        }
    ?>
    <section class="main">
        <div class="main__wrapper">
            <div class="main__row row">
                <div class="main__container col-xl-8 col-11 shadow-lg">
                    <div class="main__content row">
                        <div class="main__left col-lg-6 col-md-6 p-4">
                            <div class="main__welcome p-4">
                                <h3 class="text-center mt-3">Welcome Back</h3>
                            </div>
                            <div class="main__gg my-4">
                                <a href="#" class="main__gg-link text-center">
                                    <i class="main__gg-icon fab fa-google"></i>
                                    <span>Google</span>
                                </a>
                            </div>
                            <p class="text-secondary text-center" style="font-size: 0.8rem;">OR LOGIN WITH EMAIL</p>
                            <div class="main__form mb-4">
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="text" class="main__label" id="labelEmail">EMAIL OR USERNAME</label>
                                        <input type="text" class="form-control main__input" placeholder="Email or Username"
                                               id="email" name="email" required
                                               value="<?php
                                                   if(!empty($_COOKIE['email'])){
                                                       echo $_COOKIE['email'];
                                                   }
                                               ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="main__label"  id="labelPwd">PASSWORD</label>
                                        <input type="password" class="form-control main__input" placeholder="Password"
                                               id="password" name="password"  required
                                               value="<?php
                                                if(!empty($_COOKIE['password'])){
                                                    echo $_COOKIE['password'];
                                                }
                                                ?>">
                                    </div>
                                    <div class="form-group form-check d-flex justify-content-between" style="font-size: 0.9rem;">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="checkbox"> Remember me
                                        </label>
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                    <?php echo $msg;?>
                                    <div class="main__btn d-flex justify-content-center">
                                        <button type="submit" class="btn text-light main__btn-login" name="login" id="login">
                                            Login
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="main__signup d-flex justify-content-center pt-3" style="font-size:0.9rem;">
                                <p class="pr-2">Don't have an account?</p>
                                <a href="./register.php">Sign up</a>
                            </div>
                        </div>
                        <div class="main__right col-lg-6 col-md-6">
                            <img src="../src/img/login/logo.png" width="100%" class="d-none d-md-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>