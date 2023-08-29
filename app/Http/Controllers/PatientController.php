<?php

// app/Http/Controllers/PatientController.php

namespace App\Http\Controllers;

use App\Traits\FetchApiDataTrait;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    use FetchApiDataTrait;

    public function index()
    {
        $apiUrl = 'patients';
        $patientData = $this->fetchApiData($apiUrl);

        return view('patients', ['patientData' => $patientData]);
    }

    // Other methods...
}
