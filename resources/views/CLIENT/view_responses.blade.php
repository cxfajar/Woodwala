<x-header title="View Responses"/>
<!-- Feature Start -->
<div class="container-xxl py-5">
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-2">
                        <a href="{{ URL::to('del_ad/'.$ad->id) }}" class="btn btn-danger" style="border-radius: 5px"> <i
                                class="fa fa-trash"></i> </a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                            style="border-radius: 5px">
                            Edit Ad
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title text-primary">Update Ad</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ URL::to('update_ad') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="ad_id" id="" value="{{ $ad->id }}">
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Title </label>
                                                <input type="text" name="title" id="" class="form-control"
                                                    placeholder="Enter Title" value="{{ $ad->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Quantity </label>
                                                <input type="number" name="quantity" id="" class="form-control"
                                                    value="{{ $ad->quantity }}">
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="" class="mt-2"> File </label>
                                                        <input type="file" name="ad_img" id="" class="form-control"
                                                            value="{{ $ad->img }}">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <span>Current Img</span>
                                                    <br>
                                                    <img src="{{ URL::asset('uploads/ads/'.$ad->img) }}" alt=""
                                                        srcset="" width="90px" height="50px">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Description </label>
                                                <textarea name="description" id="" cols="30" rows="10"
                                                    class="form-control" placeholder="Enter Ad Description..."
                                                    style="resize: none">{{ $ad->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-danger mt-2 float-right" type="submit"> Update
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
            <div class="row g-4">
                <div class="col-lg-6" style="border-right: 1px solid silver">
                    <img class="img-fluid" src="{{ URL::asset('uploads/ads/'.$ad->img) }}" alt="">

                </div>
                <div class="col-lg-6">
                    <h3>{{ $ad->title }}</h3>
                    <h5>Quan. {{ $ad->quantity }}</h5>
                    <p>{{ $ad->description }}</p>
                </div>
            </div>

            <hr>
            <h2 class="text-primary text-center"> Responded Carpenters </h2>
            <div class="row">
                @foreach ($responses as $value)
                <div class="col-4">
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="{{ URL::asset('uploads/'.$value->img) }}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{ $value->first_name." ".$value->last_name }}</h4>
                            <p class="card-text">{{ $value->type }}</p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{ $value->id }}">
                                View Response
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CARPENTER DETAIL</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ URL::to('hire_user') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="ad_id" id="" value="{{ $value->ad_id }}">
                                                <input type="hidden" name="user_id" id="" value="{{ $value->id }}">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" value="{{ $value->price }}" readonly>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="" id="" value="{{ $value->days }} Days" readonly>
                                                </div>
                                            </div>
                                            <br>
                                            <textarea name="" id="" cols="30" rows="5" class="form-control" readonly style="resize: none">{{ $value->msg }}</textarea>

                                            <div class="form-group">
                                                <button class="btn btn-primary mt-3 float-right" type="submit"> HIRE </button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Team End -->
    <x-footer />
