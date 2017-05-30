<?php

namespace App\Classes;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class smsHelper
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();

    }

    public function sendSms($source)
    {
        try {
            $this->client->get('https://control.msg91.com/api/sendhttp.php?authkey=137605AKIkRvkb587df267'.
                '&mobiles='.$source->phone.
                '&message='.$this->composemsg($source).
                '&sender=TRKJEE&route=4&country=0');

            Log::info($this->composemsg($source) ." SMS sent to $source->phone");
        }catch (\Exception $e){
            Log::info("SMS not sent to $source->phone");
        }
    }

    public function composemsg($source)
    {
        $location = array();
        foreach ($source->route as $loc){
            array_push($location,$loc->location->formatted_address);
        }
        return "Your Preferred route list for the following location: \n" .implode(" ",$location)." has been registered successfully";
    }
}