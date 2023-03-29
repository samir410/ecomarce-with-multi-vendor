<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Banner;
use Image;

class SliderBannerController extends Controller
{

    public function slider_index()
    {
        $slider = Slider::latest()-> get();
        return view('backend.slider.all_slider',compact('slider'));
    }

    public function slider_create()
    {
        return view('backend.slider.add_slider');
    }

    public function slider_store(Request $request)
    {
        $validatedData = $request->validate([
            'slider_title' => 'required',
            'short_title' => 'required',
            'slider_image' => 'required',
          
        ]);
      if ($request->input('slider_title')) {
         $image = $request->file('slider_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(400,400)->save('upload/slider_banner/'.$name_gen);
         $save_url = 'upload/slider_banner/'.$name_gen;

         Slider::insert([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $save_url, 
         ]);

         $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
         );

        return redirect()->route('all.slider')->with($notification); 
      }
    }
  
    public function slider_edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }

    public function slider_update(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_image')) {

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(2376,807)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        if (file_exists($old_img)) {
           unlink($old_img);
        }

        Slider::findOrFail($slider_id)->update([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Slider Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification); 

        } else {

             Slider::findOrFail($slider_id)->update([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title, 
        ]);

       $notification = array(
            'message' => 'Slider Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification); 

        } // end else
    }

    public function slider_destroy($id)
    {
        $slider = Slider::findorfail($id);
        $img = $slider->slider_image;
        unlink($img);
        $slider->delete();
        $notification = array(
            'message' => 'Slider deleted', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    // /////////////////////////////////////////////////////////////////
    public function banner_index()
    {
        $banner = Banner::latest()-> get();
        return view('backend.banner.all_banner',compact('banner'));
    }

    public function banner_create()
    {
        return view('backend.banner.add_banner');
    }

    public function banner_store(Request $request)
    {
        $validatedData = $request->validate([
            'banner_title' => 'required',
            'banner_url' => 'required',
            'banner_image' => 'required',
          
        ]);
        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(768,450)->save('upload/slider_banner/'.$name_gen);
        $save_url = 'upload/slider_banner/'.$name_gen;

        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Banner Inserted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.banner')->with($notification);
    }
  
    public function banner_edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.banner_edit',compact('banner'));
    }

    public function banner_update(Request $request)
    {
        $banner_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('banner_image')) {

        $image = $request->file('banner_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
        $save_url = 'upload/banner/'.$name_gen;

        if (file_exists($old_img)) {
           unlink($old_img);
        }

        Banner::findOrFail($banner_id)->update([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Banner Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.banner')->with($notification); 

        } else {

            Banner::findOrFail($banner_id)->update([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url, 
        ]);

       $notification = array(
            'message' => 'Banner Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.banner')->with($notification); 

        } // end else
    }
    public function banner_destroy($id)
    {
        $banner = Banner::findorfail($id);
        $img = $banner->banner_image;
        unlink($img);
        $banner->delete();
        $notification = array(
            'message' => 'Banner deleted', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
