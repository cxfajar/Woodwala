<x-carpenter_header title="Single Ad"/>
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary p-3">
        <div class="col-md-6" >
          <img src="{{ URL::asset('uploads/ads/'.$ad_detail->img) }}" class="img-fluid" />
        </div>
        <div class="col-md-6">
            <h2>{{ $ad_detail->title }}</h2>
            <h4>Quantity: {{ $ad_detail->quantity }}</h4>
            <h5>{{ $ad_detail->description }}</h5>
@if ($already_response)
        @if ($already_response > 0)
            <i class="text-danger"> You are Already Bid on this AD. </i>
        <br>
        <i>Price: <strong class="text-danger">{{ $response->price }}</strong> </i>
        <br>
        <i>Days: <strong class="text-danger">{{ $response->days }}</strong></i>
        <br>
        <i>Msg: <strong class="text-danger">{{ $response->msg }}</strong></i>

        @endif
@else
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Bid
</button>
@endif



            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header bg-secondary">
                            <h4 class="modal-title"> Give Response </h4>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body bg-secondary">
                            <form action="{{ URL::to('bid_ad') }}" method="post">
                                @csrf
                                <input type="hidden" name="ad_id" id="" value="{{ $ad_detail->id }}">
                                <div class="row">
                                    <div class="form-group">
                                        <input type="text" name="price" id="" class="form-control text-white"
                                            placeholder="Enter Price">
                                            <small>Price</small>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="date" name="sdate" id="" class="form-control text-white">
                                            <small>Start Date</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="date" name="edate" id="" class="form-control text-white">
                                            <small>End Date</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                   <textarea name="msg" id="" cols="30" rows="5" placeholder="Enter msg" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-danger mt-2 float-right" type="submit"> Bid
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-carpenter_footer />
