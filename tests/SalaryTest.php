<?php
// tests/SalaryTest.php

use PHPUnit\Framework\TestCase;
use Src\Salary;

class SalaryTest extends TestCase
{
    public function testSetData()
    {
        $s = new Salary();
        $s->set_data("Louis", 100);
        $this->assertSame("Louis", $s->name);
        $this->assertSame(100, $s->value);
    }
}
