<?php
namespace Src;

class PaymentList
{
    public $list = array();
    public function insert_salary($_salary)
    {
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
