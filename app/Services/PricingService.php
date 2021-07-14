<?php


namespace App\Services;


use App\Models\Product;

class PricingService
{
    private Product $product;
    private int $count;
    private float $total;
    private float $subtotal;
    private float $taxes;

    public function __construct(Product $product, $count)
    {
        $this->subtotal = 0.0;
        $this->taxes = 0.0;
        $this->total = 0.0;
        $this->product = $product;
        $this->count = $count;
    }

    public function calculateTax(): PricingService
    {
        $this->taxes = ($this->product->taxes / 100);

        return $this;
    }

    public function calculateSubtotalProduct(): PricingService
    {
        $this->subtotal = ($this->product->price * $this->count);

        return $this;
    }

    public function calculateTotalPriceProduct()
    {
        $this->taxes = ($this->subtotal * $this->taxes);
        $this->total = ($this->subtotal + $this->taxes);
    }

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return ceil($this->subtotal);
    }

    /**
     * @return float
     */
    public function getTaxes(): float
    {
        return $this->taxes;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return ceil($this->total);
    }


}
