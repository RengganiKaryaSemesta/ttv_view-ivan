<?php

namespace App\Http\Controllers;

use App\Traits\FetchApiDataTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Sp02Controller extends Controller
{
    use FetchApiDataTrait;
    public function index()
    {
        $apiUrl = 'spo2';
        $spo2Data = $this->fetchApiData($apiUrl);

        return view('sp02', ['spo2Data' => $spo2Data]);
    }
    public function create()
    {
        return view('create_spo2');
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'patient_id' => 'required',
                'oxygen_in_blood' => 'required',
            ]);

            $apiUrl = 'spo2';

            $formData = [
                'patientId' => $request->input('patient_id'),
                'oxygenInBlood' => $request->input('oxygen_in_blood'),
            ];

            if ($this->sendApiData($apiUrl, $formData)) {
                return redirect()->route('sp02.index')->with('success', 'Data sent successfully.');
            } else {
                return redirect()->route('sp02.create')->with('error', 'Error sending data to API.');
            }
        } catch (ValidationException $e) {
            return redirect()->route('sp02.create')->withErrors($e->errors());
        }
    }
}
