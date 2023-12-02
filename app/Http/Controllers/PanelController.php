<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplication;
use App\Models\LoanMaster;
use App\Models\LoanMasterDocument;
use App\Models\LoanUserDocument;
use App\Models\User;
use App\Models\CreditCard;
use App\Models\WalletRequest;
use Auth;


class PanelController extends Controller
{
    public function loadLoanPage(Request $request)
    {
    	if(!isset($request->type))
    	{
            $data = LoanMaster::where('is_active',1)->withCount('leads')->orderBy('name','ASC')->get();
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
	    	return view('front.loan-page',compact('data','applications'));
    	}
    	else
    	{
            $data = LoanMaster::find($request->type);
    		return view('front.add-loan',compact('data'));
    	}
    }
    public function updateDSA(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'mobile_number' => 'required|digits:10',
            'whatsapp_number' => 'required|digits:10',
            'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'aadhar_number' => 'required|digits:12|numeric',
            'gst_type' => 'required',
            'gst_number' => 'required',
            'address' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'city' => 'required|regex:/^[a-zA-Z]+$/u',
            'state' => 'required|regex:/^[a-zA-Z]+$/u',
            'country' => 'required|regex:/^[a-zA-Z]+$/u',
            'office_address' => 'required',
            'office_pincode' => 'required|numeric|digits:6',
            'office_city' => 'required|regex:/^[a-zA-Z]+$/u',
            'office_state' => 'required|regex:/^[a-zA-Z]+$/u',
            'office_country' => 'required|regex:/^[a-zA-Z]+$/u',
            'account_type' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'ifsc_code' => 'required',
            'account_number' => 'required'
        ]);

        $record = User::find($request->id);
        if($record)
        {
            $record->first_name = $request->first_name;
            $record->middle_name = $request->middle_name;
            $record->last_name = $request->last_name;
            $record->mobile_number = $request->mobile_number;
            $record->whatsapp_number = $request->whatsapp_number;
            $record->pan_number = $request->pan_number;
            $record->aadhar_number = $request->aadhar_number;
            $record->gst_type = $request->gst_type;
            $record->gst_number = $request->gst_number;
            $record->address = $request->address;
            $record->pincode = $request->pincode;
            $record->city = $request->city;
            $record->state = $request->state;
            $record->country = $request->country;
            $record->office_address = $request->office_address;
            $record->office_pincode = $request->office_pincode;
            $record->office_city = $request->office_city;
            $record->office_state = $request->office_state;
            $record->office_country = $request->office_country;
            $record->account_type = $request->account_type;
            $record->account_name = $request->account_name;
            $record->bank_name = $request->bank_name;
            $record->ifsc_code = $request->ifsc_code;
            $record->account_number = $request->account_number;
            $record->save();

            return redirect()->back()->with('success','User details updated successfully');
        }
            return redirect()->back()->with('error','Something went wrong');
        

    }


    public function uploadLoan(Request $request)
    {
    	$request->validate([
    		'requested_amount' => 'required|min:50000|numeric',
    		'type' => 'required',
    		'first_name' => 'required',
    		'middle_name' => 'nullable',
    		'last_name' => 'required',
    		'email' => 'required|email',
    		'mobile_number' => 'required|digits:10',
    		'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
    		'requested_duration' => 'required',
    		'dob' => 'required',
    		'employment_type' => 'required',
    		'company_name' => 'required',
    		'company_type' => 'required',
    		'income_salary' => 'required',
    		'residence_pincode' => 'required',
    		'permanent_pincode' => 'required',
    		'loan_mode' => 'required'
    	],[
    		'dob.required' => 'The date of birth field is required.'
    	]);
    	$data = $request->all();
    	unset($data['_token']);
        if(\Auth::user()->role_id==2)
        $data['dsa_id'] = \Auth::user()->id ?? 0;
        else
        $data['dsa_id'] = \Auth::user()->agent_id ?? 0;

        $data['agent_id'] = \Auth::user()->id ?? 0;
    	$record = LoanApplication::create($data);

    	return redirect('view-loan/'.$record->id)->with('success','Loan Application Uploaded Successfully');
    }

    public function viewLoanLead($id)
    {
        $data = LoanApplication::where('loan_applications.id',$id)->join('loan_masters','loan_masters.id','loan_applications.type')->select('loan_applications.*','loan_masters.name as loan_name')->first();
        $checklists = LoanMasterDocument::where('loan_master_documents.loan_master_id',$data->type)->join('loan_documents','loan_documents.id','loan_master_documents.loan_document_id')->select('loan_master_documents.*','loan_documents.name')->get();
        foreach($checklists as $checklist)
        {
            $checklist['is_present'] = 0;
            $check = LoanUserDocument::where('application_id',$data->id)->where('document_id',$checklist->id)->first();
            if($check)
            {
                $checklist['is_present'] = 1;
                $checklist['document_record'] = $check;
            }
        }
        return view('front.loan-view',compact('data','checklists'));
    }

    public function uploadDocument(Request $request)
    {
        $new = new LoanUserDocument();
        $new->application_id = $request->document_pid ?? 0;
        $new->document_id = $request->document_fid ?? 0;
        $new->name = 10000+$request->document_pid."_".$request->document_name;
        $new->image = $request->file('image')->store('loan_documents');
        $new->password = $request->password ?? null;
        $new->save();
        return redirect()->back();
    }

    public function creditCardPage()
    {
        return view('front.credit-card');
    }

    public function creditCard(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile_number'=>'required',
            'email'=>'required',
            'gender'=>'nullable',
            'dob'=>'nullable',
            'qualification'=>'required',
            'current_pincode'=>'required',
            'permanent_pincode'=>'required',
            'office_pincode'=>'required',
            'income_salary'=>'required',
            'existing_card'=>'required',
            'pan_number'=>'required',
            'employment_type'=>'required',
            'profession'=>'required',
            'company_name'=>'required',
            'designation'=>'required',
            'mother_name'=>'required',
            'loan_mode'=>'required',
            'step'=>'required'
        ]);

        date_default_timezone_set("Asia/Kolkata");
        $data = $request->all();
        $data['agent_id'] = \Auth::user()->id ?? 0;
        if(\Auth::user()->role_id==2)
        $data['dsa_id'] = \Auth::user()->id ?? 0;
        else
        $data['dsa_id'] = \Auth::user()->agent_id ?? 0;

        $data['status'] = "PDC";
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        unset($data['_token']);
        $record = CreditCard::create($data);
        return redirect('view-credit-card-details/'.$record->id)->with('success','Credit card applied successfully');
        
    }

    public function viewCreditCardPage($id)
    {
        $data = CreditCard::find($id);
        if($data)
        {
            return view('front.view-credit-card',compact('data'));
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function listCards(Request $request)
    {
        $data = CreditCard::orderBy('credit_cards.id','DESC');
        if(Auth::user()->role_id==2)
            {
                $data = $data->where('credit_cards.dsa_id',Auth::user()->id);
            }
            else
            {
                $data = $data->where('credit_cards.agent_id',Auth::user()->id);
            }
        $data = $data->select('credit_cards.*')->paginate(10);

        return view('front.list-credit-card',compact('data'));
    }

    public function loadChangePasswordPage()
    {
        return view('card-leads.add');
    }

    public function changePassword(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->first_name = $request->first_name;
        $data->email = $request->email;
        if($request->password!=null)
        {
            $data->password = \Hash::make($request->password);
            $data->visible_password = $request->password;
        }
        $data->save();
        return redirect()->back()->with('success','Username and password changed successfully');
    }

    public function loadWalletPage()
    {
        $histories = WalletRequest::where('dsa_id',Auth::user()->id)->orderBy('id','DESC')->get(); 
        return view('front.wallet-history',compact('histories'));
    } 

    public function loadWalletWithdrawPage()
    {
        return view('front.wallet-request');
    }
    public function loadWalletWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'account_holder_name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required',
            'account_type' => 'required'
        ]);
        $check = Auth::user()->wallet - $request->amount;
        if($check<0)
        {
            return redirect()->back()->with('error','Invalid amount please try again later');
        }

        date_default_timezone_set('Asia/Kolkata');

        $data = new WalletRequest();
        $data->amount = $request->amount;
        $data->accountant_name = $request->account_holder_name;
        $data->bank_name = $request->bank_name;
        $data->account_number = $request->account_number;
        $data->ifsc_code = $request->ifsc_code;
        $data->account_type = $request->account_type;
        $data->request_type = 1;
        $data->dsa_id = Auth::user()->id;
        $data->save();
        if($data)
        {
            $user = User::find(Auth::user()->id);
            $user->wallet = Auth::user()->wallet - $request->amount;
            $user->save();
        }
        return redirect('wallet-history')->with('success','Withdraw request sent successfully');
    }
}
