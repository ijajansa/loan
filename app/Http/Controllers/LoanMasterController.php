<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\LoanApplication;
use App\Models\LoanMaster;
use App\Models\LoanDocument;
use App\Models\LoanMasterDocument;

class LoanMasterController extends Controller
{
	public function all(Request $request)
	{
		if($request->ajax())
		{
			$data = LoanMaster::orderBy('name','ASC');
			return DataTables::of($data)
			->addColumn('status',function($data){
				if($data->is_active ==1)
				{
					return '<button class="btn btn-success btn-sm" onclick="changeStatus('.$data->id.')">Active</button>';
				}
				else
				{
					return '<button class="btn btn-danger btn-sm" onclick="changeStatus('.$data->id.')">Inactive</button>';
				}
			})
			->addColumn('action',function($data){
				return '<a href="'.url('loan-types/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button></a>&nbsp;<a href="'.url('loan-types/assign').'/'.$data->id.'"><button class="btn btn-warning btn-sm"><i class="icon ni ni-edit"></i>&nbsp;Assign Documents</button></a>';
			})->
			addColumn('profile',function($data){
    			if($data->image!=null)
    			{
    				return '<img src="'.url("storage/app").'/'.$data->image.'" width="50px" height="50px">';
    			}
    			else
    			{
    				return '<img src="'.asset("assets/images/no-image.jpg").'" width="50px" height="50px">';
    			}
    		})

			->rawColumns(['profile','status','action'])->make(true);
		}
		return view('loan-masters.all');
	}

	public function add()
	{
		return view('loan-masters.add');
	}

	public function insert(Request $request)
	{
		$request->validate([
			'name'=>'required',
			'image'=>'required|mimes:jpg,jpeg,png,svg',
			'additional_text'=>'required'
		]);

		$words = explode(" ", $request->name);
		$acronym = "";

		foreach ($words as $w) {
			$acronym .= mb_substr($w, 0, 1);
		}

		$new = new LoanMaster();
		$new->name = $request->name ?? '';
		$new->image = $request->file('image')->store('loan-types');
		$new->short_name = strtolower($acronym);
		$new->additional_text = $request->additional_text ?? '';
		$new->save();

		return redirect('loan-types')->with('success','Loan type added successfully');
	}

	public function edit($id)
	{
		$data= LoanMaster::find($id);
		if($data)
		{
			return view('loan-masters.edit',compact('data'));
		}
		return redirect()->back()->with('error','Something went wrong');
	}

	public function update(Request $request)
	{
		$request->validate([
			'name'=>'required',
			'image'=>'nullable|mimes:jpg,jpeg,png,svg',
			'additional_text'=>'required'
		]);

		$words = explode(" ", $request->name);
		$acronym = "";

		foreach ($words as $w) {
			$acronym .= mb_substr($w, 0, 1);
		}

		$data= LoanMaster::find($request->id);
		if($data)
		{
			$data->name = $request->name ?? '';
			$data->short_name = strtolower($acronym);
			if($request->image!=null)
			{
				$data->image = $request->file('image')->store('loan-types');
			}
			$data->additional_text = $request->additional_text ?? '';

			$data->save();
			return redirect('loan-types')->with('success','Loan type updated successfully');

		}

		return redirect()->back()->with('error','Something went wrong');

	} 

	public function status($id)
	{
		$data= LoanMaster::find($id);
		if($data && $data->is_active ==1)
		{
			$data->is_active = 0;
			$data->save();

			return redirect('loan-types')->with('success','Loan type inactivated successfully');
		}
		else
		{
			$data->is_active = 1;
			$data->save();
			return redirect('loan-types')->with('success','Loan type activated successfully');

		}
		return redirect()->back()->with('error','Something went wrong');
	}

	public function documents($id)
	{
		$data = LoanMaster::find($id);
		$documents = LoanDocument::where('is_active',1)->orderBy('name','ASC')->get();
		foreach ($documents as $key => $value) {
				$value['is_present'] =0;
			$check = LoanMasterDocument::where('loan_master_id',$data->id)->where('loan_document_id',$value->id)->first();
			if($check)
			{
				$value['is_present'] =1;
			}
		}
		return view('loan-masters.assign',compact('data','documents'));
	}

	public function assignDocuments(Request $request)
	{
		if($request->documents && count($request->documents)!=0)
		{
			LoanMasterDocument::where('loan_master_id',$request->id)->delete();
			foreach($request->documents as $key)
			{
				$check = new LoanMasterDocument();
				$check->loan_master_id = $request->id;
				$check->loan_document_id = $key;
				$check->save();
			}
			return redirect('loan-types')->with('success','Documents assigned to loan successfully');

		}
		return redirect()->back()->with('error','Something went wrong');

	}
}
