<?php

class ForeachMultidimensionalBench
{

    private $data = [];
    /**
     * ForeachBench constructor.
     */
    public function __construct()
    {
        $this->data = array_fill(0, 1000, array_fill(0, 5, random_int(0, 100)));
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchOne()
    {
        $total = 0;
        $difference = 0;
        foreach($this->data as $number){
            $total += array_reduce($number, function($sum, $num){return $sum += $num;});
            $difference -= array_reduce($number, function($sum, $num){return $sum -= $num;});
        }
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchTwo()
    {
        $total = 0;
        foreach($this->data as $number){
            $total += array_reduce($number, function($sum, $num){return $sum += $num;});
        }
        $difference = 0;
        foreach($this->data as $number){
            $difference -= array_reduce($number, function($sum, $num){return $sum -= $num;});
        }
    }
}