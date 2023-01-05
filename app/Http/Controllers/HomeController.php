<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        return view('welcome', ['products' => $products]);
    }

    public function home()
    {
        $this->middleware('auth');

        return view('home');
    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('detail', ['product' => $product]);
    }


    public function orderSave(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->createOrder($request);

            DB::commit();

            return response()->json(Response::HTTP_OK);

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

    protected function createOrder($request)
    {
        $order              = new Order();
        $order->name_char   = $request->name_char;
        $order->amount      = $request->amount;
        $order->status      = $request->status;
        $order->product_id  = $request->product_id;
        $order->save();

        $orderDetail              = new OrderDetail();
        $orderDetail->coin_id     = $request->coin_id;
        $orderDetail->order_id    = $order->id;
        $orderDetail->email       = $request->email;
        $orderDetail->save();




        return $order->id;
    }

}
