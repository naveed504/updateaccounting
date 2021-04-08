<?php

namespace App\Http\Controllers;
use App\Jobs\ContactusJob;
use Illuminate\Http\Request;
use App\Models\PurchaseItem;
use App\Models\User;
use App\Models\Maindealer;
use AuthenticatesUsers;
use Carbon\Carbon;


class PurchaseGeneralControler extends Controller
{

    public function viewPurchasedetail($id , $dealer_id)
    {
        // dd($id,$dealer_id);
        $currentuser=auth()->user()->id;
        $items= PurchaseItem::find($id);
        $cal['total_amount'] = PurchaseItem::where('maindealer_id', $dealer_id)->where('user_id', $currentuser)->sum('total');
        $cal['pay_amount']   = PurchaseItem::where('maindealer_id', $dealer_id)->where('user_id', $currentuser)->sum('pay');
        $cal['remaining_amount']= $cal['total_amount'] -  $cal['pay_amount'];
   
        $pay_amount_list=PurchaseItem::where('maindealer_id', $dealer_id)->where('user_id', $currentuser)->where('total', 0)->get();
        
        $purchaseitems = purchaseitem::where('user_id', $currentuser)->where('maindealer_id', $dealer_id)->get();
       
        return view('admin.purchaseitem.viewdetail')
         ->with([
         'items' => $items,
         'purchaseitems' => $purchaseitems,
         'cal' => $cal,
         'pay_amount_list' => $pay_amount_list
         ]);

    }
    public function dealer_account(Request $request)
    {
     $currentuser=auth()->user()->id;
        $id=$request->input('id');
        $dealer_id=$request->input('dealer_id');
        $data['total_amount'] = PurchaseItem::where('maindealer_id', $dealer_id)->where('user_id', $currentuser)->sum('total');
        $data['pay_amount']   = PurchaseItem::where('maindealer_id', $dealer_id)->where('user_id', $currentuser)->sum('pay');
        $data['remaining_sum']= $data['total_amount'] -  $data['pay_amount'];
        $data['maindealer']=PurchaseItem::where('maindealer_id', $id)->where('user_id',$currentuser)->get();










       
       return response()->json($data);
       // $items=PurchaseItem::get();
     
    }
    public function savebill(Request $request)
    {
        $currentuser = auth()->user()->id;
       $payremaining= new PurchaseItem();
       $payremaining->pay = $request->pay;
       $payremaining->remaining = $request->remaining;
       $payremaining->description = $request->detail;
      
       $payremaining->user_id = $currentuser ;
       $payremaining->maindealer_id = $request->maindealer_id;
       $payremaining->save();
    }




    public function createForm()
    {
        return view('admin.jobs.index');
    }
    public function sendMain(Request $request)
    {
        try{
            

            $send=(new ContactusJob($request->all()))->delay(Carbon::now()->addMinutes(1));
            dispatch($send);

        }catch(\Exception $e){
            return $e->getMessage();

        }


    }
  



}
