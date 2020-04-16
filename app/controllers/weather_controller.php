<?php
class WeatherController extends Controller{
    function render()
    {
        require_once 'app/weather_parser.php';
        $data = getWeatherData();

        $this->view->generate('weather_view', $data);

    }
}
