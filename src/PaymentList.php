<?php
namespace Src;

class PaymentList
{
    public $list = array();
    public function insert_salary($_salary)
    {
        $this->list[] = $_salary;
    }
}
