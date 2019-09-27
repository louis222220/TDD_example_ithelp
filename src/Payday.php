<?php
namespace Src;

class Payday
{
    public function pay()
    {
        // It will do something so slowly
        sleep(2);

        return ['paid', 'is', 'so', 'slow'];
    }
}
