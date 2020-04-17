<?php
class WeatherController extends Controller{
    function render()
    {
        echo 'weather';
        var_dump($_SESSION);
        echo 'weather';

        if($_SESSION['logged_in'] == true) {
            require_once 'app/weather_parser.php';
            $data = getWeatherData();
            var_dump($data);
            $this->view->generate('weather_view', $data);


        }else{
            header('Location: http://localhost:63343/bwt_test/index.php?login');
            exit();

        }
    }
}
