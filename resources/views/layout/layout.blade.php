<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Akhir Kelompok 31</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #121212; /* Dark background color */
            color: #ffffff; /* Light text color */
        }

        .navbar {
            background-color: #343a40 !important; /* Dark navbar background color */
        }

        .nav-link {
            color: #ffffff !important; /* Light text color for links */
        }

        .nav-link:hover {
            color: #17a2b8 !important; /* Light text color for links on hover */
        }

        .container {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .navbar {
                position: relative;
            }

            .navbar-toggler {
                position: absolute;
                top: 0;
                right: 0;
            }
        }
    </style>
</head>
<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kelompok 31</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dokter.index') }}">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pasien.index') }}">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('janji_temu.index') }}">Janji Temu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('janji_temu.trash') }}">Trashed Data</a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
</html>
