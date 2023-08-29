<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FetchApiDataTrait;
use Illuminate\Validation\ValidationException;

class TemperatureController extends Controller
{
    use FetchApiDataTrait;

    public function index()
    {
        $apiUrl = 'temp';
        $temperatureData = $this->fetchApiData($apiUrl);

        return view('temperature', ['temperatureData' => $temperatureData]);
    }
    public function create()
    {
        return view('create_temperature');
    }
    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'patient_id' => 'required',
                'patient_temp' => 'required',
            ]);

            $apiUrl = 'temp';

            $formData = [
                'patientId' => $request->input('patient_id'),
                'patientTemp' => $request->input('patient_temp'),
            ];
            if ($this->sendApiData($apiUrl, $formData)) {
                return redirect()->route('temperature.index')->with('success', 'Data sent successfully.');
            } else {
                return redirect()->route('temperature.create')->with('error', 'Error sending data to API.');
            }
        } catch (ValidationException $e) {
            return redirect()->route('temperature.create')->withErrors($e->errors());
        }
    }
}
