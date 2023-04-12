<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function index()
    {
        $cupon = Cupon::latest()->get();

        return view('backend.cupon.all_cupon', compact('cupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cupon.add_cupon');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['cupon_name' => 'required']);
        $check = Cupon::where('cupon_name', $request->input('cupon_name'))->first();
        $cupon = new Cupon();
        if (! $check) {
            $cupon->cupon_name = strtoupper($request->cupon_name);
            $cupon->cupon_discount = $request->cupon_discount;
            $cupon->cupon_validity = $request->cupon_validity;
            $cupon->created_at = Carbon::now();
            $cupon->save();
            $notification = [
                'message' => 'Coupon Inserted Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.cupon')->with($notification);
        } else {
            $notification = [
                'message' => 'Coupon Inserted unSuccessfully',
                'alert-type' => 'danger',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
        Cupon::findOrFail($id)->delete();

        $notification = [
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }// End Method

    public function edit($id)
    {
        $cupon = Cupon::findOrFail($id);

        return view('backend.cupon.cupon_edit', compact('cupon'));
    }// End Method

    public function update(Request $request)
    {
        $cupon_id = $request->id;

        Cupon::findOrFail($cupon_id)->update([
            'cupon_name' => strtoupper($request->cupon_name),
            'cupon_discount' => $request->cupon_discount,
            'cupon_validity' => $request->cupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.cupon')->with($notification);
    }// End Method
}
