@extends('layouts.app')

@section('content')
    <h1>SPO2 Data</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('sp02.create') }}" class="btn btn-primary mb-3">Add</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient ID</th>
                <th>Blood Oxygen</th>
                <th>Patient Check</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spo2Data as $data)
                <tr>
                    <td>{{ $data['id'] }}</td>
                    <td>{{ $data['patient_id'] }}</td>
                    <td>{{ $data['blood_oxygen'] }}</td>
                    <td>{{ $data['patient_check'] }}</td>
                    <td>{{ $data['created_at'] }}</td>
                    <td>{{ $data['updated_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
