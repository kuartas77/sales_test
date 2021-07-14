<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Traits\RequestTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    use RequestTrait;

    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        abort_unless($request->expectsJson(), 401);

        return ProductResource::collection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProduct $request
     * @return JsonResponse
     */
    public function store(StoreProduct $request): JsonResponse
    {
        abort_unless($request->expectsJson(), 401);

        $status = $this->repository->store($request);

        return $this->response($status, $status ? 201 : 404);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Product $product
     * @return ProductResource
     */
    public function show(Request $request, Product $product): ProductResource
    {
        abort_unless($request->expectsJson(), 401);

        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProduct $request
     * @param Product $product
     * @return ProductResource|JsonResponse
     */
    public function update(UpdateProduct $request, Product $product)
    {
        abort_unless($request->expectsJson(), 401);

        if ($this->repository->update($request, $product)) {
            return new ProductResource($product);
        }

        return $this->response(false, 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Request $request, Product $product): JsonResponse
    {
        abort_unless($request->expectsJson(), 401);

        $status = $this->repository->delete($product);

        return $this->response($status, $status ? 201 : 404);
    }
}
