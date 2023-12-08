<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;

class SubAgentController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = User::where('role_id',3)->orderBy('id','ASC');
            if($request->agent_id!=null)
            {
                $data = $data->where('agent_id',$request->agent_id);
            }
    		return DataTables::of($data)->
    		addColumn('profile',function($data){
    			if($data->profile!=null)
    			{
    				return '<img src="'.url("storage/app").'/'.$data->profile.'" width="50px" height="50px">';
    			}
    			else
    			{
    				return '<img src="'.asset("assets/images/no-image.jpg").'" width="50px" height="50px">';
    			}
    		})
    		->addColumn('full_name',function($data){
    			return $data->first_name." ".$data->middle_name." ".$data->last_name;
    		})
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
    			return '<a href="'.url('sub-dsa/edit').'/'.$data->id.'"><button class="btn btn-primary btn-sm"><i class="icon ni ni-edit"></i>&nbsp;Edit</button></a>&nbsp;&nbsp;<button class="btn btn-danger btn-sm" onclick="deleteRecord('.$data->id.')"><i class="icon ni ni-trash"></i></button>';
    		})
    		->rawColumns(['profile','full_name','status','action'])->make(true);
    	}
        
        $agents = User::where('role_id',2)->where('is_active',1)->orderBy('first_name','ASC')->orderBy('last_name','ASC')->get();
    	return view('sub-dsa.all',compact('agents'));
    }

    public function add()
    {
        $agents = User::where('role_id',2)->where('is_active',1)->orderBy('first_name','ASC')->orderBy('last_name','ASC')->get();
    	return view('sub-dsa.add',compact('agents'));
    }

    public function insert(Request $request)
    {
    	$request->validate([
    		'agent_id' => 'required',
    		'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
    		'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u',
    		'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
    		'email' => 'required|email|unique:users',
    		'mobile_number' => 'required|unique:users,mobile_number|digits:10',
    		'whatsapp_number' => 'required|digits:10',
    		'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
    		'aadhar_number' => 'required|digits:12',
    		'password' => 'required|min:8',
    		'gst_type' => 'required',
    		'gst_number' => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
    		'profile' => 'nullable|mimes:jpg,png,jpeg,svg|max:1024',
    		'address' => 'required',
    		'pincode' => 'required|digits:6',
    		'city' => 'required|regex:/^[\pL\s\-]+$/u',
    		'state' => 'required|regex:/^[\pL\s\-]+$/u',
    		'country' => 'required|regex:/^[\pL\s\-]+$/u'

    	],[
    	    'agent_id.required' => 'The agent name field is required.'
    	    ]);
    	    
    	
    	$check = User::where('agent_id',$request->agent_id)->count();
    	if($check >= 5)
    	{
    	    return redirect()->back()->with('error',"Can't create more than 5 Sub DSA for DSA");
    	}

    	$data = new User();
    	$data->role_id = 3;
    	$data->first_name = $request->first_name;
    	$data->middle_name = $request->middle_name ?? null;
    	$data->last_name = $request->last_name;
    	$data->email = $request->email;
    	$data->mobile_number = $request->mobile_number;
    	$data->whatsapp_number = $request->whatsapp_number;
    	$data->pan_number = $request->pan_number;
    	$data->aadhar_number = $request->aadhar_number;
    	$data->password = \Hash::make($request->password);
    	$data->visible_password = $request->password;
    	$data->gst_type = $request->gst_type;
    	$data->gst_number = $request->gst_number;
    	$data->address = $request->address;
    	$data->pincode = $request->pincode;
    	$data->city = $request->city;
    	$data->state = $request->state;
    	$data->country = $request->country;
    	$data->agent_id = $request->agent_id;
    	if(isset($request->profile))
    	{
    		$data->profile = $request->file('profile')->store('profiles');
    	}
    	$data->save();

    	return redirect('sub-dsa')->with('success','Sub DSA registered successfully');
    }

    public function edit($id)
    {
        $data = User::find($id);
        if($data)
        {
            $agents = User::where('role_id',2)->where('is_active',1)->orderBy('first_name','ASC')->get();
            return view('sub-dsa.edit',compact('data','agents'));
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function update(Request $request)
    {
        $request->validate([
            'agent_id' => 'required',
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users,email,'.$request->id.'',
            'mobile_number' => 'required|unique:users,mobile_number,'.$request->id.'|digits:10',
            'whatsapp_number' => 'required|digits:10',
            'pan_number' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'aadhar_number' => 'required|digits:12',
            'password' => 'required|min:8',
            'gst_type' => 'required',
            'gst_number' => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
            'profile' => 'nullable|mimes:jpg,png,jpeg,svg|max:1024',
            'address' => 'required',
            'pincode' => 'required|digits:6',
            'city' => 'required|regex:/^[\pL\s\-]+$/u',
            'state' => 'required|regex:/^[\pL\s\-]+$/u',
            'country' => 'required|regex:/^[\pL\s\-]+$/u'

        ],[
            'agent_id.required' => 'The agent name field is required.'
            ]);


        $data =User::find($request->id);
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name ?? null;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->mobile_number = $request->mobile_number;
        $data->whatsapp_number = $request->whatsapp_number;
        $data->pan_number = $request->pan_number;
        $data->aadhar_number = $request->aadhar_number;
        $data->password = \Hash::make($request->password);
        $data->visible_password = $request->password;
        $data->gst_type = $request->gst_type;
        $data->gst_number = $request->gst_number;
        $data->address = $request->address;
        $data->pincode = $request->pincode;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->country = $request->country;
        $data->agent_id = $request->agent_id;
        if(isset($request->profile))
        {
            $data->profile = $request->file('profile')->store('profiles');
        }
        $data->save();

        return redirect('sub-dsa')->with('success','Sub DSA details updated successfully');
    }

    public function delete($id)
    {
        $data = User::find($id);
        if($data)
        {
            $data->delete();
            return redirect()->back()->with('success','Sub DSA deleted successfully');
        }
        return redirect()->back()->with('error','Something went wrong');
    }
    public function status($id)
    {
        $data = User::find($id);
        if($data && $data->is_active==1)
            $data->is_active = 0;
        else
            $data->is_active = 1;
        $data->save();            
        return redirect()->back()->with('success','Sub DSA status updated successfully');
    }
}
