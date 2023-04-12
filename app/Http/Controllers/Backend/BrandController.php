<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::latest()->get();

        return view('backend.brand.all_brands', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_brand_page()
    {
        return view('backend.brand.add_brand');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',

        ]);
        if ($request->input('brand_name')) {
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::insert([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function UpdateBrand(Request $request)
    {
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Brand Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            ]);

            $notification = [
                'message' => 'Brand Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.brand')->with($notification);
        } // end else
    }// End Method

    public function destroy($id)
    {
        $brand = Brand::findorfail($id);
        $img = $brand->brand_image;
        unlink($img);
        $brand->delete();
        $notification = [
            'message' => 'project deleted',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
