<?php
    session_start();
    if(isset($_SESSION['TOKEN'])){
        if(strlen($_SESSION['TOKEN'])>1){
            header('Location:profile.php');
        }
    }else{
        $_SESSION['TOKEN']="";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
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
    <link href="../src/scss/register.css" rel="stylesheet">
    <!--JQuery-->
    <script src="../src/library/JQuery/jQuery.js"></script>
    <!--JS-->
    <script src="../src/js/Register/inputAnimation.js"></script>
    <script src="../src/js/Register/passwordAnimation.js"></script>
</head>
<body>
    <?php
        include "../src/php/funcCheckInput.php";
        include "../src/php/sendEmail.php";
        include "../src/php/connectDB.php";
        $fName = "";
        $lName = "";
        $userName = "";
        $email = "";
        $passWord = "";
        $msg = "";
        $check = "";
        if(isset($_POST['register']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])
            && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $fName = $_POST['firstname'];
            $lName = $_POST['lastname'];
            $userName = $_POST['username'];
            $email = $_POST['email'];
            $passWord = $_POST['password'];
            if(checkName($_POST['firstname']) && checkName($_POST['lastname']) && checkUserName($_POST['username']) && checkEmail($_POST['email']) && checkPassword($_POST['password'])){
                $connet = connetDataBase();
                $sql1 = sqlDataBase("USERNAME","USERNAME",$userName);
                $sql2 = sqlDataBase("EMAIL","EMAIL",$email);
                $result1 = $connet->query($sql1);
                $numUserName =  $result1->num_rows;
                $result2 = $connet->query($sql2);
                $numEmail =  $result2->num_rows;
                if($numUserName+ $numEmail == 0){
                    $token = md5($email.$userName.time());
                    if(sendEmail($token,$fName,$lName,$email)){
                        $token = "'".$token."'";
                        $fName = "'".$fName."'";
                        $lName = "'".$lName."'";
                        $userName = "'".$userName."'";
                        $email = "'".$email."'";
                        $passWord = "'".$passWord."'";
                        $sql = "INSERT INTO USER (TOKEN, FIRSTNAME, LASTNAME, USERNAME, EMAIL, PASSWORD, ISACTIVE)
                                VALUES ($token, $fName, $lName, $userName, $email, $passWord,0)";
                        if($connet->query($sql)){
                            $check = true;
                            $msg = "The system has sent an email to your email";
                            $fName = "";
                            $lName = "";
                            $userName = "";
                            $email = "";
                            $passWord = "";
                        }
                        else{
                            $check = false;
                            $msg = "Register is wrong";
                        }
                    } else{
                        $check = false;
                        $msg = "Register is wrong";
                    }
                    $connet->close();
                }
                else{
                    $check = false;
                    $msg = "Email or Username is ready";
                }
            }
        }else{
            (!empty($_POST['firstname']))?$fName = $_POST['firstname']:$fName = "";
            (!empty($_POST['lastname']))?$lName = $_POST['lastname']:$lName = "";
            (!empty($_POST['username']))?$userName = $_POST['username']:$userName = "";
            (!empty($_POST['email']))?$email = $_POST['email']:$email = "";
            (!empty($_POST['password']))?$passWord = $_POST['password']:$passWord = "";
        }
    ?>
    <section class="main">
        <div class="main__wrapper">
            <div class="main__row row">
                <div class="main__container col-xl-8 col-11 shadow-lg">
                    <div class="main__content row">
                        <div class="main__left col-lg-6 col-md-6 p-4">
                            <div class="main__welcome p-4">
                                <h3 class="text-center mt-3">Register</h3>
                            </div>
                            <p class="text-secondary text-center mb-4" style="font-size: 0.8rem;">Please enter your details to sign up and be part of our great community</p>
                            <div class="main__form mb-4">
                                <form method="POST">
                                    <div class="row">
                                        <div class="form-group col-lg-6 mb-2">
                                            <label for="firstname" class="main__label" id="labelFname">FIRST NAME</label>
                                            <input type="text" class="form-control main__input" placeholder="First name" id="firstname" name="firstname" required value="<?php echo $fName;?>">
                                            <p class='my-0 p-0
                                            <?php
                                                if(!empty($fName)){
                                                    if(checkName($fName)){
                                                        echo "text-secondary";
                                                    }
                                                    else{
                                                        echo "text-danger";
                                                    }
                                                }
                                            ?>' style='font-size: 0.7rem;margin-left: 0.2rem'>Include only letters</p>
                                        </div>
                                        <div class="form-group col-lg-6 mb-2">
                                            <label for="lastname" class="main__label" id="labelLname">LAST NAME</label>
                                            <input type="text" class="form-control main__input" placeholder="Last name" id="lastname" name="lastname" required value="<?php echo $lName;?>">
                                            <p class='my-0 p-0
                                            <?php
                                            if(!empty($lName)){
                                                if(checkName($lName)){
                                                    echo "text-secondary";
                                                }
                                                else{
                                                    echo "text-danger";
                                                }
                                            }
                                            ?>' style='font-size: 0.7rem;margin-left: 0.2rem'>Include only letters</p>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="username" class="main__label" id="labelUserName">USERNAME</label>
                                        <input type="text" class="form-control main__input" placeholder="Username" id="username" name="username" required value="<?php echo $userName;?>">
                                        <p class='my-0 p-0
                                        <?php
                                            if(!empty($userName)){
                                                if(checkUserName($userName)){
                                                    echo "text-secondary";
                                                }
                                                else{
                                                    echo "text-danger";
                                                }
                                            }
                                        ?>' style='font-size: 0.7rem;margin-left: 0.2rem'>Over than 5 characters: letters and numbers</p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="email" class="main__label" id="labelEmail">EMAIL</label>
                                        <input type="email" class="form-control main__input" placeholder="Email" id="email" name="email" required value="<?php echo $email;?>">
                                        <p class='my-0 p-0
                                        <?php
                                            if(!empty($email)){
                                                if(checkEmail($email)){
                                                    echo "text-secondary";
                                                }
                                                else{
                                                    echo "text-danger";
                                                }
                                            }
                                        ?>' style='font-size: 0.7rem;margin-left: 0.2rem'>Email Address</p>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="password" class="main__label" id="labelPwd">PASSWORD</label>
                                        <input type="password" class="form-control main__input" placeholder="Password" id="password" name="password" required value="<?php echo $passWord;?>">
                                        <p class='my-0 p-0
                                        <?php
                                            if(!empty($passWord)){
                                                if(checkPassword($passWord)){
                                                    echo "text-secondary";
                                                }
                                                else{
                                                    echo "text-danger";
                                                }
                                            }
                                        ?>' id='msgPwd' style='font-size: 0.7rem;margin-left: 0.2rem'>Over than 5 characters: At least 1 capital letter, 2 nummbers</p>
                                    </div>
                                    <p class="text-center
                                    <?php
                                        if($check){
                                            echo "text-success";
                                        }else{
                                            echo "text-danger";
                                        }
                                    ?>" style="font-size: 0.8rem"><?php echo $msg;?></p>
                                    <div class="main__btn d-flex justify-content-center">
                                        <button type="submit" class="btn text-light main__btn-register" name="register">
                                            Register
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="main__login text-center">
                                <a href="login.php">Login</a>
                            </div>
                        </div>
                        <div class="main__right col-lg-6 col-md-6">
                            <img src="../src/img/register/register.png" width="100%" class="d-none d-md-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>