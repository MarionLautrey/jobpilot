<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        body {
            font-family: sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            padding: 1rem 2rem;
            background: pink;
            border-bottom: 1px solid #ccc;

            /* Flex pour aligner le titre à gauche et les boutons à droite */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .header-buttons a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin-left: 10px;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: bold;
            color: black;
            transition: background-color 0.2s ease-in-out;
        }
        .ajouter{
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            margin: 2px;
            border-radius: 8px;
            font-size: 16px;
            background-color: pink;
            color: black;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            padding: 8px 12px;
            margin: 2px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            background-color: pink;
            color: white;
            transition: background-color 0.3s ease;
}

        .btn-info { background-color: #17a2b8; }      /* bouton voir */
        .btn-info:hover { background-color: #138496; }

        .btn-warning { background-color: #f0ad4e; }  /* bouton modifier */
        .btn-warning:hover { background-color: #ec971f; }

        .btn-danger { background-color: #d9534f; }   /* bouton supprimer */
        .btn-danger:hover { background-color: #c9302c; }

        .container {
            margin: 10px;
        }

        .offre, .candidat, .entreprise {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 1rem;
            margin-bottom: 1rem;
            background: #fafafa;
        }

        .job {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>

        <header>
        <div class="header-title">Jobpilot</div>


        <div class="header-buttons">

            @include('layouts.navigation')

        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>


