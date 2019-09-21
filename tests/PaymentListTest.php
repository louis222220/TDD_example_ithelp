<?php

use PHPUnit\Framework\TestCase;
use Src\PaymentList;
use Src\Salary;

class PaymentListTest extends TestCase
{
    public function testInsertSalary()
    {
        $s = new Salary();
        $s->set_data("Louis", 100);

        $pl = new PaymentList();
        $this->assertSame(0, count($pl->list));

        $pl->insert_salary($s);
        $this->assertSame(1, count($pl->list));
        
        $this->assertSame("Louis", $pl->list[0]->name);
    }
}
