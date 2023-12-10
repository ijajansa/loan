<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\LoanMaster;
use App\Models\BankCommission;

class BankCommissionController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = BankCommission::join('loan_masters','loan_masters.id','bank_commissions.loan_master_id')->orderBy('bank_commissions.id','ASC');
            if($request->loan_id!=null)
            {
                $data = $data->where('bank_commissions.loan_master_id',$request->loan_id);
            }
            if($request->search_id!=null)
            {
                $data = $data->where(function($query) use ($request){
                	$query->where('bank_name','like','%'.$request->search_id.'%')->orWhere('bank_commission','like','%'.$request->search_id.'%');
                });
            }
            $data = $data->select('bank_commissions.*','loan_masters.name');
    		return DataTables::of($data)
    		->addColumn('status',function($data){
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
    			return '<a href="'.url('bank-commissions/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;Edit</button></a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" onclick="deleteRecord('.$data->id.')"><i class="icon ni ni-trash"></i></button>';
    		})
    		->rawColumns(['status','action'])->make(true);
    	}
        
        $masters = LoanMaster::where('is_active',1)->orderBy('name','ASC')->get();
    	return view('commissions.all',compact('masters'));
    }

    public function add()
    {
        $masters = LoanMaster::where('is_active',1)->orderBy('name','ASC')->get();

    	return view('commissions.add',compact('masters'));
    }

    public function insert(Request $request)
    {
    	$request->validate([
    		'loan_id' => 'required',
    		'bank_name' => 'required|regex:/^[\pL\s\-]+$/u',
    		'commission' => 'required|numeric'
    	],[
    	    'loan_id.required' => 'The loan type field is required.'
    	    ]);
    	    

    	$data = new BankCommission();
    	$data->bank_name = $request->bank_name;
    	$data->bank_commission = $request->commission;
    	$data->loan_master_id = $request->loan_id;

    	$data->save();

    	return redirect('bank-commissions')->with('success','Bank commission added successfully');
    }

    public function edit($id)
    {
        $data = BankCommission::find($id);
        if($data)
        {
            $masters = LoanMaster::where('is_active',1)->orderBy('name','ASC')->get();
            return view('commissions.edit',compact('data','masters'));
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function update(Request $request)
    {
        $request->validate([
    		'loan_id' => 'required',
    		'bank_name' => 'required|regex:/^[\pL\s\-]+$/u',
    		'commission' => 'required|numeric'
    	],[
    	    'loan_id.required' => 'The loan type field is required.'
    	    ]);


        $data =BankCommission::find($request->id);
        $data->bank_name = $request->bank_name;
    	$data->bank_commission = $request->commission;
    	$data->loan_master_id = $request->loan_id;
        $data->save();

        return redirect('bank-commissions')->with('success','Bank commission updated successfully');
    }

    public function status($id)
    {
    	$data= BankCommission::find($id);
    	if($data && $data->is_active==1)
    		$data->is_active = 0;
    	else
    		$data->is_active = 1;
    	$data->save();
        return redirect()->back()->with('success','Bank commission status updated successfully');

    }

    public function delete($id)
    {
        $data= BankCommission::find($id);
        if($data)
        $data->delete();
        return redirect()->back()->with('success','Bank commission deleted successfully');

    }
}
