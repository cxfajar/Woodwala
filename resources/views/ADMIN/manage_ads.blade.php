<x-admin_header title="Manage Ads"/>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Manage Ads</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ads
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Post By</th>
                                <th>Ad</th>
                                <th>Title</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $tot = 1;
                            @endphp
                            <tbody>
                                @foreach ($ads as $value)
                                    <tr>
                                    <td>{{ $tot }}</td>
                                    <td>{{ $value->type }}</td>
                                    <td> <img src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="" srcset=""
                                     width="50px" height="50px"> </td>
                                    <td> {{ $value->title }}</td>
                                    <td> {{ $value->quantity }}</td>
                                    <td>
                                        <a href="{{ URL::to('approve_ad/'.$value->id ) }}" class="btn btn-success"> <i class="fa fa-check"></i>  </a>
                                        |
                                        <a href="{{ URL::to('cancel_ad/'.$value->id ) }}" class="btn btn-danger"> <i class="fa fa-remove"></i>  </a>
                                    </td>
                                    </tr>
                                @php
                                    $tot++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-admin_footer />
