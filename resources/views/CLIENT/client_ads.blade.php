<x-header title="My Ads"/>
<!-- Feature Start -->
<div class="container-xxl py-5">
<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    <h1 class="display-5 mb-5">My Ads</h1>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal" style="border-radius: 5px">
                        Post Ad
                      </button>

                      <!-- The Modal -->
                      <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title text-primary">Add New Post</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{ URL::to('add_ad') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Title </label>
                                                <input type="text" name="title" id="" class="form-control"
                                                    placeholder="Enter Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Quantity </label>
                                                <input type="number" name="quantity" id=""
                                                    class="form-control" value="1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Budget </label>
                                                <input type="number" name="price" id=""
                                                    class="form-control" placeholder=" Enter Maximum Budget"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Ad File </label>
                                                <input type="file" name="ad_img" id="" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2"> Description </label>
                                                <textarea name="description" id="" cols="30" rows="5"
                                                    class="form-control"
                                                    placeholder="Enter Ad Description..."
                                                    style="resize: none" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary mt-2 float-right" type="submit"> Add
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
            @if ($count_ads > 0)
            @foreach ($client_ads as $value)
                <div class="col-lg-3 col-md-6 shadow ml-3 p-3" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="">
                        </div>
                        <div class="text-center">
                            <h5 class="mt-3">{{ $value->title }}</h5>

                            <a href="{{ URL::to('view_responses/'.$value->id) }}" class="btn btn-primary"> {{ $value->total_res }} Responses</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <h1 class="text-danger text-center" style="border: 1px solid red;padding:50px"> No Ads Yet. </h1>
            @endif
        </div>
    </div>
</div>
<!-- Team End -->
<x-footer />
