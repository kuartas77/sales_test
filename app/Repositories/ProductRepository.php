<?php


namespace App\Repositories;


use App\Models\Product;
use App\Traits\RequestTrait;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ProductRepository implements BaseRepository
{
    use RequestTrait;

    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function all()
    {
        return $this->product->query()->active()->get();
    }

    public function store($request): bool
    {
        try {
            DB::beginTransaction();
            $this->product->sku = $request->input('sku');
            $this->product->name = $request->input('sku');
            $this->product->description = $request->input('description');
            $this->product->photo = $this->savePhoto($request);
            $this->product->price = $request->input('price');
            $this->product->taxes = $request->input('taxes');
            $this->product->active = $request->input('active');
            $this->product->save();
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
        try {
            DB::beginTransaction();
            $model->sku = $request->input('sku', $model->sku);
            $model->name = $request->input('name', $model->name);
            $model->description = $request->input('description', $model->description);
            $model->photo = $request->filled('photo') ? $this->savePhoto($request) : $model->photo;
            $model->price = $request->input('price', $model->price);
            $model->taxes = $request->input('taxes', $model->taxes);
            $model->active = $request->input('active', $model->active);
            $model->save();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            logger($e->getMessage(), $e->getTrace());
            return false;
        }
    }

    public function delete(Model $model): ?bool
    {
        return $model->forceDelete();
    }
}
