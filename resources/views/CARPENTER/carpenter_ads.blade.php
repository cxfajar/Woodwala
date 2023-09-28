<x-carpenter_header title="Manage Ads"/>
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="text-center"> Carpenter Ads <span class="text-danger">{{ $count_ads }}</span></h4>
                <div class="row">
                    <div class="col-8">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Add Ads
                        </button>
                    </div>
                    <div class="col-4">

                        @if (session()->has('success'))
                        <div class="alert alert-secondary">
                            <strong> Success! </strong><span> {{ session()->get('success') }} </span>
                        </div>
                        @endif

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header bg-secondary">
                                        <h4 class="modal-title"> Post New Ad </h4>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body bg-secondary">
                                        <form action="{{ URL::to('add_ad') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Title </label>
                                                <input type="text" name="title" id="" class="form-control text-white"
                                                    placeholder="Enter Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Quantity </label>
                                                <input type="number" name="quantity" id=""
                                                    class="form-control text-white" value="1">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Budget </label>
                                                <input type="number" name="price" id=""
                                                    class="form-control text-white" placeholder="Enter Maximum Budget">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Ad Image </label>
                                                <input type="file" name="ad_img" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Description </label>
                                                <textarea name="description" id="" cols="30" rows="10"
                                                    class="form-control text-white"
                                                    placeholder="Enter Ad Description..."
                                                    style="resize: none"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-danger mt-2 float-right" type="submit"> Add
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer bg-secondary">
                                        <button type="button" class="btn btn-secondary "
                                            data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">Ad. Img</th>
                                <th scope="col">Title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Del. Ad</th>
                                <th scope="col">Update Ad</th>
                                <th scope="col">Show/Hide</th>
                            </tr>
                        </thead>
                        @php
                        $total = 1;
                        @endphp
                        <tbody>
                            @foreach ($ads as $value)
                            <tr class="text-white">
                                <td>{{ $total }}</td>
                                <td> <img src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="" srcset=""
                                        width="50px" height="50px"> </td>
                                <td> {{ $value->title }}</td>
                                <td> {{ $value->quantity }}</td>
                                <td> {{ $value->description }}</td>
                                <td> {{ $value->price }}</td>
                                <td>
                                    <a href="{{ URL::to('del_ad/'.$value->id) }}" class="btn btn-danger"> <i
                                            class="fa fa-trash"></i> </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#myModal{{ $value->id }}">
                                        Update
                                    </button>
                                    <div class="modal fade" id="myModal{{ $value->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header bg-secondary">
                                                    <h4 class="modal-title"> Update Ad </h4>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body bg-secondary">
                                                    <form action="{{ URL::to('update_ad') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="ad_id" id=""
                                                            value="{{ $value->id }}">
                                                        <div class="form-group">
                                                            <label for="" class="mt-2"> Title </label>
                                                            <input type="text" name="title" id=""
                                                                class="form-control text-white"
                                                                placeholder="Enter Title" value="{{ $value->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mt-2"> Quantity </label>
                                                            <input type="number" name="quantity" id=""
                                                                class="form-control text-white"
                                                                value="{{ $value->quantity }}">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <label for="" class="mt-2"> File </label>
                                                                    <input type="file" name="ad_img" id=""
                                                                        class="form-control" value="{{ $value->img }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <span>Current Img</span>
                                                                <br>
                                                                <img src="{{ URL::asset('uploads/ads/'.$value->img) }}"
                                                                    alt="" srcset="" width="90px" height="50px">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mt-2"> Description </label>
                                                            <textarea name="description" id="" cols="30" rows="10"
                                                                class="form-control text-white"
                                                                placeholder="Enter Ad Description..."
                                                                style="resize: none">{{ $value->description }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-danger mt-2 float-right"
                                                                type="submit"> Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer bg-secondary">
                                                    <button type="button" class="btn btn-secondary "
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @if ($value->status == "SHOW")
                                <td>
                                    <a href="{{ URL::to('hide_ad/'.$value->id) }}" class="btn btn-danger"> HIDE </a>
                                </td>
                                @else
                                <td>
                                    <a href="{{ URL::to('show_ad/'.$value->id) }}" class="btn btn-success"> SHOW </a>
                                </td>
                                @endif
                            </tr>
                            @php
                            $total++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<x-carpenter_footer />
