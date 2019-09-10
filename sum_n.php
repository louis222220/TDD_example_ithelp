<?php
// sum_n.php

function sum_n($num){
    $result = (1 + $num) * $num / 2;
    return $result;
}

assert(sum_n(4)==10);

?>