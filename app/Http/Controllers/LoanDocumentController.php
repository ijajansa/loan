<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\LoanApplication;
use App\Models\LoanDocument;

class LoanDocumentController extends Controller
{
	public function all(Request $request)
	{
		if($request->ajax())
		{
			$data = LoanDocument::orderBy('name','ASC');
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
				return '<a href="'.url('loan-documents/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button></a>';
			})
			->rawColumns(['status','action'])->make(true);
		}
		return view('loan-documents.all');
	}

	public function add()
	{
		return view('loan-documents.add');
	}

	public function insert(Request $request)
	{
		$request->validate([
			'name'=>'required'
		]);


		$new = new LoanDocument();
		$new->name = $request->name ?? '';
		$new->save();

		return redirect('loan-documents')->with('success','Document added successfully');
	}

	public function edit($id)
	{
		$data= LoanDocument::find($id);
		if($data)
		{
			return view('loan-documents.edit',compact('data'));
		}
		return redirect()->back()->with('error','Something went wrong');
	}

	public function update(Request $request)
	{
		$request->validate([
			'name'=>'required'
		]);

		
		$data= LoanDocument::find($request->id);
		if($data)
		{
			$data->name = $request->name ?? '';
			$data->save();
			return redirect('loan-documents')->with('success','Document details updated successfully');

		}

		return redirect()->back()->with('error','Something went wrong');

	} 

	public function status($id)
	{
		$data= LoanDocument::find($id);
		if($data && $data->is_active ==1)
		{
			$data->is_active = 0;
			$data->save();

			return redirect('loan-documents')->with('success','Document status inactivated successfully');
		}
		else
		{
			$data->is_active = 1;
			$data->save();
			return redirect('loan-documents')->with('success','Document status activated successfully');

		}
		return redirect()->back()->with('error','Something went wrong');
	}
}
