<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use Illuminate\Support\Facades\DB;


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


    public function ProductSearch(Request $request){
        $request->validate(['search' => "required"]);

        $item = $request->search;
        $categories = Category::orderBy('category_name','ASC')->get();
        $products = Product::where('product_name','LIKE',"%$item%")->get();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        return view('frontend.section.search_product',compact('products','item','categories','newProduct'));
    }

    public function SearchProduct(Request $request){

        $request->validate(['search' => "required"]);
 
         $item = $request->search;
         $products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_slug','product_thambnail','selling_price','id')->limit(6)->get();
 
         return view('frontend.section.product_search',compact('products'));
 
      }// End Method 

      public function ProductDetails($id,$slug){

        $product = Product::findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        $multiImage = MultiImg::where('product_id',$id)->get();

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();

        return view('frontend.product.products_details',compact('product','product_color','product_size','multiImage','relatedProduct'));

      } // End Method 

      public function CatWiseProduct(Request $request,$id,$slug){
        $products = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        $breadcat = Category::where('id',$id)->first();
  
        return view('frontend.product.catwiseproduct',compact('products','categories','newProduct','breadcat'));
  
       }// End Method 
       public function SubCatWiseProduct(Request $request,$id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
  
        $breadsubcat = SubCategory::where('id',$id)->first();
  
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
  
        return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat','newProduct'));
  
       }// End Method 
  

}
