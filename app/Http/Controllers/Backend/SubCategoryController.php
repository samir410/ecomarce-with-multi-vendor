<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Image;


class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategory = SubCategory::latest()-> get();
        return view('backend.subcategory.all_subcategory',compact('subcategory'));
    }


    public function create()
    {
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('backend.subcategory.add_subcategory',compact('categories'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subcategory_name' => 'required',  
            'category_id' => 'required',   
        ]);
      if ($request->input('category_id')) {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
        ]);

         $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
         );

        return redirect()->route('all.subcategory')->with($notification); 
      }else{
        $notification = array(
            'message' => 'SubCategory Inserted fail',
            'alert-type' => 'danger'
         );

        return redirect()->route('all.subcategory')->with($notification); 
      }
    }


    public function edit($id)
    {
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
           'category_id' => $request->category_id,
           'subcategory_name' => $request->subcategory_name,
           'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
       ]);

      $notification = array(
           'message' => 'SubCategory Updated Successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('all.subcategory')->with($notification); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::findorfail($id)->delete();
        $notification = array(
            'message' => 'SubCategory deleted', 
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
