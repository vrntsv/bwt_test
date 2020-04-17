<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Главная</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="/assets/fonts/font-awesome.min.css" rel="stylesheet" media="all" type="text/css"/>
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
                    <li class="menu-item current-menu-item"><a href="index.php?weather">Главная</a></li>
                    <li class="menu-item"><a href="news.html">Отзывы</a></li>
                    <li class="menu-item"><a href="live-cameras.html">Написать отзыв</a></li>
                    <li class="menu-item"><a href="photos.html">Выход</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>

        </div>
    </div> <!-- .site-header -->

    <br><br>
    <div class="forecast-table">
        <div class="container">
            <div class="forecast-container">
                <div class="today forecast">
                    <div class="forecast-header">
                        <div class="day"><?php echo $data['main_day']?></div>
                        <div class="date"><?php echo $data['today'] ?> </div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="location"></div>
                        <div class="degree">
                            <div class="num"><?php echo $data['temperature']?></div>
                            <div class="forecast-icon">
                                <img src="assets/images/icons/icon-1.svg" alt="" width=90>
                            </div>
                        </div>
                        <span><img src="assets/images/icon-umberella.png" alt="">20%</span>
                        <span><img src="assets/images/icon-wind.png" alt="">18km/h</span>
                        <span><img src="assets/images/icon-compass.png" alt="">Западный</span>
                    </div>
                </div>
                <?php foreach ($data['next_days_data'] as $day): ?>
                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day"><?php echo $day['name'] ?></div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="forecast-icon">
                            <img src="assets/images/icons/icon-3.svg" alt="" width=48>
                        </div>
                        <div class="degree"><?php echo $day['max'] ?>C</div>
                        <small><?php echo $day['min'] ?></small>
                    </div>
                </div>
                <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>


    <script src="/assets/js/jquery-1.11.1.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/app.js"></script>

</body>

</html>