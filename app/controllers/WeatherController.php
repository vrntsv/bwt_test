<?php

namespace \WeatherController::class;
use app\core\Controller as Controller;

class WeatherController extends Controller
{
    public function render()
    {
        session_start();

        if ($_SESSION['logged_in']) {
            $weather = new \WeatherParser();
            $data = $weather->getWeatherData();
            $this->view->generate('weather_view', $data);
        } else {
            header('Location: /bwt_test/index.php?login');
            exit();
        }
    }
}
