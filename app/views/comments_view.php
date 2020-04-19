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
    <style><?php include 'assets/style_comments.css' ?></style>
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
                    <li class="menu-item current-menu-item"><a href="index.php?comments">Отзывы</a></li>
                    <li class="menu-item "><a href="index.php?create_comment">Написать отзыв</a></li>
                    <li class="menu-item"><a href="index.php?exit">Выход</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->


        </div>
</div> <!-- .site-header -->
    <br><br><br><br>

    <?php if(empty($data)): ?>
    <br>

    <div class="container" style="text-align: center">
        <div class="justify-content-center">

            <div class="h1"><h1>Никто eщё не оставил отзыв :(</h1</div>
            <div class="h2"><p><a href="index.php?create_comment"> Вы можете стать первым! </a></p></div>
            </div>
            <?php endif; ?>
        <div class="container">

<div class="row">

    <?php foreach ($data as $comment): ?>
        <div class="col-md-8">
            <div class="media g-mb-30 media-comment">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                     src="<?php if ($comment['gender'] == 'female'){
                         echo 'assets/images/icons/female.png';
                     }elseif ($comment['gender'] == 'male'){
                         echo 'assets/images/icons/male.png';

                     }else{
                         echo 'assets/images/icons/none.png';
                     }?>" alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0" style="color: #007BFF"><?php echo $comment['inputed_email'] ?></h5>

                        <h2 class="h2 g-color-gray-dark-v1 mb-0"><?php echo $comment['inputed_name']?></h2><br>

                    </div>

                    <p><?php echo $comment['full_comment'];?></p>


                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</div>
</body>