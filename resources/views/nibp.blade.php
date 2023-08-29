@extends('layouts.app')

@section('content')
    <h1>NIBP Data</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('nibp.create') }}" class="btn btn-primary mb-3">Add</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient ID</th>
                <th>Systolic</th>
                <th>Diastolic</th>
                <th>Patient Check</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @php
            $perPage = 30; // Number of items per page
            $currentPage = request()->get('page', 1);
            $start = ($currentPage - 1) * $perPage;
            @endphp

            @foreach ($nibpData->slice($start, $perPage) as $data)
                <tr>
                    <td>{{ $data['id'] }}</td>
                    <td>{{ $data['patient_id'] }}</td>
                    <td>{{ $data['systolic'] }}</td>
                    <td>{{ $data['diastolic'] }}</td>
                    <td>{{ $data['patient_check'] }}</td>
                    <td>{{ $data['created_at'] }}</td>
                    <td>{{ $data['updated_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        <ul class="pagination">
            @for ($i = 1; $i <= ceil($nibpData->count() / $perPage); $i++)
                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ route('nibp.index', ['page' => $i]) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </div>
@endsection
