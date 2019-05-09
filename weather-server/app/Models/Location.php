<?php

namespace App\Models;

class Location {

    public $longitude;
    public $latitude;

    /**
     * Create a new location model instance
     * 
     * If the instance is instantiated without coordinates, it will be created with
     * the default coordinates specifies in the environment.
     */
    public function __construct( $latitude = null, $longitude = null )
    {
        $this->latitude = ( $latitude !== null ) ? $latitude : env('DEFAULT_LATITUDE');
        $this->longitude = ( $longitude !== null ) ? $longitude : env('DEFAULT_LONGITUDE');
    }
}