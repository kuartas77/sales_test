<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Services\PricingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PricingServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_price()
    {
        $product = Product::factory()->make([
            'price' => 100000,
            'taxes' => 19,
        ]);

        $service = new PricingService($product, 10);
        $service->calculateTax()->calculateSubtotalProduct()->calculateTotalPriceProduct();

        $this->assertEquals(190000.0, $service->getTaxes());
        $this->assertEquals(1000000.0, $service->getSubtotal());
        $this->assertEquals(1190000.0, $service->getTotal());
    }
}
