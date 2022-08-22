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
        }

        label {
            margin-top: 8px;
            display: block;
        }

        input {
            padding: 4px 8px;
            /* margin-bottom: 1rem; */
        }
        .error{
            color: #A00;
            margin: 0;
        }

        .cell {
            width: 10px;
            height: 10px;
            margin: 0.5px;
        }

        .cell.empty {
            background-color: #0001
        }

        .cell.blocked {
            background-color: #0008
        }

        .cell.rover {
            background-color: #00FF
        }

        .cell.path {
            background-color: #00F8
        }
    </style>
</head>

<body>
    <div style="display: flex; width:100vw; height: 100vh; align-items: center;">
        <div style="margin:auto; flex: 0 1 min-content; padding: 1rem">
        <div>
            <h1>Mars Rover</h1>
            <p>Set up the initial state and path to see how the rovers moves trough the board</p>
            <p>Build a path as "FRL" (Front, Rigth, Left) </p>
        </div>
            <form id="form" method="POST" action="{{ route('run') }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="x">Coord x (left to rigth)</label>
                    <input class="form-control" id="x" name="x" placeholder="0-199" value="{{$req->x?? ''}}">
                    @if(isset($board->errors['x']))
                         <p class="error">{{$board->errors['x']}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="y">Coord y (up to down)</label>
                    <input class="form-control" id="y" name="y" placeholder="0-199" value="{{$req->y?? ''}}">
                    @if(isset($board->errors['y']))
                         <p class="error">{{$board->errors['y']}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="dir">Orientation</label>
                    <input class="form-control" id="dir" name="dir" placeholder="N-E-S-W" value="{{$req->dir?? ''}}">
                    @if(isset($board->errors['dir']))
                         <p class="error">{{$board->errors['dir']}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="path">Path</label>
                    <input class="form-control" id="path" name="path" value="{{$req->path?? ''}}"> 
                    @if(isset($board->errors['path']))
                         <p class="error">{{$board->errors['path']}}</p>
                    @endif
                </div>

                <input style="margin-top:1rem" type="submit" value="Run">
                @if(isset($board->errors['obst']))
                         <p class="error">{{$board->errors['obst']}}</p>
                    @endif
            </form>
        </div>
        <div style="flex: 1 0 content">
            <div style="margin:auto; width:fit-content">
                @foreach ($board->board as $row)
                <div style='display:flex'>
                    @foreach ($row as $col)
                    @if($col === $board::getEmptyCell())
                    <div class="cell empty"></div>
                    @elseif($col === $board::getBlockedCell())
                    <div class="cell blocked"></div>
                    @elseif($col === $board::getPathCell())
                    <div class="cell path"></div>
                    @else
                    <div class="cell rover"></div>
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>