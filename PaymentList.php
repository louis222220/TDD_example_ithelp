<?php
// PaymentList.php

require 'Salary.php';

class PaymentList{
    public $list = array();

    public function insert_salary($_salary){
        $this->list[] = $_salary;
    }

    public function calculate_sum(){
        $result = 0;
        for ($i = 0; $i<count($this->list); $i++){
            $result += $this->list[$i]->value;
        }
        return $result;
    }
}

// ---tests---
run_payment_list_tests();

function run_payment_list_tests(){
    test_calculate_sum();
    test_insert_a_salary();
}

function test_calculate_sum(){
    $tmp_salary_L = new Salary();
    $tmp_salary_L->set_data("Louis", 100);

    $tmp_salary_B = new Salary();
    $tmp_salary_B->set_data("Bear", 150);

    $tmp_payments = new PaymentList();
    $tmp_payments->insert_salary($tmp_salary_L);
    $tmp_payments->insert_salary($tmp_salary_B);

    assert($tmp_payments->calculate_sum() == 250);
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