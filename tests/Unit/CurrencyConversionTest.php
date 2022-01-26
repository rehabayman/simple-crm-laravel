<?php

namespace Tests\Unit;

use App\Services\CurrencyConverterService;
use PHPUnit\Framework\TestCase;

class CurrencyConversionTest extends TestCase
{
    public function test_usd_to_egp_conversion()
    {
        $usd_amount = 10;
        $this->assertEquals(160, (new CurrencyConverterService())->convert($usd_amount, 'usd', 'egp'));
    }

    public function test_usd_to_aed_conversion()
    {
        $usd_amount = 10;
        $this->assertEquals(60, (new CurrencyConverterService())->convert($usd_amount, 'usd', 'aed'));
    }

    public function test_usd_to_sar_conversion()
    {
        $usd_amount = 10;
        $this->assertEquals(50, (new CurrencyConverterService())->convert($usd_amount, 'usd', 'sar'));
    }

    public function test_egp_to_usd_conversion()
    {
        $egp_amount = 160;
        $this->assertEquals(0, (new CurrencyConverterService())->convert($egp_amount, 'egp', 'usd'));
    }
}
