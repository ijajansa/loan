<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\CreditCard;
use App\Models\LoanUserDocument;
use App\Models\LoanMaster;
use App\Models\BankCommissionCr;
use App\Models\WalletRequest;

class CardApplicationController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
	    	$data = CreditCard::orderBy('credit_cards.id','DESC')->join('users','users.id','credit_cards.dsa_id');
            if($request->name!=null)
            {
                $data = $data->where(function($query) use ($request){
                    $query->where('credit_cards.first_name','like','%'.$request->name.'%')->orWhere('credit_cards.last_name','like','%'.$request->name.'%')->orWhere('credit_cards.dob','like','%'.$request->name.'%')->orWhere('credit_cards.email','like','%'.$request->name.'%')->orWhere('credit_cards.mobile_number','like','%'.$request->name.'%')->orWhere('credit_cards.income_salary','like','%'.$request->name.'%');
                });
            }
            if($request->agent_id!=null)
            {
                $data = $data->where('credit_cards.dsa_id',$request->agent_id);
            }
            
            $data = $data->select('credit_cards.*','users.first_name as agent_first','users.last_name as agent_last');
    		return DataTables::of($data)
    		->addColumn('full_name',function($data){
    			return $data->first_name." ".$data->last_name;
    		})
    		->addColumn('status',function($data){
    			if($data->status =="Process")
    			{
    				return '<button class="btn btn-warning btn-sm">Processing</button>';
    			}
    			else if($data->status =="Login")
    			{
    				return '<button class="btn btn-primary btn-sm">Login</button>';
    			}
                else if($data->status =="Cancel")
                {
                    return '<button class="btn btn-danger btn-sm">Cancelled</button>';
                }
                else if($data->status =="PDC")
                {
                    return '<button class="btn btn-danger btn-sm">PDC</button>';
                }
                else
                {
                    return '<button class="btn btn-success btn-sm">Disburstment</button>';
                }
    		})
    		->addColumn('action',function($data){
    			return '<a href="'.url('credit-card-leads/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button></a>';
    		})
    		->addColumn('agent_name',function($data){
    			return $data->agent_first.' '.$data->agent_last;
    		})
            ->addColumn('created_at',function($data){
                return $data->created_at->format('d-m-Y');
            })
    		->rawColumns(['full_name','agent_name','status','action','created_at'])->make(true);    		
    	}
        $agents = User::where('role_id',2)->where('is_active',1)->orderBy('first_name','ASC')->orderBy('last_name','ASC')->get();
    	return view('card-leads.all',compact('agents'));

    }

    public function edit($id)
    {
        $data = CreditCard::where('credit_cards.id',$id)->with('agents')->select('credit_cards.*')
        ->first();
        $documents = [];
        $banks = BankCommissionCr::orderBy('bank_name','ASC')->get();
        return view('card-leads.edit',compact('data','documents','banks'));
    }

    public function status(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        
        $request->validate([
            'status' => 'required',
            'bank_id' => 'required_if:status,==,"Disbursement"',
            'commission' => 'required_if:status,==,"Disbursement"'
        ]);

        $data = CreditCard::where('id',$request->id)->first();
        if($data)
        {
            $explode = explode(',',$request->bank_id);
            $data->status = $request->status;
            $data->bank_id = $explode[0] ?? null;
            $data->commission = $request->commission ?? null;
            $data->review = $request->review ?? null;
            $data->save();
            if($data){
                if($request->status == 'Disbursement')
                {
                    $user = User::find($data->dsa_id);
                    if($user)
                    {
                        $commission_amount = $request->commission;
                        $user->wallet = $user->wallet + $commission_amount;
                        $user->save();

                        $wallet_request = new WalletRequest();
                        $wallet_request->type = 2;
                        $wallet_request->dsa_id = $user->id;
                        $wallet_request->request_type = 2;
                        $wallet_request->status = "success";
                        $wallet_request->message = "Commition received from Credit Card Lead ID: ". 5000 + $data->id." ";
                        $wallet_request->amount = $commission_amount;
                        $wallet_request->save();
                    }
                }
            }
            return redirect()->back()->with('success','Application status updated successfully');
        }
        return redirect()->back()->with('error','Something went wrong');

    }

}
