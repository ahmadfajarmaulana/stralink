<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Music - Artist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Music</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        {{--  <a class="nav-link" href="{{ route('artist.index') }}">Artists</a>  --}}
                        {{--  <a class="nav-link" href="#">Artists</a>  --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('script')

    <style>
        .btn-add{
            background: linear-gradient(to right , #8fc2f1 ,#116EC3, #8fc2f1);
            padding-right: 1pt !important;
            padding-left: 1pt !important;
            width: 80px;
        }
        .span-btn-add{
            font-size: 90%;
            background: #2580d6;
            border-radius: rounded;
            padding-top: 1px !important;
            padding-bottom: 1px !important;
            padding-right: 11px !important;
            padding-left: 11px !important;
        }

        .btn-edit{
            background: linear-gradient(to right , #8fc2f1 ,#116EC3, #8fc2f1);
            padding-right: 1% ;
            padding-left: 1% !important;
            width: 80px
        }

        .span-btn-edit{
            font-size: 90%;
            background: #2580d6;
            border-radius: rounded;
            padding-top: 1px !important;
            padding-bottom: 1px !important;
            padding-right: 25px !important;
            padding-left: 25px !important;
        }

        .btn-delete{
            background: linear-gradient(to right , #e49ca8 ,#c92b2b, #e49ca8);
            padding-right: 1% ;
            padding-left: 1% !important;
            width: 80px
        }

        .span-btn-delete{
            font-size: 90%;
            background: #c92b2b;
            border-radius: rounded;
            padding-top: 1px !important;
            padding-bottom: 1px !important;
            padding-right: 19px !important;
            padding-left: 19px !important;
        }


        .btn-playing1{
            background: rgb(29, 29, 199);
            background: linear-gradient(to bottom , blue , white)
        }
        .btn-playing1:hover {
            background: blue;
        }
    </style>
</body>
</html>