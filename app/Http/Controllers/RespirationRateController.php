<?php

namespace App\Http\Controllers;

use App\Traits\FetchApiDataTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RespirationRateController extends Controller
{
    use FetchApiDataTrait;

    public function index()
    {
        $data = $this->fetchApiData('respirationRate');

        return view('respiration_rate', ['data' => $data]);
    }
    public function create()
    {
        return view('create_respiration_rate');
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'patient_id' => 'required',
                'breaths' => 'required',
            ]);

            $apiUrl = 'https://patientmonitoring.my.id/api/respirationRate';

            $formData = [
                'patientId' => $request->input('patient_id'),
                'breath' => $request->input('breaths'),
            ];

            if ($this->sendApiData($apiUrl, $formData)) {
                return redirect()->route('respiration_rate.index')->with('success', 'Data sent successfully.');
            } else {
                return redirect()->route('respiration_rate.create')->with('error', 'Error sending data to API.');
            }
        } catch (ValidationException $e) {
            return redirect()->route('respiration_rate.create')->withErrors($e->errors());
        }
    }
}
