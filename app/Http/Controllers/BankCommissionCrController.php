<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\LoanMaster;
use App\Models\BankCommissionCr;

class BankCommissionCrController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = BankCommissionCr::orderBy('id','ASC');
            return DataTables::of($data)->addColumn('status',function($data){
    			if($data->is_active ==1)
    			{
    				return '<button class="btn btn-success btn-sm" onclick="statusUpdate('.$data->id.')">Active</button>';
    			}
    			else
    			{
    				return '<button class="btn btn-danger btn-sm" onclick="statusUpdate('.$data->id.')">Inactive</button>';
    			}
    		})
    		->addColumn('action',function($data){
    			return '<a href="'.url('credit-card-commissions/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;Edit</button></a>';
    		})
    		->addColumn('commission',function($data){
    			return '₹ '.$data->bank_commission;
    		})
    		->rawColumns(['status','commission','action'])->make(true);
    	}
        
        $masters = LoanMaster::where('is_active',1)->orderBy('name','ASC')->get();
    	return view('credit-card-commissions.all',compact('masters'));
    }

    public function add()
    {
    	return view('credit-card-commissions.add');
    }

    public function insert(Request $request)
    {
    	$request->validate([
    		'bank_name' => 'required',
    		'commission' => 'required'
    	]);
    	    

    	$data = new BankCommissionCr();
    	$data->bank_name = $request->bank_name;
    	$data->bank_commission = $request->commission;

    	$data->save();

    	return redirect()->back()->with('success','Bank commission added successfully');
    }

    public function edit($id)
    {
        $data = BankCommissionCr::find($id);
        if($data)
        {
            return view('credit-card-commissions.edit',compact('data'));
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function update(Request $request)
    {
        $request->validate([
    		'bank_name' => 'required',
    		'commission' => 'required'
    	]);


        $data =BankCommissionCr::find($request->id);
        $data->bank_name = $request->bank_name;
    	$data->bank_commission = $request->commission;
        $data->save();

        return redirect()->back()->with('success','Bank commission updated successfully');
    }

    public function status($id)
    {
    	$data= BankCommissionCr::find($id);
    	if($data && $data->is_active==1)
    		$data->is_active = 0;
    	else
    		$data->is_active = 1;
    	$data->save();
        return redirect()->back()->with('success','Bank commission status updated successfully');

    }
}
