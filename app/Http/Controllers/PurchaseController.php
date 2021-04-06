<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchaseitem;
use App\Models\Maindealer;
use App\Models\User;
use AuthenticatesUsers;

use App\Http\Requests\Purchaserequest;


class PurchaseController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentuser=auth()->user()->id;
        $purchaseitems= purchaseitem::with('dealers')->where('user_id',$currentuser)->get();
       // dd($purchaseitems);
        return view('admin.purchaseitem.index',compact('purchaseitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dealers= MainDealer::all();
        return view('admin.purchaseitem.add_quotation', compact('dealers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Purchaserequest $request)
    {
    //   return $request->all();
  
        
        try{
           
            $purchasing= new PurchaseItem;
            $request->hasFile('item_photo');
            $destinationPath = storage_path('app/public/purchaseitems');
            $file = $request->item_photo;
            $fileName = time() . '.'.$file->clientExtension();
            $file->move($destinationPath, $fileName );
            $purchasing->item_photo = $fileName;
            $purchasing->maindealer_id= $request->maindealer_id;
            $purchasing->total= $request->total;
            $purchasing->pay= $request->pay;
            $purchasing->remaining= $request->remaining;
            $purchasing->description= $request->description;
            $purchasing->created_by= auth()->user()->name;
            $purchasing->user_id= auth()->user()->id;
            
           $status= $purchasing->save();
           if($status){
             return redirect()->back()->with('alert-success', 'Item listed Successfully');
           }else{
             return redirect()->back()->with('alert-danger', 'Item Does Not listed Please Try Again');
               
           }
             }catch (\Exception $e)
                   {
                      return redirect()->back()->with('alert-danger',$e->getMessage());
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
        $dealers= MainDealer::all();
        $singlepurchaseitem= PurchaseItem::find($id);
        return view('admin.purchaseitem.add_quotation')
        ->with('dealers',$dealers)
        ->with('singlepurchaseitem',$singlepurchaseitem);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Purchaserequest $request, $id)
    {
        try{
            $updatepurchaseitem= PurchaseItem::find($id);
            $updatepurchaseitem->maindealer_id =$request->maindealer_id;
            $updatepurchaseitem->total =$request->total;
            $updatepurchaseitem->pay =$request->pay;
            $updatepurchaseitem->remaining =$request->remaining;
            $updatepurchaseitem->description =$request->description;
            $updatepurchaseitem->created_by= auth()->user()->name;
            $purchasing->user_id= auth()->user()->id;

            if($request->item_photo == ''){
               $updatepurchaseitem->item_photo = $updatepurchaseitem->item_photo;
            }else{
             $request->hasFile( 'item_photo' );
             $destinationPath = storage_path( 'app/public/purchaseitems' );
             $file = $request->item_photo;
             $fileName = time() . '.'.$file->clientExtension();
             $file->move($destinationPath, $fileName );
             $updatepurchaseitem->item_photo= $fileName;
            }
            $status=$updatepurchaseitem->save();
            if($status)
            {
                return redirect('purchaseitem')->with('alert-success','Item List Updated Successfully' );
            }else
            {
                return redirect()->back()->with('alert-danger','Item List Data Does Not Updated');
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
        $result=PurchaseItem::find($id);
        $result->delete();
        return redirect()->back()->with('alert-success','Item List Deleted Successfully');
    }
}
