@extends('layouts.app')

@section('content')
    <h1>Add SPO2 Data</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('sp02.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="patient_id">Patient ID</label>
            <input type="text" class="form-control" id="patient_id" name="patient_id">
            @error('patient_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="oxygen_in_blood">Oxygen in Blood</label>
            <input type="text" class="form-control" id="oxygen_in_blood" name="oxygen_in_blood">
            @error('oxygen_in_blood')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
