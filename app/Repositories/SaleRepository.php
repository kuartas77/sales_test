<?php


namespace App\Repositories;


use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Services\PricingService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class SaleRepository implements BaseRepository
{
    private Sale $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function all()
    {
        return $this->sale->query()->with('details.product')->get();
    }

    public function store(FormRequest $request): bool
    {
        try {
            DB::beginTransaction();
            $total = 0;
            $subtotal = 0;
            $tax = 0;
            $details = collect();

            $products = $request->input('products');

            foreach ($products as $product) {
                $dbProduct = Product::active()->firstWhere('sku', $product['sku']);
                if (!$dbProduct) {
                    throw new Exception("Product disabled.");
                }

                $service = new PricingService($dbProduct, $product['count']);

                $service->calculateTax()->calculateSubtotalProduct()->calculateTotalPriceProduct();

                $subtotal += $service->getSubtotal();
                $tax += $service->getTaxes();
                $total += $service->getTotal();

                $saleDetail = new SaleDetail();
                $saleDetail->product_id = $dbProduct->id;
                $saleDetail->unit_value = $dbProduct->price;
                $saleDetail->tax = $service->getTaxes();
                $saleDetail->quantity = $product['count'];

                $details->push($saleDetail);
            }

            $sale = $this->sale;
            $sale->client = $request->input('client');
            $sale->phone = $request->input('phone');
            $sale->email = $request->input('email');
            $sale->subtotal = $subtotal;
            $sale->total_taxes = $tax;
            $sale->total = $total;
            $sale->save();

            $sale->details()->saveMany($details);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            logger($e->getMessage(), $e->getTrace());
            return false;
        }
    }

    public function update(FormRequest $request, Model $model): bool
    {
        return false;
    }

    public function delete(Model $model): ?bool
    {
        return $model->forceDelete();
    }
}
