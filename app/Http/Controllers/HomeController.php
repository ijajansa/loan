<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\LoanApplication;
use App\Models\LoanMaster;
use App\Models\BankCommissionCr;
use App\Models\User;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata'); 

        if(Auth::user()->role_id==1)
        {
            return redirect('dsa');
        }
        else
        {
            if(isset($request->path) && isset($request->method))
            {
                return view('front.edit-dsa');
            }
            if(isset($request->data_show))
            {
                $data = LoanApplication::orderBy('loan_applications.id','DESC')
                ->join('users','users.id','loan_applications.agent_id');
                if(Auth::user()->role_id==2)
                {
                    $data = $data->where('loan_applications.dsa_id',Auth::user()->id);
                }
                else
                {
                    $data = $data->where('loan_applications.agent_id',Auth::user()->id);
                }

                if($request->lead_id!=null)
                {
                    $data =$data->where('loan_applications.id',$request->lead_id);
                }
                if($request->type!=null)
                {
                    $data =$data->where('loan_applications.type',$request->type);
                }
                if($request->applicant_name!=null)
                {
                    $data =$data->where(function($query) use ($request){
                        $query->where('loan_applications.first_name','like','%'.$request->applicant_name.'%')->orWhere('loan_applications.middle_name','like','%'.$request->applicant_name.'%')->orWhere('loan_applications.last_name','like','%'.$request->applicant_name.'%');
                    });
                }
                if($request->email!=null)
                {
                    $data =$data->where('loan_applications.email','like','%'.$request->email.'%');
                }
                if($request->mobile_number!=null)
                {
                    $data =$data->where('loan_applications.mobile_number','like','%'.$request->mobile_number.'%');
                }
                if($request->status!=null)
                {
                    $data =$data->where('loan_applications.status','like','%'.$request->status.'%');
                }
                $data = $data->leftJoin('loan_masters','loan_masters.id','loan_applications.type')->select('loan_applications.*','users.first_name as agent_first','users.last_name as agent_last','loan_masters.name as loan_name')
                ->paginate(10);
                $types = LoanMaster::where('is_active',1)->orderBy('name','ASC')->get();
                return view('front.loan-leads',compact('data','types'));
            }
            $applications = LoanApplication::leftJoin('loan_masters','loan_masters.id','loan_applications.type')->join('users','users.id','loan_applications.agent_id')->orderBy('loan_applications.created_at','DESC');
            if(Auth::user()->role_id==2)
            {
                $applications = $applications->where('loan_applications.dsa_id',Auth::user()->id);
            }
            else
            {
                $applications = $applications->where('loan_applications.agent_id',Auth::user()->id);
            }
            $applications = $applications->limit(10)->select('loan_applications.*','loan_masters.name as loan_name','users.first_name as agent_first','users.last_name as agent_last')->get();

            $loan_masters = LoanMaster::with('commission_details')->where('is_active',1)->orderBy('name','ASC')->get();
            $credit_master = BankCommissionCr::where('is_active',1)->orderBy('bank_name','ASC')->get();

            return view('home',compact('applications','loan_masters','credit_master'));
        }
    }
}
