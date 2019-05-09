<?php

namespace App\Repositories;

use App\Interfaces\ForecastInterface;
use App\Models\Location;
use Httpful\Request as Scraper;
use Cache;
use Illuminate\Support\Str;

class DarkSkyForecastRepository implements ForecastInterface {

    private $location;
    private $uri;
    private $weather;

    public function __construct(){}

    public function setUp(Location $location)
    {
        $this->location = $location;
        $this->uri = Str::finish(env('DARKSKY_URL'), '/')
                   . Str::finish(env('DARKSKY_KEY'), '/')
                   . $this->location->latitude
                   . ','
                   . $this->location->longitude
                   .'?units=si';
        $this->fetchWeather();
    }

    private function fetchWeather()
    {
        $uri = $this->uri;
        $cacheName = md5($this->uri);
        $response = null;
        try {
            $response = Cache::remember($cacheName, 300, function() use ($uri) {
                return Scraper::get($uri)->expectsJson()->send();
            });
            $this->weather = $response->raw_body;
        } catch (Exception $e) {
            report($e);
        } finally {
            if ($response == null)
            {
                $this->weather = null;
            }
        }
        
    }

    public function getCurrentWeather()
    {
        return $this->weather;
    }

}