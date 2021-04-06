<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormValidation;
use App\Models\MainDealer;

class MainDealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultDealer=MainDealer::all();
    return view('admin.dealers.index',compact('resultDealer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.dealers.add_new_dealer');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormValidation $request)
    {
        
        try{
            
       $dealer= new MainDealer;
       $request->hasFile( 'dealer_profile' );
       $destinationPath = storage_path( 'app/public/dealers' );
       $file = $request->dealer_profile;
       $fileName = time() . '.'.$file->clientExtension();
       $file->move($destinationPath, $fileName );
       $dealer->dealer_profile = $fileName;
       $dealer->dealer_name= $request->dealer_name;
       $dealer->dealer_location= $request->dealer_location;
      $status= $dealer->save();
      if($status){
        return redirect()->back()->with('alert-success', 'Dealer Data Inserted');
      }else{
        return redirect()->back()->with('alert-danger', 'Dealer Data Does Not Inserted Pleas Try Again');
          
      }
        }catch (\Exception $e)
              {
                return redirect()->back()->with('alert-danger', $e->getMessage());            }


       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singledealer= MainDealer::find($id);
        return view('admin.dealers.add_new_dealer', compact('singledealer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormValidation $request, $id)
    {
    try{
       $updateDealer= MainDealer::find($id);
       $updateDealer->dealer_name =$request->dealer_name;
       $updateDealer->dealer_location =$request->dealer_location;
       if($request->dealer_profile == ''){
          $updateDealer->dealer_profile = $updateDealer->dealer_profile;
       }else{
        $request->hasFile( 'dealer_profile' );
        $destinationPath = storage_path( 'app/public/dealers' );
        $file = $request->dealer_profile;
        $fileName = time() . '.'.$file->clientExtension();
        $file->move($destinationPath, $fileName );
        $updateDealer->dealer_profile= $fileName;
       }
       $status=$updateDealer->save();
       if($status)
       {
           return redirect('maindealer')->with('alert-success','Dealers Data Updated Successfully' );
       }else
       {
           return redirect()->back()->with('alert-danger',' Dealers Data Does Not Updated');
       }
    }catch(\Exception $e){
        return redirect()->back()->with('alert-danger', $e->getMessage());

    }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=MainDealer::find($id);
        $result->delete();
        return redirect()->back()->with('alert-success',' Dealers Deleted Successfully');
    }
}
