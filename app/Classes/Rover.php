<?php
namespace App\Classes;

class Rover
{
    // private static $directions = ["↓", "→", "↑", "←",];


    //params
    private static $orientations =  [ "N" => 0,  "E" => 1, "S" => 2, "W" => 3,];
    private static $rotation = ["L" => -1, "F" => 0, "R" => 1];

    private static $vectors =       [[0, -1], [1, 0],[0, 1], [-1, 0],];  //vector movement for each orientation [x, y]

    //STATE
    public $x;  //Coord x
    public $y;  //Coord y
    public $orientation; //ciclical int 0-3
    public $interrupted = false; 

    protected $path;

    public function __construct($x, $y, $orientation)
    {
        $this->x = $x;
        $this->y = $y;
        $this->orientation = static::$orientations[$orientation];
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    private function orientate($rot)
    {
        $this->orientation = ($this->orientation + 4 + static::$rotation[$rot]) % 4;
    }
    private function advance($board)
    {
        if ($this->checkNextPosition($board)) {
            $board->board[$this->y][$this->x] = $board::getPathCell();
            $this->x += static::$vectors[$this->orientation][0];
            $this->y += static::$vectors[$this->orientation][1];
        }
        else{
            $this->interrupted = true;
        }
    }
    public function run($board)
    {
        $len = strlen($this->path);
        for ($i = 0; $i < $len; $i++) {
            $this->orientate($this->path[$i]);
            $this->advance($board);
        }

    }
    protected function checkNextPosition($board, &$errors = null)
    {
        $next_x = $this->x + static::$vectors[$this->orientation][0];
        $next_y = $this->y + static::$vectors[$this->orientation][1];
        if($next_y < 0 || $next_y > $board->getYCells() || $next_x < 0 || $next_x > $board->getXCells() ){
            $errors[] = 'out';
            // dd('out', $next_y, $next_x );
            return false;
        }
        if($board->board[$next_y][$next_x] == 1){
            $errors[] = 'obstacle';
            // dd('obstacle', [
            //     'y' =>$next_y,
            //     'x' =>$next_x]
            // );
            return false;
        }
        return true;
    }
}