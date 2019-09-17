<?php
// PaymentList.php

require 'Salary.php';

class PaymentList{
    public $list = array();

    public function insert_salary($_salary){
        $this->list[] = $_salary;
    }
}

// ---tests---
run_payment_list_tests();

function run_payment_list_tests(){
    test_insert_a_salary();
}

function test_insert_a_salary(){
    $tmp_salary = new Salary();
    $tmp_salary->set_data("Louis", 100);

    $tmp_payments = new PaymentList();
    assert(count($tmp_payments->list) == 0);

    $tmp_payments->insert_salary($tmp_salary);
    assert(count($tmp_payments->list) == 1);
    assert($tmp_payments->list[0]->name == "Louis");
}

?>