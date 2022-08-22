<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MarsRover</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div id="form-container" class="d-none">
        <div class="col-md-7 margin-0-auto">
            <form id="form" method="POST" action="{{ route('run') }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label for="x" >x</label>
                    <input class="form-control" id="x" name="x">
                </div>
                <div class="form-group">
                    <label for="y" >y</label>
                    <input class="form-control" id="y" name="y">
                </div>
                <div class="form-group">
                    <label for="dir" >direction</label>
                    <input class="form-control" id="dir" name="dir">
                </div>
                <div class="form-group">
                    <label for="path" >path</label>
                    <input class="form-control" id="path" name="path">
                </div>
        
                <input type="submit">
            </form>
        </div>
        <hr>
        <div style="width:100%">
            <div style="margin:auto; width:fit-content; padding: 1rem">
                {!! $board !!}
            </div>
        </div>
    </div>
</body>

</html>