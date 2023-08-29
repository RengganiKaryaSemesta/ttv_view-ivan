@extends('layouts.app')

@section('content')
    <h1>Add Temperature Data</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('temperature.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="patient_id">Patient ID</label>
            <input type="text" class="form-control" id="patient_id" name="patient_id">
            @error('patient_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="patient_temp">Patient Temperature</label>
            <input type="text" class="form-control" id="patient_temp" name="patient_temp">
            @error('patient_temp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
