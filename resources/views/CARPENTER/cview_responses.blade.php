<x-carpenter_header title="Ad Responses"/>
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="text-center"> Responses</h4>
                <div class="row">
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
                                        data-target="#exampleModal">
                                        View Response
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
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
    </div>
</div>
<!-- Table End -->
<x-carpenter_footer />
