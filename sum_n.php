<?php
// sum_n.php

function sum_n($num){
    $result = 0;
    for($i = 1; $i<=$num; $i++){
        $result += $i;
    }
    return $result;
}

assert(sum_n(4)==10);

?>