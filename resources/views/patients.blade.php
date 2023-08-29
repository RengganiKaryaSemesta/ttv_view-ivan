@extends('layouts.app')

@section('content')
    <h1>Patient Data</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Admission Date</th>
                    <th>Discharge Date</th>
                    <th>Gender</th>
                    <th>Birth</th>
                    <th>ID Card</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Education</th>
                    <th>Occupation</th>
                    <th>Referred</th>
                    <th>Next of Kin Name</th>
                    <th>Relationship</th>
                    <th>Next of Kin Address</th>
                    <th>Next of Kin Contact</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Patient Room</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patientData as $data)
                    <tr>
                        <td>{{ $data['id'] }}</td>
                        <td>{{ $data['patient_name'] }}</td>
                        <td>{{ $data['admission_date'] }}</td>
                        <td>{{ $data['discharge_date'] }}</td>
                        <td>{{ $data['gender'] }}</td>
                        <td>{{ $data['birth'] }}</td>
                        <td>{{ $data['id_card'] }}</td>
                        <td>{{ $data['address'] }}</td>
                        <td>{{ $data['contact'] }}</td>
                        <td>{{ $data['education'] }}</td>
                        <td>{{ $data['occupation'] }}</td>
                        <td>{{ $data['referred'] }}</td>
                        <td>{{ $data['next_of_kin_name'] }}</td>
                        <td>{{ $data['relationship'] }}</td>
                        <td>{{ $data['next_of_kin_address'] }}</td>
                        <td>{{ $data['next_of_kin_contact'] }}</td>
                        <td>{{ $data['created_at'] }}</td>
                        <td>{{ $data['updated_at'] }}</td>
                        <td>{{ $data['patient_room'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
