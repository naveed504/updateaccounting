<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormValidation;

class MainDealer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('admin.dealers.index');
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
       $dealer->save();
       return redirect()->back('successmsg', 'Dealer Data Inserted');
        }catch (\Exception $e)
              {
                  return redirect()->back()->with('alert-danger', 'Please enter valid Url link');
              }


       

        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
