<?php
class WeatherController extends Controller{
    function render()
    {
        session_start();

        if($_SESSION['logged_in']) {
            require_once 'app/weather_parser.php';
            $data = getWeatherData();
            $this->view->generate('weather_view', $data);
        }else{
            header('Location: /bwt_test/index.php?login');
            exit();

        }
    }
}
