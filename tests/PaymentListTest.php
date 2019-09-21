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
        $s_2 = new Salary();
        $s_2->set_data("Bear", 150);

        $pl = new PaymentList();
        $this->assertSame(0, count($pl->list));

        $pl->insert_salary($s);
        $pl->insert_salary($s_2);
        $this->assertSame(2, count($pl->list));
        
        $this->assertSame("Louis", $pl->list[0]->name);
        return $pl;
    }

    /**
     * @depends testInsertSalary
     */
    public function testCalculateSum($pl)
    {
        $this->assertSame(250, $pl->calculate_sum());
    }

}
