<?php
session_start();
if(isset($_SESSION['TOKEN'])){
    if(strlen($_SESSION['TOKEN'])>1){
        header('Location:profile.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
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
    <link rel="stylesheet" href="../src/scss/forgotpwd.css">
    <!--JQuery-->
    <script src="../src/library/JQuery/jQuery.js"></script>
    <!--JS-->
</head>
<body>
    <?php
        include "../src/php/connectDB.php";
        include "../src/php/sendEmail.php";
        $msg = "";
        $check = false;
        if(isset($_POST['send']) && !empty($_POST['email'])){
            $connet = connetDataBase();
            $sql = sqlDataBase("TOKEN","EMAIL",$_POST['email']);
            $result = $connet->query($sql);
            if($result->num_rows >0){
                $row = $result->fetch_assoc();
                if(sendEmailToken($_POST['email'],$row['TOKEN'])){
                    $check = true;
                    $msg = "Check your email for a link to reset your password. If it doesn’t appear within a few minutes, check your spam folder.";
                }else{
                    $check = false;
                    $msg="That address is not a verified primary email or is not associated with a personal user account. Organization billing emails are only for notifications";
                }
            }else{
                $check = false;
                $msg="That address is not a verified primary email or is not associated with a personal user account. Organization billing emails are only for notifications";
            }
        }
    ?>
    <section class="main">
        <div class="main__wrapper">
            <div class="main__row row">
                <div class="main__container col-xl-8 col-11 shadow-lg">
                    <div class="main__content row">
                        <form method="POST" class="main__form">
                            <div class="form-group">
                                <label for="email" class="main__label"  id="labelPwd">Enter your user account's verified email address and we will send you a password reset link.</label>
                                <input type="email" class="form-control main__input" placeholder="Your Email"
                                       id="email" name="email"  required">
                            </div>
                            <p class="text-center
                            <?php
                                if($check){
                                    echo "text-success";
                                }else{
                                    echo "text-danger";
                                }
                            ?>"><?php echo $msg; ?></p>
                            <div class="main__btn d-flex justify-content-center">
                                <button type="submit" class="btn text-light main__btn-login" name="send" id="send">
                                    Send
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>