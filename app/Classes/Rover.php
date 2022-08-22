<?php

namespace App\Classes;

class Rover
{
    //params
    private static $ORIENTATIONS =  ["N" => 0,  "E" => 1, "S" => 2, "W" => 3,];
    private static $ROTATION = ["L" => -1, "F" => 0, "R" => 1];
    private static $VECTORS =       [[0, -1], [1, 0], [0, 1], [-1, 0],];  //vector movement for each orientation [x, y]

    //STATE
    protected $x;  //Coord x
    protected $y;  //Coord y
    protected $orientation; //ciclical int 0-3

    protected $path;

    public function __construct($x, $y, $orientation)
    {
        $this->x = $x;
        $this->y = $y;
        $this->orientation = static::$ORIENTATIONS[$orientation];
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function run(&$b, $path)
    {
        $len = strlen($path);
        for ($i = 0; $i < $len; $i++) {
            $let = $path[$i];
            if (!str_contains("FRL", $let)) {
                $b->errors["path"] = "Invalid caracter: F, R, L";
                $b->board[$this->y][$this->x] = $b::getRoverCell();
                return;
            }

            $this->orientation = ($this->orientation + 4 + static::$ROTATION[$let]) % 4;

            if ($this->checkNextPosition($b)) {
                $b->board[$this->y][$this->x] = $b::getPathCell();
                $this->x += static::$VECTORS[$this->orientation][0];
                $this->y += static::$VECTORS[$this->orientation][1];
                $b->board[$this->y][$this->x] = $b::getRoverCell();
            } else {
                $b->board[$this->y][$this->x] = $b::getRoverCell();
                return;
            }
        }
    }
    protected function checkNextPosition($b)
    {
        $next_x = $this->x + static::$VECTORS[$this->orientation][0];
        $next_y = $this->y + static::$VECTORS[$this->orientation][1];
        if ($next_y < 0 || $next_y > $b->getYCells() || $next_x < 0 || $next_x > $b->getXCells()) {
            $b->errors['obst'] = "Rover has stopped at ($this->x, $this->y) because it was going to crash with the border.";
            return false;
        }
        if ($b->board[$next_y][$next_x] == 1) {
            $b->errors['obst'] = "Rover has stopped at ($this->x, $this->y) because it was going to crash with an obstacle.";
            return false;
        }
        return true;
    }
}
