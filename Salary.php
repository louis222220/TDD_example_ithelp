<?php
// Salary.php

class Salary{
    public $name;
    public $value;

    public function set_data($_name, $_value){
        $this->name = $_name;
        $this->value = $_value;
    }
}

// ---tests---
run_tests();

function run_tests(){
    test_set_salary();
}

function test_set_salary(){
    $tmp_salary = new Salary();
    $tmp_salary->set_data("Louis", 100);

    assert($tmp_salary->name == "Louis");
    assert($tmp_salary->value == 100);
}

?>