<?php
$n = 10456782348;

function all_sum($n){
    $long = strlen($n);
    if($long > 1){
        $get_chars = str_split($n);
        foreach($get_chars as $k=>$nums){
            if($k==0) $n = $nums;
            else $n += $nums;
        }
    }
    $long = strlen($n);
    if($long > 1)
    all_sum($n);
    if($long == 1) echo $n;
}
all_sum($n);
