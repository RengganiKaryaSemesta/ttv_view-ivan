@extends('layouts.app')

@section('content')
    <h1>Temperature Data</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('temperature.create') }}" class="btn btn-primary mb-3">Add</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient ID</th>
                <th>Temperature</th>
                <th>Patient Check</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temperatureData as $data)
                <tr>
                    <td>{{ $data['id'] }}</td>
                    <td>{{ $data['patient_id'] }}</td>
                    <td>{{ $data['patient_temp'] }}</td>
                    <td>{{ $data['patient_check'] }}</td>
                    <td>{{ $data['created_at'] }}</td>
                    <td>{{ $data['updated_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
