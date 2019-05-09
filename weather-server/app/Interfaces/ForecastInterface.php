<?php

namespace App\Interfaces;

use App\Models\Location;

interface ForecastInterface {
    
    public function __construct();
    public function setUp(Location $location);
    public function getCurrentWeather();

}