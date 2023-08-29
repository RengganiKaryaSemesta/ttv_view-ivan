<?php

// app/Traits/FetchApiDataTrait.php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait FetchApiDataTrait
{
    public function fetchApiData($url)
    {
        $response = Http::get("https://patientmonitoring.my.id/api/$url");

        if ($response->successful()) {
            return collect($response->json());
        } else {
            return collect();
        }
    }
    public function sendApiData($url, $data)
    {
     
        
        $response = Http::post('https://patientmonitoring.my.id/api/respirationRate', $data);
        
        // Get the response body as a string
        return $response->successful();
    }
}