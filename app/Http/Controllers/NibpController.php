<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FetchApiDataTrait;
use Illuminate\Validation\ValidationException;

class NibpController extends Controller
{
    use FetchApiDataTrait;
    public function index()
    {
        $apiUrl = 'nibp';
        $nibpData = $this->fetchApiData($apiUrl);

        return view('nibp', ['nibpData' => $nibpData]);
    }
    public function create()
    {
        return view('create_nibp');
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'patient_id' => 'required',
                'systolic' => 'required',
                'diastolic' => 'required',
            ]);

            $apiUrl = 'nibp';

            $formData = [
                'patientId' => $request->input('patient_id'),
                'diastolik' => $request->input('systolic'),
                'sistolik' => $request->input('diastolic'),
            ];

            if ($this->sendApiData($apiUrl, $formData)) {
                return redirect()->route('nibp.index')->with('success', 'Data sent successfully.');
            } else {
                return redirect()->route('nibp.create')->with('error', 'Error sending data to API.');
            }
        } catch (ValidationException $e) {
            return redirect()->route('nibp.create')->withErrors($e->errors());
        }
    }
}
