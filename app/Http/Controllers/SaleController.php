<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSale;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Repositories\SaleRepository;
use App\Traits\RequestTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SaleController extends Controller
{
    use RequestTrait;

    private SaleRepository $repository;

    public function __construct(SaleRepository $repository)
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

        return SaleResource::collection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSale $request
     * @return JsonResponse
     */
    public function store(StoreSale $request): JsonResponse
    {
        abort_unless($request->expectsJson(), 401);

        $status = $this->repository->store($request);

        return $this->response($status, $status ? 201 : 404);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Sale $sale
     * @return SaleResource
     */
    public function show(Request $request, Sale $sale): SaleResource
    {
        abort_unless($request->expectsJson(), 401);

        $sale->load('details.product');

        return new SaleResource($sale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Sale $sale
     * @return JsonResponse
     */
    public function destroy(Request $request, Sale $sale): JsonResponse
    {
        abort_unless($request->expectsJson(), 401);

        $status = $this->repository->delete($sale);

        return $this->response($status, $status ? 201 : 404);
    }
}
