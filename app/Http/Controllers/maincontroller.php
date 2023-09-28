<?php

namespace App\Http\Controllers;

use App\Models\ads;
use App\Models\response;
use App\Models\users;
use App\Mail\contact;
use App\Mail\adminlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class maincontroller extends Controller
{
    public function index()
    {
        $completed_orders = ads::where('ad_status','COMPLETED')->get();

        $count_orders = ads::where('ad_status','COMPLETED')->count();

        $carpenters = users::where('type','CARPENTER')
        ->where('status','ACTIVE')->get();

        $customers = users::where('type','CLIENT')
        ->where('status','ACTIVE')->count();


    return view('CLIENT.index',compact('completed_orders','carpenters','count_orders','customers'));
    }

    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }
    public function contact()
    {
        return view('CLIENT.contact');
    }

    public function userlogin(Request $request)
    {
        //.
        $emailcorrect = users::where('email',$request->input('email'))->first(); //check email
        if($emailcorrect)
        {
            $passwordcorrect = users::where('password',$request->input('password'))->first(); //check password
            if($passwordcorrect)
            {
                $userfound = users::where('email',$request->input('email'))
                ->where('password',$request->input('password'))
                ->where('status','ACTIVE')
                ->first();
                //user found
                if($userfound)
                {
                    session()->put('user_logged_in',1);
                    session()->put('user_id',$userfound->id);
                    session()->put('user_img',$userfound->img);
                    session()->put('user_fname',$userfound->first_name);
                    session()->put('user_lname',$userfound->last_name);
                    session()->put('user_type',$userfound->type);
                    if($userfound->type == "ADMIN")
                    {

                        $details = [
                            'msg'=> 'You are Logged in Now.'
                        ];

                        Mail::to($userfound->email)->send(new adminlogin($details));
                        return redirect('admin');
                    }elseif ($userfound->type == "CARPENTER") {
                        return redirect('carpenter_index');
                    }
                    elseif ($userfound->type == "CLIENT") {
                        return redirect('/');
                    }
                    elseif ($userfound->type == "WHOLESALLER") {
                        return redirect('carpenter_index');
                    }
                }else {
                    return redirect()->back()->with('accounterror','Invalid Account Detail');
                }
            }else
            {
                return redirect()->back()->with('passerror','Password is Incorrect');
            }
        }else
        {
            return redirect()->back()->with('emailerror','Email is Incorrect');
        }
    }

    public function register_user(Request $request)
    {
        //.
        $check = users::where('email',$request->input('email'))->first();
        if(!$check)
        {
            $register = new users();
            $register->first_name = $request->input('fname');
            $register->last_name = $request->input('lname');
            $register->email = $request->input('email');
            $register->password = $request->input('password');
            $register->type = $request->input('type');
            $register->city = $request->input('city');
            $register->country = $request->input('country');
            $register->cnic = $request->input('cnic');
            $register->contact = $request->input('contact');
            $register->img = $request->file('img')->getClientOriginalName();
            $request->file('img')->move('uploads/',$register->img);

            if($request->input('type') == "CARPENTER" || $request->input('type') == "WHOLESALLER")
            {
                $register->status = "REQUESTED";
            }else{
                $register->status = "ACTIVE";
            }
            $register->save();
            return redirect('login');
        }else {
            return redirect()->back()->with('error','Account Already Registered');
        }
    }

    public function about()
    {
        return view('CLIENT.about');
    }
    public function client_ads()
    {
        // $client_ads = ads::where('post_by',session()->get('user_id'))->get();
        $client_ads = DB::table('ads')
        ->join('totalresponses','totalresponses.ad_id','ads.id')
        ->select('ads.*','totalresponses.total_res')
        ->where('ads.post_by',session()->get('user_id'))
        ->where('ads.hired_user',0)
        ->get();



        $count_ads = ads::where('post_by',session()->get('user_id'))
        ->where('hired_user',0)->count();
        return view('CLIENT.client_ads',compact('client_ads','count_ads'));
    }

    public function view_responses($id)
    {
        $ad = ads::find($id);
        $responses = DB::table('response')
        ->join('users','users.id','response.user_id')
        ->select('users.*','response.price','response.days','response.msg','response.ad_id')
        ->where('response.ad_id',$id)
        ->get();
        return view('CLIENT.view_responses',compact('ad','responses'));
    }


    public function logout()
    {
        //.
        session()->forget('user_logged_in');
        session()->forget('user_id');
        session()->forget('user_type');
        return redirect('login');
    }

    public function hire_user(Request $request)
    {
        // dd("correct");
        $ad = ads::where('id',$request->input('ad_id'))->first();
        $ad->hired_user = $request->input('user_id');
        $ad->save();
        if(session('user_type') == "CLIENT")
        {
            return redirect('client_orders');
        }else
        {
            return redirect('orders');
        }

    }

    public function client_orders()
    {
        //.
        $orders = DB::table('users')
        ->join('ads','ads.hired_user','users.id')
        ->select('ads.*','users.first_name','users.last_name','users.contact')
        ->where('ads.post_by',session()->get('user_id'))
        ->get();
        return view('CLIENT.client_orders',compact('orders'));
    }


    public function contact_us(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $msg = $request->input('msg');
        $details = [
            'msg' => 'User Name:'.''.$name.'. '.'User E-mail'.' '.$email.'. '.'Msg is:'.' '.$msg
        ];
        
        $admin = users::where('type','ADMIN')->first();

        Mail::to($admin->email)->send(new contact($details));

        return redirect()->back();
    }
}
