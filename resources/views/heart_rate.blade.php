@extends('layouts.app')

@section('content')
    <h1>Heart Rate Page</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
        @endif
    <div class="table-responsive">
        <a href="{{route('heart_rate.create')}}" class="btn btn-success">ADD</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient ID</th>
                    <th>beats</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $perPage = 30; // Number of items per page
                    $currentPage = request()->get('page', 1);
                    $start = ($currentPage - 1) * $perPage;
                @endphp

                @foreach ($data->slice($start, $perPage) as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['patient_id'] }}</td>
                        <td>{{ $item['heart_beats'] }}</td>
                        <td>{{ $item['updated_at'] }}</td>
                        <td>{{ $item['created_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            <ul class="pagination">
                @for ($i = 1; $i <= ceil($data->count() / $perPage); $i++)
                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                        <a class="page-link" href="{{ route('heart_rate.index', ['page' => $i]) }}">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </div>

    </div>
@endsection
