<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Items;
use App\Models\Transactions;

class HomeController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('layout.home');
    }
    public function adminInventoryPage(){
        return view('user.admin.inventory');
    }
    public function adminSalesPage(){
        return view('user.admin.sales');
    }
    public function adminPurchasesPage(){
        return view('user.admin.purchases');
    }
    public function managerPurchasesPage(){
        return view('user.manager.purchases');
    }
    public function managerSalesPage(){
        return view('user.manager.index');
    }
    public function salesPage(){
        return view('user.sales.index');
    }
    public function purchasesPage(){
        return view('user.purchases.index');
    }
    public function sellConsumerPage(){
        return view('user.consumer.sell');
    }
    public function buyConsumerPage(){
        return view('user.consumer.buy');
    }
    public function memberPage(){
        return view('user.member.index');
    }
    public function cashierPage(){
        return view('user.cashier.index');
    }

    public function getDataItems(Request $request){
        
        $items = Items::orderBy('id', 'ASC');

        if($request->name != null ){
            $items->where("name", "like", "%" . $request->name. "%");
        }

        if($request->brand != null){
            $items->where("brand", "like", "%" . $request->brand. "%" );
        }

        return [
            'status' => 200,
            'message' => true,
            'data' => $items->get()
        ];
    }

    public function customerBuyItem(Request $request){
        $item = Items::where('id', '=', $request->id)->first();
        
        $actQty = 0;
        if($request->qty != null){
            $actQty = $item->qty - $request->qty;
        }
        $item->qty = $actQty;

        $price = 0;
        $userId = auth()->user()->id;

        // check user is a member
        if($request->is_member == 1){
            //give discount for member
            $price = $item->price - ($item->price * 0.05);
        }
        if($request->is_member == 0){
            $price = $item->price;
        }

        // update or save current stock items
        $item->save();
        
        $transaction = new Transactions();
        $transaction->item_id = $item->id;
        $transaction->user_id = $userId;
        $transaction->qty = $request->qty;
        $transaction->price = $price;
        $transaction->save();

        return [
            'status' => 200,
            'message' => true,
            'data' => $item
        ];
    }

    public function getItemTransactions(Request $request){

        $items = Transactions::with(['item', 'user'])->orderBy('id', 'ASC');

        return [
            'status' => 200,
            'message' => true,
            'data' => $items->get()
        ];
    }

    public function getTotalIncome(Request $request){
        $totalIncome = Transactions::sum("price");
        return [
            'status' => 200,
            'message' => true,
            'data' => $totalIncome
        ];
    }
}
