@extends('layouts.app')

@section('content')
    <h1>Add NIBP Data</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('nibp.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="patient_id">Patient ID</label>
            <input type="text" class="form-control" id="patient_id" name="patient_id">
            @error('patient_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="systolic">Systolic</label>
            <input type="text" class="form-control" id="systolic" name="systolic">
            @error('systolic')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="diastolic">Diastolic</label>
            <input type="text" class="form-control" id="diastolic" name="diastolic">
            @error('diastolic')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
