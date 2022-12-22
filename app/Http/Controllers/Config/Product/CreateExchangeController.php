<?php

namespace App\Http\Controllers\Config\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductChar;
use App\Models\ProductExchange;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CreateExchangeController extends Controller
{
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->createExchangeProduct($request);

            DB::commit();

            return ProductResource::make(Product::with(['char','exchange.coin','exchange.product'])->withTrashed()->where('id', $request->id)->first());

        } catch (ValidationException $ex) {
            return response()->json(
                [
                'data' => [
                    'title'  => $ex->getMessage(),
                    'errors' => collect($ex->errors())->flatten()
                ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY
            );
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(
                [
                'data' => [
                    'code'        => $ex->getCode(),
                    'title'       => __('errors.server.title'),
                    'description' => $ex->getMessage(),
                ]
                ], Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    protected function createExchangeProduct($request)
    {
        ProductExchange::updateOrCreate(
            ['product_id' => $request->id,'coin_id' => $request->coin_id],
            ['amount' => $request->amount]
        );
        return $request->id;
    }
}
