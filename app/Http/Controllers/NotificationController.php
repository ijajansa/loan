<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Notification::orderBy('id','ASC');
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
    			return '<a href="'.url('notifications/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;View</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteRecord('.$data->id.')"><button class="btn btn-danger btn-sm"><i class="icon ni ni-trash"></i></button></a>';
    		})
    		->rawColumns(['status','action'])->make(true);
    	}
      	return view('notifications.all');
    }

    public function add()
    {
    	return view('notifications.add');
    }

    public function insert(Request $request)
    {
    	$request->validate([
    		'title' => 'required'
    	],[
    		'title.required' => 'The notification field is required'
    	]);
    	    

    	$data = new Notification();
    	$data->title = $request->title;
    	$data->save();

    	return redirect('notifications')->with('success','Notification added successfully');
    }

    public function edit($id)
    {
        $data = Notification::find($id);
        if($data)
        {
            return view('notifications.edit',compact('data'));
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function update(Request $request)
    {
        $a = $request->validate([
    		'title' => 'required'
    	],[
    		'title.required' => 'The notification field is required'
    	]);


        $data = Notification::find($request->id);
        $data->title = $request->title;
        $data->save();

        return redirect('notifications')->with('success','Notification details updated successfully');
    }

    public function status($id)
    {
    	$data= Notification::find($id);
    	if($data && $data->is_active==1)
    		$data->is_active = 0;
    	else
    		$data->is_active = 1;
    	$data->save();
        return redirect()->back()->with('success','Notification status updated successfully');

    }
    public function delete($id)
    {
    	$data= Notification::find($id);
    	$data->delete();
        return redirect()->back()->with('success','Notification deleted successfully');

    }
}
