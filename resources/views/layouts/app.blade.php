<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TTV</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('respiration_rate.index')}}">Respiration Rate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('heart_rate.index')}}">Heart Rate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('sp02.index')}}">SpO2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('temperature.index')}}">Temperature</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('nibp.index')}}">NIBP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('patients.index')}}">Patients</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
