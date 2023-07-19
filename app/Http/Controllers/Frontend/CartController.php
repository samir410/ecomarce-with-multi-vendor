<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;



class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
 
        $product = Product::findOrFail($id);
        $request->validate([
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required|numeric|min:1',
            'product_name' => 'required',
        ]);
    

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method

    public function AddMiniCart(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,  
            'cartTotal' => $cartTotal

        ));
    }// End Method
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }// End Method

    public function AddToCartDetails(Request $request, $id){

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method

    public function MyCart(){

        return view('frontend.mycart.view_mycart');

    }// End Method

    public function GetCartProduct(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,  
            'cartTotal' => $cartTotal

        ));

    }// End Method
    
    public function CartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);

    }// End Method

    public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty -1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['cupon_name'];
            $coupon = Cupon::where('cupon_name',$cupon_name)->first();

            Session::put('coupon', [
                'cupon_name' => $coupon->cupon_name,
                'cupon_discount' => $coupon->cupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->cupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->cupon_discount / 100))
            ]); 
        }

        return response()->json('Decrement');

    }// End Method

    public function CartIncrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty +1);
        
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['cupon_name'];
            $coupon = Cupon::where('cupon_name',$cupon_name)->first();

            Session::put('coupon', [
                'cupon_name' => $coupon->cupon_name,
                'cupon_discount' => $coupon->cupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->cupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->cupon_discount / 100))
            ]);
        }


        return response()->json('Decrement');

    }// End Method

    

    public function CouponApply(Request $request){

        $coupon = Cupon::where('cupon_name',$request->cupon_name)->where('cupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            Session::put('coupon', [
                'cupon_name' => $coupon->cupon_name,
                'cupon_discount' => $coupon->cupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->cupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->cupon_discount / 100))
            ]);
        
            return response()->json([
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ]);
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
        

    }// End Method

    public function couponCalculation() {
            if (Session::has('coupon')) {
                return response()->json([
                    'subtotal' => Cart::total(),
                    'cupon_name' => session()->get('coupon')['cupon_name'],
                    'cupon_discount' => session()->get('coupon')['cupon_discount'],
                    'discount_amount' => session()->get('coupon')['discount_amount'],
                    'total_amount' => session()->get('coupon')['total_amount'],
                ]);
            } else {
                return response()->json([
                    'total' => Cart::total(),
                ]);
            }
    }
    public function CouponRemove(){

        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);

    }// End Method








}
