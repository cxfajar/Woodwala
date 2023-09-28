<?php

namespace App\Http\Controllers;

use App\Models\ads;
use App\Models\category;
use App\Models\products;
use App\Models\response;
use App\Models\totalresponses;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class carpentercontroller extends Controller
{
    public function carpenter_index()
    {
        //..

        if(session()->get('user_type') == "CARPENTER")
        {
            // dd("carpenter");
            // $ads = ads::where('post_by',session()->get('user_id'))
            // ->get();

            $ads =  DB::table('ads')
            ->join('totalresponses','totalresponses.ad_id','ads.id')
            ->select('ads.*','totalresponses.total_res')
            ->where('ads.post_by',session()->get('user_id'))
            ->where('ads.hired_user',0)
            ->get();

            $count_ads =  DB::table('ads')
            ->join('totalresponses','totalresponses.ad_id','ads.id')
            ->select('ads.*','totalresponses.total_res')
            ->where('ads.post_by',session()->get('user_id'))
            ->where('ads.hired_user',0)
            ->count();

            $clients_ads = DB::table('ads')
            ->join('totalresponses','totalresponses.ad_id','ads.id')
            ->select('ads.*','totalresponses.total_res')
            ->where('ads.type','CLIENT')
            ->where('ads.hired_user',0)
            ->where('ads.status','SHOW')
            ->where('ads.ad_status','PENDING')
            ->get();


        // $count_customer_orders = DB::table('users')
        // ->join('ads','ads.post_by','users.id')
        // ->select('ads.*','users.first_name','users.last_name','users.contact')
        // ->where('ads.hired_user',session()->get('user_id'))
        // ->count();

        $count_myorders = DB::table('users')
        ->join('ads','ads.hired_user','users.id')
        ->select('ads.*','users.first_name','users.last_name','users.contact')
        ->where('ads.post_by',session()->get('user_id'))
        ->count();

        $count_complete_orders = DB::table('users')
        ->join('ads','ads.post_by','users.id')
        ->select('ads.*','users.first_name','users.last_name','users.contact')
        ->where('ads.hired_user',session()->get('user_id'))
        ->where('ads.ad_status','COMPLETED')
        ->count();

        $pending_orders = DB::table('users')
        ->join('ads','ads.post_by','users.id')
        ->select('ads.*','users.first_name','users.last_name','users.contact')
        ->where('ads.hired_user',session()->get('user_id'))
        ->where('ads.ad_status','PENDING')
        ->get();
        $count_pending_orders = DB::table('users')
        ->join('ads','ads.post_by','users.id')
        ->select('ads.*','users.first_name','users.last_name','users.contact')
        ->where('ads.hired_user',session()->get('user_id'))
        ->where('ads.ad_status','PENDING')
        ->count();
            return view('CARPENTER.index',compact('ads','clients_ads','count_pending_orders','count_myorders','count_complete_orders','pending_orders','count_ads'));
        }
        else
        {
            // dd("wholesaller");

            $ads = ads::where('post_by',session()->get('user_id'))
            ->get();

            $carpenter_ads = DB::table('ads')
            ->join('totalresponses','totalresponses.ad_id','ads.id')
            ->select('ads.*','totalresponses.total_res')
            ->where('ads.type','CARPENTER')
            ->where('hired_user',0)
            ->where('status','SHOW')
            ->where('ad_status','PENDING')
            ->get();
            return view('CARPENTER.index',compact('ads','carpenter_ads'));
        }

    }

    public function carpenter_ads()
    {
        $ads = ads::where('post_by',session()->get('user_id'))
        ->where('hired_user',0)
        ->get();

        $count_ads = ads::where('post_by',session()->get('user_id'))
        ->where('hired_user',0)
        ->count();
        return view('CARPENTER.carpenter_ads',compact('ads','count_ads'));
    }
    public function carpenter_products($id)
    {
        $products = products::where('user_id',session()->get('user_id'))
        ->where('cate_id',$id)
        ->get();

        $count_product = products::where('user_id',session()->get('user_id'))->count();
        return view('CARPENTER.products',compact('products','count_product','id'));
    }
    public function carpenter_category()
    {
        $category = category::where('user_id',session()->get('user_id'))
        ->get();
        $count_category = category::where('user_id',session()->get('user_id'))->count();
        return view('CARPENTER.carpenter_category',compact('category','count_category'));
    }
    public function add_ad(Request $request)
    {
        //.
        $newad = new ads();
        $newad->title = $request->input('title');
        $newad->quantity = $request->input('quantity');
        $newad->price = $request->input('price');
        $newad->description = $request->input('description');
        $newad->post_by = session()->get('user_id');
        $newad->type = session()->get('user_type');
        $newad->status = "SHOW";
        $newad->ad_status = "REQUESTED";
        $newad->img=$request->file('ad_img')->getClientOriginalName();
        $request->file('ad_img')->move('uploads/ads/',$newad->img);
        if($newad->save())
        {
            $total_responses = new totalresponses();
            $total_responses->ad_id = $newad->id;
            $total_responses->total_res = 0;
            $total_responses->save();
        }
        return redirect()->back()->with('success','Ad Posted.');
    }
    // public function add_product(Request $request)
    // {
    //     $newad = new products();
    //     $newad->title = $request->input('title');
    //     $newad->quantity = $request->input('quantity');
    //     $newad->description = $request->input('description');
    //     $newad->price = $request->input('price');
    //     $newad->cate_id = $request->input('cate_id');
    //     $newad->user_id = session()->get('user_id');
    //     $newad->status = "SHOW";
    //     $newad->img=$request->file('ad_img')->getClientOriginalName();
    //     $request->file('ad_img')->move('uploads/products/',$newad->img);
    //     $newad->save();
    //     return redirect()->back()->with('success','Product Added.');
    // }
    // public function add_category(Request $request)
    // {
    //     $addcategory = new category();
    //     $addcategory->title = $request->input('title');
    //     $addcategory->user_id = session()->get('user_id');
    //     $addcategory->img=$request->file('add_img')->getClientOriginalName();
    //     $request->file('add_img')->move('uploads/category/',$addcategory->img);
    //     $addcategory->save();
    //     return redirect()->back()->with('success','Category Added.');
    // }
    public function update_ad(Request $request)
    {
        $ad = ads::where('id',$request->input('ad_id'))->first();
        if($ad)
        {
            $ad->title = $request->input('title');
            $ad->quantity = $request->input('quantity');
            $ad->description = $request->input('description');
            $ad->user_id = session()->get('user_id');
            $ad->status = "SHOW";
            if($request->file('ad_img'))
            {
            $ad->img = $request->file('ad_img')->getClientOriginalName();
            $request->file('ad_img')->move('uploads/ads/',$ad->img);
            }else{
                $ad->img = $ad->img;
            }
            $ad->save();
        }
        return redirect()->back()->with('success','Ad Updated.');
    }

    public function hide_ad($id)
    {
        $hide_ad = ads::find($id);
        $hide_ad->status = "HIDE";
        $hide_ad->save();
        return redirect()->back()->with('success','Ad HIDE.');
    }
    public function show_ad($id)
    {
        $hide_ad = ads::find($id);
        $hide_ad->status = "SHOW";
        $hide_ad->save();
        return redirect()->back()->with('success','Ad SHOW.');
    }
    public function del_ad($id)
    {
        $hide_ad = ads::find($id);
        $hide_ad->delete();

        if(session()->get('user_type') == "CLIENT")
        {
            return redirect('client_ads');
        }else
        {
        return redirect()->back()->with('success','Ad Deleted.');
        }
    }
    public function del_cate($id)
    {
        $del_cate = category::find($id);
        $del_cate->delete();
        return redirect()->back()->with('success','Category Deleted.');
    }

    public function csingle_ad($id)
    {
        //..

        $ad_detail = ads::where('id',$id)->first();






        $already_response = response::where('ad_id',$id)
        ->where('user_id',session()->get('user_id'))->count();
        $response = response::where('ad_id',$id)
        ->where('user_id',session()->get('user_id'))->first();
        return view('CARPENTER.client_single_ad',compact('ad_detail','already_response','response'));
    }

    public function bid_ad(Request $request)
    {
        //.
        $response = new response();
        $response->user_id = session()->get('user_id');
        $response->ad_id = $request->input('ad_id');
        $formatted_dt1=Carbon::parse($request->input('sdate'));
        $formatted_dt2=Carbon::parse($request->input('edate'));
        $date_diff=$formatted_dt1->diffInDays($formatted_dt2);

        $response->days = $date_diff;
        $response->price = $request->input('price');
        $response->msg = $request->input('msg');
        if($response->save())
        {
            $total_responses = totalresponses::where('ad_id',$response->ad_id)->first();
            $total_responses->total_res = $total_responses->total_res + 1;
            $total_responses->save();
        }

        return redirect()->back();

    }

    public function cview_responses($id)
    {
        //..
        $responses = DB::table('response')
        ->join('users','users.id','response.user_id')
        ->select('users.*','response.price','response.days','response.msg','response.ad_id')
        ->where('response.ad_id',$id)
        ->get();
        return view('CARPENTER.cview_responses',compact('responses'));
    }

    public function orders()
    {
        //.
        $myorders = DB::table('users')
        ->join('ads','ads.hired_user','users.id')
        ->select('ads.*','users.first_name','users.last_name','users.contact')
        ->where('ads.post_by',session()->get('user_id'))
        ->get();

        $customer_orders = DB::table('users')
        ->join('ads','ads.post_by','users.id')
        ->select('ads.*','users.first_name','users.last_name','users.contact')
        ->where('ads.hired_user',session()->get('user_id'))
        ->where('ads.ad_status','PENDING')
        ->get();
        return view('CARPENTER.orders',compact('myorders','customer_orders'));
    }

    public function cmplt_order($id)
    {
        $cmplt = ads::find($id);
        $cmplt->ad_status = "COMPLETED";
        $cmplt->save();
        return redirect()->back();
    }




}
