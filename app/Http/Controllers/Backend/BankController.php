<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Order;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class BankController extends Controller
{
    public function index(Request $request){
        $bankledgers = Bank::get();
        return view('backend.accounts.bank_ledger_list',compact('bankledgers'));
    }

    public function create()
    {
        $bankledgers = Bank::get();
        return view('backend.accounts.bank_ledger_create',compact('bankledgers'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'invoice_no'        => 'required|string|max:255',
            'receive_amount'    => 'required|numeric',
            'payment_date'      => 'required|date',
            'transaction_num'   => 'nullable|numeric|digits:11',
            'bank_name'         => 'nullable|string|max:255',
        ]);

        $bankledgers = new Bank();
        $bankledgers->invoice_no = $request->invoice_no;
        $bankledgers->receive_amount = $request->receive_amount;
        $bankledgers->payment_date = $request->payment_date;
        $bankledgers->transaction_num = $request->transaction_num;
        $bankledgers->bank_name = $request->bank_name;
        $bankledgers->save();

        $notification = [
            'message' => 'Bank Ledger Created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('bank.ledgers.list')->with($notification);
    }

    public function edit($id)
    {
        $bankledgers = Bank::findOrFail($id);
        return view('backend.accounts.bank_ledger_edit',compact('bankledgers'));
    }

    public function update(Request $request, $id)
    {
        $bankledgers = Bank::findOrFail($id);
        $this->validate($request,[
            'invoice_no'        => 'required|string|max:255',
            'receive_amount'    => 'required|numeric',
            'payment_date'      => 'required|date',
            'transaction_num'   => 'nullable|numeric|digits:11',
            'bank_name'         => 'nullable|string|max:255',
        ]);

        $bankledgers->invoice_no = $request->invoice_no;
        $bankledgers->receive_amount = $request->receive_amount;
        $bankledgers->payment_date = $request->payment_date;
        $bankledgers->transaction_num = $request->transaction_num;
        $bankledgers->bank_name = $request->bank_name;
        $bankledgers->save();

        $notification = [
            'message' => 'Bank Ledger Edited Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('bank.ledgers.list')->with($notification);
    }

    public function destroy($id)
    {
        $bankledgers = Bank::findOrFail($id);
        $bankledgers->delete();
        $notification = array(
            'message' => 'Bank Ledger Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
