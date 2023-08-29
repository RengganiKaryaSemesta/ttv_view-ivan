<?php

namespace App\Http\Controllers;

use App\Traits\FetchApiDataTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class HeartRateController extends Controller
{
    use FetchApiDataTrait;

    public function index()
    {
        $data = $this->fetchApiData('heartRate');

        return view('heart_rate', ['data' => $data]);
    }
    public function create()
    {
        return view('create_heart_rate');
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'patient_id' => 'required',
                'beats' => 'required',
            ]);

            $apiUrl = 'https://patientmonitoring.my.id/api/heartRate';

            $formData = [
                'patientId' => $request->input('patient_id'),
                'beats' => $request->input('beats'),
            ];

            if ($this->sendApiData($apiUrl, $formData)) {
                return redirect()->route('heart_rate.index')->with('success', 'Data sent successfully.');
            } else {
                return redirect()->route('heart_rate.create')->with('error', 'Error sending data to API.');
            }
        } catch (ValidationException $e) {
            return redirect()->route('heart_rate.create')->withErrors($e->errors());
        }
    }
}
