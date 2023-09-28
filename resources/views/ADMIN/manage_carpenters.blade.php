<x-admin_header title="Manage Carpenters"/>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Carpenters</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Carpenters {{ $count_active }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                <div class="row">
                    <div class="col-lg-8">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#exampleModal">
                            Requests ({{$count_requested}})
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Requests</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Sr. </th>
                                                <th>Full Name</th>
                                                <th>E-mail</th>
                                                <th>Cnic</th>
                                                <th>City/Area</th>
                                                <th>Contact</th>
                                                <th>Approve</th>
                                            </tr>
                                            @php
                                            $total = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($requested_carpenter as $cust)
                                                <tr>
                                                    <td>{{ $total }}</td>
                                                    <td>{{ $cust->first_name." ".$cust->last_name }}</td>
                                                    <td>{{ $cust->email }}</td>
                                                    <td>{{ $cust->cnic }}</td>
                                                    <td>{{ $cust->city." ".$cust->area }}</td>
                                                    <td>{{ $cust->contact }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-success" data-toggle="modal"
                                                            data-target="#confirmation-modal{{ $total }}" type="button">
                                                            Approve<i class="fa fa-check"> </i>
                                                        </a>
                                                        <div class="modal fade" id="confirmation-modal{{ $total }}"
                                                            tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body text-center font-18">
                                                                        <h4 class="padding-top-30 mb-30 weight-500">Are you sure
                                                                            you want to
                                                                            Approve?</h4>
                                                                        <div class="padding-bottom-30 row"
                                                                            style="max-width: 170px; margin: 0 auto;">
                                                                            <div class="col-6">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                                                                    data-dismiss="modal"><i
                                                                                        class="fa fa-times"></i></button>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <a href="{{ URL::to('unblock/'.$cust->id) }}"
                                                                                    class="btn btn-primary border-radius-100 btn-block confirmation-btn">
                                                                                    <i class="fa fa-check"></i> </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
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
                        <button type="button" class="btn btn-danger text-white mt-3 mb-3" data-toggle="modal"
                            data-target="#myModal">
                            BLOCKED ({{ $count_blocked }})
                        </button>
                    </div>
                    <div class="col-lg-4">
                        @if (session()->has('block'))
                        <div class="alert alert-danger">
                            {{ session()->get('block') }}
                        </div>
                        @endif
                        @if (session()->has('active'))
                        <div class="alert alert-success">
                            {{ session()->get('active') }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Blocked Carpenters</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Sr. </th>
                                        <th>Full Name</th>
                                        <th>E-mail</th>
                                        <th>Cnic</th>
                                        <th>City/Area</th>
                                        <th>Contact</th>
                                        <th>Un-Block</th>
                                    </tr>
                                    @php
                                    $total = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($blocked_carpenter as $cust)
                                        <tr>
                                            <td>{{ $total }}</td>
                                            <td>{{ $cust->first_name." ".$cust->last_name }}</td>
                                            <td>{{ $cust->email }}</td>
                                            <td>{{ $cust->cnic }}</td>
                                            <td>{{ $cust->city." ".$cust->area }}</td>
                                            <td>{{ $cust->contact }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#confirmation-modal{{ $total }}" type="button">
                                                    Un-Block <i class="fa fa-check"> </i>
                                                </a>
                                                <div class="modal fade" id="confirmation-modal{{ $total }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center font-18">
                                                                <h4 class="padding-top-30 mb-30 weight-500">Are you sure
                                                                    you want to
                                                                    Unblock?</h4>
                                                                <div class="padding-bottom-30 row"
                                                                    style="max-width: 170px; margin: 0 auto;">
                                                                    <div class="col-6">
                                                                        <button type="button"
                                                                            class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                                                            data-dismiss="modal"><i
                                                                                class="fa fa-times"></i></button>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a href="{{ URL::to('unblock/'.$cust->id) }}"
                                                                            class="btn btn-primary border-radius-100 btn-block confirmation-btn">
                                                                            <i class="fa fa-check"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                        $total++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>Sr. </th>
                        <th>Full Name</th>
                        <th>E-mail</th>
                        <th>Cnic</th>
                        <th>City/Area</th>
                        <th>Contact</th>
                        <th>Block</th>
                    </tr>
                    @php
                    $total = 1;
                    @endphp
                    <tbody>
                        @foreach ($active_carpenter as $cust)
                        <tr>
                            <td>{{ $total }}</td>
                            <td>{{ $cust->first_name." ".$cust->last_name }}</td>
                            <td>{{ $cust->email }}</td>
                            <td>{{ $cust->cnic }}</td>
                            <td>{{ $cust->city." ".$cust->area }}</td>
                            <td>{{ $cust->contact }}</td>
                            <td>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmation-modal{{ $cust->id }}"
                                    type="button">
                                    BLOCK <i class="fa fa-user-times"></i>
                                </a>
                                <div class="modal fade" id="confirmation-modal{{ $cust->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center font-18">
                                                <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to
                                                    Block?</h4>
                                                <div class="padding-bottom-30 row"
                                                    style="max-width: 170px; margin: 0 auto;">
                                                    <div class="col-6">
                                                        <button type="button"
                                                            class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                                            data-dismiss="modal"><i class="fa fa-times"></i></button>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="{{ URL::to('block/'.$cust->id) }}"
                                                            class="btn btn-danger border-radius-100 btn-block confirmation-btn">
                                                            <i class="fa fa-check"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                        $total++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <x-admin_footer />
