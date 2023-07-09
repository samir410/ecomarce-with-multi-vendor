<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shippingdivision;
use App\Models\Shippingdistrict;
use App\Models\Shippstates;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function AllDivision(){

        $divisions = Shippingdivision::latest()->get();
        return view('backend.ship.division.all_division', compact('divisions'));
    }

    public function AddDivision(){

        return view('backend.ship.division.add_division');
    }

    public function store_division(Request $request)
    {
        $validatedData = $request->validate([
            'division_name' => 'required',

        ]);

        Shippingdivision::insert([
                'division_name' => $request->division_name,
            ]);

            $notification = [
                'message' => 'Division Inserted Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.division')->with($notification);
        
    }

    public function edit_division($id)
    {
        $division= Shippingdivision::findOrFail($id);

        return view('backend.ship.division.division_edit', compact('division'));
    }

    public function update_division(Request $request)
    {
        $division_id = $request->id;
        Shippingdivision::findOrFail($division_id)->update([
                'division_name' => $request->division_name,
         
            ]);

            $notification = [
                'message' => 'Divition name Updated Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.division')->with($notification);
    }

    public function destroy($id)
    {
       Shippingdivision::findorfail($id)->delete();;
     
        $notification = array(
            'message' => 'ShipDistricts Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }

    
    /////////////// District CRUD ///////////////


    public function AllDistrict(){
        $district = Shippingdistrict::latest()->get();
        return view('backend.ship.district.district_all',compact('district'));
    } // End Method 

    public function AddDistrict(){
        $division = Shippingdivision::orderBy('division_name','ASC')->get();
        return view('backend.ship.district.district_add',compact('division'));
    }// End Method 


    public function StoreDistrict(Request $request){ 


        Shippingdistrict::insert([ 
            'division_id' => $request->division_id, 
            'district_name' => $request->district_name,
        ]);

       $notification = array(
            'message' => 'ShipDistricts Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.district')->with($notification); 

    }// End Method 

    public function EditDistrict($id){
        $division = Shippingdivision::orderBy('division_name','ASC')->get();
        $district = Shippingdistrict::findOrFail($id);
        return view('backend.ship.district.district_edit',compact('district','division'));

    }// End Method 


    public function UpdateDistrict(Request $request){

        $district_id = $request->id;

        Shippingdistrict::findOrFail($district_id)->update([
             'division_id' => $request->division_id, 
            'district_name' => $request->district_name,
        ]);

       $notification = array(
            'message' => 'ShipDistricts Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.district')->with($notification); 


    }// End Method 


     public function DeleteDistrict($id){

        Shippingdistrict::findOrFail($id)->delete();

         $notification = array(
            'message' => 'ShipDistricts Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 
      /////////////// State CRUD ///////////////


    public function AllState(){
        $state = Shippstates::latest()->get();
        return view('backend.ship.state.state_all',compact('state'));
    } // End Method 


    public function AddState(){
        $division = Shippingdivision::orderBy('division_name','ASC')->get();
        $district = Shippingdistrict::orderBy('district_name','ASC')->get();
         return view('backend.ship.state.state_add',compact('division','district'));
    }// End Method 

    public function StoreState(Request $request){ 

        Shippstates::insert([ 
            'division_id' => $request->division_id, 
            'district_id' => $request->district_id, 
            'states_name' => $request->states_name,
        ]);

       $notification = array(
            'message' => 'ShipState Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification); 

    }// End Method 


    public function EditState($id){
        $division = Shippingdivision::orderBy('division_name','ASC')->get();
        $district = Shippingdistrict::orderBy('district_name','ASC')->get();
        $state =  Shippstates::findOrFail($id);
         return view('backend.ship.state.state_edit',compact('division','district','state'));
    }// End Method 


     public function UpdateState(Request $request){

        $state_id = $request->id;

        Shippstates::findOrFail($state_id)->update([
            'division_id' => $request->division_id, 
            'district_id' => $request->district_id, 
            'states_name' => $request->states_name,
        ]);

       $notification = array(
            'message' => 'ShipState Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification); 


    }// End Method 

    public function DeleteState($id){

        Shippstates::findOrFail($id)->delete();

         $notification = array(
            'message' => 'ShipState Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 



    public function GetDistrict($division_id){
        $dist = Shippingdistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
            return json_encode($dist);

    }// End Method 


}
