<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Главная</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="/assets/fonts/font-awesome.min.css" rel="stylesheet" media="all" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Loading main css file -->
    <style><?php include 'assets/style.css' ?></style>
    <!--[if lt IE 9]>
    <script><?php include 'assets/js/ie-support/html5.js' ?></script>
    <script><?php include 'assets/js/ie-support/respond.js' ?></script>
    <![endif]-->

</head>

<body>

<div class="site-content">
    <div class="site-header">
        <div class="container">
            <a href="index.php?weather" class="branding">
                <div class="logo-type">
                    <h1 class="site-title">Погода в Запорожье</h1>
                    <small class="site-description">GroupBWT test</small>
                </div>
            </a>

            <!-- Default snippet for navigation -->
            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item "><a href="index.php?weather">Главная</a></li>
                    <li class="menu-item"><a href="index.php?comments">Отзывы</a></li>
                    <li class="menu-item current-menu-item"><a href="index.php?create_comment">Написать отзыв</a></li>
                    <li class="menu-item"><a href="index.php?exit">Выход</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>

        </div>
    </div> <!-- .site-header -->
</div> <!-- .site-header -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <br><br><br>
        <div class="card">

            <header class="card-header">
                <h4 class="card-title mt-2">Оставить отзыв</h4>
            </header>
            <article class="card-body">
                <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <div class="form-row">

                    </div> <!-- form-row end.// -->
                    <div class="form-group">
                        <label>Имя</label>
                        <input type="text" name="name" class="form-control" placeholder="" required>
                    </div> <!-- form-group end.// -->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="" required>
                    </div> <!-- form-group end.// -->


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ваш отзыв</label>
                        <textarea class="form-control" name="full_comment" id="exampleFormControlTextarea1" rows="7" required></textarea>
                    </div> <!-- form-group end.// -->
                    <br>
                    <?php if($data['invalid_data'] == 'no_captcha'): ?>
                        <h4 style="color: indianred"> Решите капчу!</h4>
                    <?php endif; ?>
                    <div class="d-flex justify-content-center">
                        <div class="g-recaptcha" data-sitekey="6Le9R-sUAAAAAJ-OqYXpatv3aM5BK6tn8pENFQ2Y"></div>
                    </div>
                    <br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Добавить отзыв </button>
                    </div> <!-- form-group// -->
                </form>
            </article> <!-- card-body end .// -->
        </div> <!-- card.// -->
    </div> <!-- col.//-->

</div> <!-- row.//-->


</div>
<!--container end.//-->
</body>

<script src='https://www.google.com/recaptcha/api.js'></script>
