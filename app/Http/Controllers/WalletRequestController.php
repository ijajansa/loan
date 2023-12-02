<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\WalletRequest;

class WalletRequestController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = WalletRequest::join('users','users.id','wallet_requests.dsa_id')->orderBy('wallet_requests.id','ASC')->where('wallet_requests.type',1);
    		if($request->status_id!=null)
    		{
    			$data = $data->where('wallet_requests.status',$request->status_id);
    		}
    		else
    		{
    			$data = $data->where('wallet_requests.status','pending');
    		}
    		if($request->search_id!=null)
    		{
    			$data = $data->where('wallet_requests.amount',$request->search_id);
    		}
    		$data = $data->select('wallet_requests.*','users.first_name','users.last_name');
            return DataTables::of($data)
    		->addColumn('status',function($data){
    			if($data->status =="success")
    			{
    				return '<button class="btn btn-success btn-sm">Approve</button>';
    			}
    			elseif($data->status =="reject")
    			{
    				return '<button class="btn btn-danger btn-sm">Reject</button>';
    			}
    			else
    			{
    				return '<button class="btn btn-warning btn-sm">Pending</button>';
    			}
    		})
    		->addColumn('action',function($data){
    			return '<a href="'.url('wallet-requests/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button></a>';
    		})
    		->addColumn('full_name',function($data){
    			return $data->first_name.' '.$data->last_name;
    		})
    		->rawColumns(['status','full_name','action'])->make(true);
    	}
        
        $agents = User::where('is_active',1)->where('role_id',2)->orderBy('first_name','ASC')->get();
    	return view('wallet-requests.all',compact('agents'));
    }

    public function add()
    {
    	return view('wallet-requests.add');
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
        $data = WalletRequest::join('users','users.id','wallet_requests.dsa_id')->where('wallet_requests.id',$id)->select('wallet_requests.*','users.first_name','users.last_name')->first();
        if($data)
        {
            return view('wallet-requests.edit',compact('data'));
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function update(Request $request)
    {
        $a = $request->validate([
    		'status' => 'required',
    		'transaction_id' => "required_if:status,==,'success'"
    	]);


        $data = WalletRequest::find($request->id);
        $data->status = $request->status;
    	$data->transaction_id = $request->transaction_id ?? null;
        $data->save();

        if($data)
        {
        	$user = User::find($data->dsa_id);
        	if($user)
        	{
        		if($data->status=='reject')
        		{
        			$user->wallet = $user->wallet + $data->amount;
        			$user->save();
        		}
        	}
        }

        return redirect('wallet-requests')->with('success','Wallet request updated successfully');
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
