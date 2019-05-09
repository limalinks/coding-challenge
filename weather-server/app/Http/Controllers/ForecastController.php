<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    private $location;
    private $forecast;

    public function __construct(Forecast $forecast)
    {
        $this->forecast = $forecast;
    }

    /**
     * Set up the controller.
     */
    private function setUp($latitude, $longitude)
    {
        $this->location = new Location($latitude, $longitude);
    }

    /**
     * Get current weather conditions
     */
    public function currentWeather(Request $request)
    {
        $latitude  = $request->input('latitude');
        $longitude = $request->input('longitude');
        
        $this->setUp($latitude, $longitude);
        return $this->forecast->getWeather($this->location);
    }
}
