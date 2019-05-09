<?php

namespace App\Models;

use App\Interfaces\ForecastInterface;
use App\Models\Location;

class Forecast {

    private $forecast;

    public function __construct(ForecastInterface $forecast)
    {
        $this->forecast = $forecast;
    }
    
    public function getWeather(Location $location)
    {
        $this->forecast->setUp($location);
        return $this->forecast->getCurrentWeather();
    }
}