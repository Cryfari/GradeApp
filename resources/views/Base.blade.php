<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Grade App</title>
</head>
<body class="m-auto mt-2" style="width: 85%; background: rgb(221, 221, 221);">
    <style>
                /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield !important;
        }
    </style>
    <div>
        <div>
            <nav>
                <a class="btn btn-info" href="/">Home</a>
                <a class="btn btn-info" href="/nilai">Nilai</a>
            </nav>
            <hr>
            <br>
            @if (session('messages'))
                @foreach ( session('messages') as $key=>$message)
                    <div class="offset-lg-2 col-lg-8">
                        <div class="alert alert-{{ $key }} alert-dismissible">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button>
                            {{ $message }}
                        </div>
                    </div>

                @endforeach
            @endif
            <div class="container">
                @yield("Content")
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>
