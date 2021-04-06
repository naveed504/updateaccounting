<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseItem;
use App\Models\User;
use App\Models\Maindealer;
use AuthenticatesUsers;


class PurchaseGeneralControler extends Controller
{

    public function viewPurchasedetail($id)
    {
       
            $currentuser=auth()->user()->id;
      
        $items= PurchaseItem::find($id);
        $cal['total_amount']= PurchaseItem::where('user_id', $currentuser)->sum('total');
        $cal['pay_amount']= PurchaseItem::where('user_id', $currentuser)->sum('pay');

        $cal['remaining_amount']= PurchaseItem::where('user_id', $currentuser)->sum('remaining');
        


        $purchaseitems= purchaseitem::where('user_id', $currentuser)->get();
       
        return view('admin.purchaseitem.viewdetail')
         ->with('items', $items)
         ->with('purchaseitems',$purchaseitems)
         ->with('cal',$cal);

    }
    public function dealer_account(Request $request)
    {
         $currentuser=auth()->user()->id;
        $id=$request->input('id');
       $data =purchaseitem::where('maindealer_id', $id)->where('user_id',$currentuser)->sum('remaining');
         //$data['purchaseitems']= purchaseitem::where('user_id', $currentuser)->get();
       return json_encode($data);
       // $items=PurchaseItem::get();
     
    }
    public function savebill()
    {
        return "ok";
    }
}
