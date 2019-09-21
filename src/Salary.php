<?php
namespace Src;

class Salary{
    public $name;
    public $value;
    public function set_data($_name, $_value)
    {
        $this->name = $_name;
        $this->value = $_value;
    }
}
