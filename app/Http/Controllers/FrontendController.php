<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $skip_category_0 = Category::skip(1)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->limit(5)->get();

        return view('frontend.index',compact('skip_category_0','skip_product_0'));

    }
    public function frontend()
    {
        $cat = Category::latest()->get();
        return view('frontend.master_dashboard', compact('cat'));
    }
    public function All_Vendor()
    {
        $vendor = User::where('status','active')->where('role','vendor')->orderBy('id','DESC')->get();
        return view('frontend.pages.all_vendor', compact('vendor'));
    }

    public function VendorDetails($id)
    {
        $vendor = User::findOrFail($id);
        $vproduct = Product::where('vendor_id',$id)->latest()->get()->all();
        return view('frontend.pages.vendor_details_page',compact('vendor','vproduct'));
    }
}
