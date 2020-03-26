<?php

class ForeachBench
{

    private $data = [];
    /**
     * ForeachBench constructor.
     */
    public function __construct()
    {
        $data = array_fill(0, 100, random_int(0, 100));
        $this->data = $data;
    }

    /**
     * @Revs(1000)
     */
    public function benchOne()
    {
        $total = 0;
        $difference = 0;
        foreach($this->data as $number){
            $total += $number;
            $difference -= $number;
        }
    }

    /**
     * @Revs(1000)
     */
    public function benchTwo()
    {
        $total = 0;
        foreach($this->data as $number){
            $total += $number;
        }
        $difference = 0;
        foreach($this->data as $number){
            $difference -= $number;
        }
    }
}