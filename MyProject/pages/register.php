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
</head>
<body>
    <?php
        function checkFirstName($firstName){

        }
    ?>
    <section class="main">
        <div class="main__wrapper">
            <div class="main__row row">
                <div class="main__container col-xl-8 col-11 shadow-lg">
                    <div class="main__content row">
                        <div class="main__left col-lg-6 col-md-6 p-4">
                            <div class="main__welcome p-4">
                                <h3 class="text-center mt-3">Sign Up</h3>
                            </div>
                            <p class="text-secondary text-center mb-4" style="font-size: 0.8rem;">Please enter your details to sign up and be part of our great community</p>
                            <div class="main__form mb-4">
                                <form method="POST">
                                    <div class="row">
                                        <div class="form-group col-lg-6 mb-2">
                                            <label for="firstname" class="main__label" id="labelFname">FIRST NAME</label>
                                            <input type="text" class="form-control main__input" placeholder="First name" id="firstname" name="firstname">
                                        </div>
                                        <div class="form-group col-lg-6 mb-2">
                                            <label for="lastname" class="main__label" id="labelLname">LAST NAME</label>
                                            <input type="text" class="form-control main__input" placeholder="Last name" id="lastname" name="lastname">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="username" class="main__label" id="labelUserName">USERNAME</label>
                                        <input type="text" class="form-control main__input" placeholder="Username" id="username" name="username">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="email" class="main__label" id="labelEmail">EMAIL</label>
                                        <input type="email" class="form-control main__input" placeholder="Email" id="email" name="email">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="password" class="main__label" id="labelPwd">PASSWORD</label>
                                        <input type="password" class="form-control main__input" placeholder="Password" id="password" name="password">
                                    </div>
                                    <div class="main__btn d-flex justify-content-center">
                                        <button type="submit" class="btn text-light" name="register">
                                            Register
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
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