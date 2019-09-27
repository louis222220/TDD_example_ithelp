<?php
use PHPUnit\Framework\TestCase;
use Src\Payday;

class PaydayTest extends TestCase
{
    public function testPaydayIsSlow()
    {
        $payday = new Payday();
        $paid_result = $payday->pay();
        $this->assertSame("paid", $paid_result[0]);
    }

    public function testPaydayByMock()
    {
        $mock_payday = Mockery::mock(Payday::class);
        $mock_payday->shouldReceive('pay')
            ->once()
            ->andReturn(['paid', 'fast']);

        $paid_result = $mock_payday->pay();
        $this->assertSame("paid", $paid_result[0]);

        Mockery::close();
    }
}
