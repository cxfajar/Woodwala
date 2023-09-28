<?php

namespace App\Http\Controllers;

use App\Models\ads;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admincontroller extends Controller
{
    public function admin_index()
    {
        if(session()->has('user_logged_in') && session()->get('user_type') == "ADMIN")
        {
            $admin = users::find(session()->get('user_id'));
            $count_customers = users::where('type','CLIENT')->count();
            $count_carpenters = users::where('type','CARPENTER')->count();
            $count_wholesallers = users::where('type','WHOLESALLER')->count();
            $count_ads = ads::where('ad_status','REQUESTED')->count();


            $completed_orders = DB::table('ads')
            ->join('users','users.id','ads.hired_user')
            ->select('ads.*','users.first_name','users.last_name')
            ->where('ads.ad_status','COMPLETED')
            ->get();


            return view('ADMIN.index',compact('admin','count_customers','count_carpenters','count_wholesallers','count_ads','completed_orders'));
        }else {
            return redirect('login');
        }

    }
    public function manage_customers()
    {
        if(session()->has('user_logged_in') && session()->get('user_type') == "ADMIN")
        {
            $active_customers = users::where('type','CLIENT')
            ->where('status','ACTIVE')
            ->get();
            $count_active = users::where('type','CLIENT')
            ->where('status','ACTIVE')
            ->count();
            $blocked_customers = users::where('type','CLIENT')
            ->where('status','BLOCKED')
            ->get();
            $count_blocked = users::where('type','CLIENT')
            ->where('status','BLOCKED')
            ->count();
            return view('ADMIN.manage_customers',compact('active_customers','blocked_customers','count_blocked','count_active'));
        }else {
            return redirect('login');
        }
    }
    public function manage_wholesalers()
    {
        if(session()->has('user_logged_in') && session()->get('user_type') == "ADMIN")
        {
            $active_wholesaller = users::where('type','WHOLESALLER')
            ->where('status','ACTIVE')
            ->get();
            $count_active = users::where('type','WHOLESALLER')
            ->where('status','ACTIVE')
            ->count();
            $blocked_wholesaller = users::where('type','WHOLESALLER')
            ->where('status','BLOCKED')
            ->get();
            $count_blocked = users::where('type','WHOLESALLER')
            ->where('status','BLOCKED')
            ->count();

            $requested_wholesaller = users::where('type','WHOLESALLER')
            ->where('status','REQUESTED')
            ->get();
            $count_requested = users::where('type','WHOLESALLER')
            ->where('status','REQUESTED')
            ->count();
            return view('ADMIN.manage_wholesalers',compact('active_wholesaller','blocked_wholesaller','count_active','count_blocked','requested_wholesaller','count_requested'));
        }else {
            return redirect('login');
        }
    }
    public function manage_carpenters()
    {
        if(session()->has('user_logged_in') && session()->get('user_type') == "ADMIN")
        {
            $active_carpenter = users::where('type','CARPENTER')
            ->where('status','ACTIVE')
            ->get();
            $count_active = users::where('type','CARPENTER')
            ->where('status','ACTIVE')
            ->count();
            $blocked_carpenter = users::where('type','CARPENTER')
            ->where('status','BLOCKED')
            ->get();
            $count_blocked = users::where('type','CARPENTER')
            ->where('status','BLOCKED')
            ->count();

            $requested_carpenter = users::where('type','CARPENTER')
            ->where('status','REQUESTED')
            ->get();
            $count_requested = users::where('type','CARPENTER')
            ->where('status','REQUESTED')
            ->count();
            return view('ADMIN.manage_carpenters',compact('active_carpenter','blocked_carpenter','count_active','count_blocked','requested_carpenter','count_requested'));
        }else {
            return redirect('login');
        }
    }
    public function block($id)
    {
        $block = users::find($id);
        $block->status = "BLOCKED";
        $block->save();
        return redirect()->back()->with('block','User Blocked.');
    }
    public function unblock($id)
    {
        $unblock = users::find($id);
        $unblock->status = "ACTIVE";
        $unblock->save();
        return redirect()->back()->with('active','User Approved.');
    }

    public function profile()
    {
        $user = users::find(session()->get('user_id'));
        return view('ADMIN.profile',compact('user'));
    }
    public function update_profile(Request $request)
    {
        $user = users::find(session()->get('user_id'));

        $user->first_name = $request->input('fname');
        $user->last_name = $request->input('lname');
        $user->password = $request->input('password');
        $user->cnic= $request->input('cnic');
        $user->contact = $request->input('contact');
        if($user->save())
        {
            session()->put('user_fname',$user->first_name);
            session()->put('user_lname',$user->last_name);
        }
        return redirect()->back();
    }

    public function manage_ads()
    {
        $ads  = ads::where('ad_status','REQUESTED')->get();
        return view('ADMIN.manage_ads',compact('ads'));
    }

    public function approve_ad($id)
    {
        $ad = ads::find($id);
        $ad->ad_status = "PENDING";
        $ad->save();
        return redirect()->back();
    }
    public function cancel_ad($id)
    {
        $ad = ads::find($id);
        $ad->ad_status = "CANCELLED";
        $ad->save();
        return redirect()->back();
    }
}

