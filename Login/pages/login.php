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
</head>
<body>
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
                                        <label for="email" class="main__label">EMAIL ADDRESS</label>
                                        <input type="email" class="form-control main__input" placeholder="Enter email" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd" class="main__label">PASSWORD</label>
                                        <input type="password" class="form-control main__input" placeholder="Enter password" id="pwd" name="password">
                                    </div>
                                    <div class="form-group form-check d-flex justify-content-between" style="font-size: 0.9rem;">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox"> Remember me
                                        </label>
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                    <div class="main__btn d-flex justify-content-center">
                                        <button type="submit" class="btn text-light">
                                            Login
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>

                                </form>
                            </div>
                            <div class="main__signup d-flex justify-content-center pt-3" style="font-size:0.9rem;">
                                <p class="pr-2">Don't have an account?</p>
                                <a href="#">Sign up</a>
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