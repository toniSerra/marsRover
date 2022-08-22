<?php

namespace App\Http\Controllers;

use App\Classes\Rover;
use App\Classes\Board;

use Illuminate\Http\Request;


class MarsRoverController extends Controller
{
    public function index()
    {

        $b = new Board();
        return view('MarsRover', [
            'board' => $b,
        ]);
    }
    public function run(Request $req)
    {
        $b = new Board();

        //x validation
        if (!isset($req->x)) {
            $b->errors["x"] = "Required";
        } else if (!is_numeric($req->x)) {
            $b->errors["x"] = "Has to be numeric";
        }else if ($req->x >= $b->getXCells() || $req->x < 0) {
            $b->errors["x"] = "Out of range";
        }

        //y validation
        if (!isset($req->y)) {
            $b->errors["y"] = "Required";
        }else if (!is_numeric($req->x)) {
            $b->errors["y"] = "Has to be numeric";
        } else if ($req->y >= $b->getYCells() || $req->x < 0) {
            $b->errors["y"] = "Out of range";
        }

        //dir validation
        if (!isset($req->dir)) {
            $b->errors["dir"] = "Required";
        } else if (strlen($req->dir) != 1) {
            $b->errors["dir"] = "Only 1 caracter allowed: N, E, S or W";
        } else if (!str_contains("NESW", $req->dir)) {
            $b->errors["dir"] = "Invalid caracter: N, E, S or W";
        }

        if (count($b->errors) == 0) {
            $rover = new Rover($req->x, $req->y, $req->dir);
            $rover->setPath($req->path);
            $rover->run($b);

            $b->addRover($rover);
        }



        return view('MarsRover', [
            'board' => $b,
            'req' => $req
        ]);
    }
}
