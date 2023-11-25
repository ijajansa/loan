<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\LoanApplication;
use App\Models\LoanUserDocument;
use App\Models\LoanMaster;

class LoanApplicationController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
	    	$data = LoanApplication::orderBy('loan_applications.id','DESC')->join('users','users.id','loan_applications.agent_id');
            if($request->name!=null)
            {
                $data = $data->where(function($query) use ($request){
                    $query->where('loan_applications.first_name','like','%'.$request->name.'%')->orWhere('loan_applications.middle_name','like','%'.$request->name.'%')->orWhere('loan_applications.last_name','like','%'.$request->name.'%')->orWhere('loan_applications.dob','like','%'.$request->name.'%')->orWhere('loan_applications.email','like','%'.$request->name.'%')->orWhere('loan_applications.mobile_number','like','%'.$request->name.'%')->orWhere('loan_applications.requested_amount','like','%'.$request->name.'%');
                });
            }
            if($request->type!=null)
            {
                $data = $data->where('type',$request->type);
            }
            
            $data = $data->select('loan_applications.*','users.first_name as agent_first','users.last_name as agent_last');
    		return DataTables::of($data)
    		->addColumn('full_name',function($data){
    			return $data->first_name." ".$data->middle_name." ".$data->last_name;
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
    			return '<a href="'.url('loan-applications/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button></a>';
    		})
    		->addColumn('agent_name',function($data){
    			return $data->agent_first.' '.$data->agent_last;
    		})
            ->addColumn('created_at',function($data){
                return $data->created_at->format('d-m-Y');
            })
    		->rawColumns(['full_name','agent_name','status','action','created_at'])->make(true);    		
    	}

    	$types = LoanMaster::where('is_active',1)->orderBy('name','ASC')->get();
    	return view('loan-applications.all',compact('types'));

    }

    public function edit($id)
    {
        $data = LoanApplication::where('loan_applications.id',$id)->with('agents')
        ->join('loan_masters','loan_masters.id','loan_applications.type')
        ->select('loan_applications.*','loan_masters.name as loan_name')
        ->first();
        if($data)
            $documents = LoanUserDocument::where('application_id',$data->id)->get();
        else
            $documents = null;
        return view('loan-applications.edit',compact('data','documents'));
    }

    public function status(Request $request)
    {
        $data = LoanApplication::where('id',$request->id)->first();
        if($data)
        {
            $data->status = $request->status;
            $data->save();
            return redirect()->back()->with('success','Application status updated successfully');

        }
        return redirect()->back()->with('error','Something went wrong');

    }

}
