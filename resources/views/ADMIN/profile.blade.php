@if (session()->get('user_type') != "ADMIN")
    <x-carpenter_header title="Profile"/>
@else
<x-admin_header title="Admin Profile"/>
@endif
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ URL::asset('uploads/'.$user->img) }}"  class="img-fluid">
                            <h2 class="text-dark"> {{ $user->first_name." ".$user->last_name }} </h2>
                            <h2 class="text-dark"> {{ $user->type }} </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="margin-bottom: 40px;text-align:center"> Update Profile </h4>
                            <form action="{{ URL::to('update_profile') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""> First Name </label>
                                            <input type="text" class="form-control" name="fname" value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for=""> Last Name </label>
                                        <input type="text" class="form-control" name="lname" value="{{ $user->last_name }}">
                                    </div>

                                    <div class="col-12">
                                        <label for=""> Password </label>
                                        <input type="text" class="form-control" name="password" value="{{ $user->password }}">
                                    </div>
                                    <div class="col-12">
                                        <label for=""> CNIC </label>
                                        <input type="text" class="form-control" name="cnic" value="{{ $user->cnic }}">
                                    </div>
                                    <div class="col-12">
                                        <label for=""> Contact </label>
                                        <input type="text" class="form-control" name="contact" value="{{ $user->contact}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2"> Update </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @if (session()->get('user_type') != "ADMIN")
    <x-carpenter_footer/>
@else
<x-admin_footer />
@endif
