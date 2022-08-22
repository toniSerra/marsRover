<?php

namespace App\Http\Controllers;

use App\Classes\Rover;
use App\Classes\Board;

use Illuminate\Http\Request;


class MarsRoverController extends Controller
{
    public function index(){
  
        $b = new Board();   
        return view('MarsRover', [
            'board' => $b->toHtml(),
        ]);
    }
    public function run(Request $req){
        $b = new Board();   

        $rover = new Rover($req->x, $req->y, $req->dir);
        $rover->setPath($req->path);  
        $rover->run($b);  

        $b->addRover($rover);
    
    
        return view('MarsRover', [
            'board' => $b->toHtml(),
        ]);
    }
}