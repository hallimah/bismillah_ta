<?php
class mamdani{
    protected $start;
    protected $end;
    protected $poin;
    protected $interval=array();
    protected $set=array();
   
    public function __construct()
    {
        $this->point = 3;
    }
    
    /**
     * max ( min ( x-a/b-a, 1, d-x/d-c ), 0 )
     */
    public function process($x)
    {
        $a = $this->interval[0];
        $b = $this->interval[1];
        $c = $this->interval[2];
        $d = $this->interval[3];

        $e = ($x - $a) / ($b - $a);
        $f = ($d - $x) / ($d - $c);

        return max(min(array($e, 1, $f)), 0);
        
    }
    
}
?>