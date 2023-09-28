<x-carpenter_header title="Home"/>
            <!-- Sale & Revenue Start -->
            {{--  <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Manage Ads</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> Customer Orders </p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> My Orders </p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">History</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  --}}
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            @if (session()->get('user_type') == "CARPENTER")
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                    <a href="{{ URL::to('carpenter_ads') }}">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-arrow-right fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">My Ads</p>
                                <h6 class="mb-0">{{ $count_ads }}</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <a href="{{ URL::to('orders') }}">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> Cus. Orders </p>
                                {{--  <h6 class="mb-0">{{ $count_customer_orders }}</h6>  --}}
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <a href="{{ URL::to('orders') }}">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-box-open fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> My Orders </p>
                                <h6 class="mb-0">{{ $count_myorders }}</h6>
                            </div>
                        </div>
                    </a>
                    </div>

                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                        <h6> My Ads </h6>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>Ad</th>
                                        <th>Title</th>
                                        <th>quantity</th>
                                        <th>Responses</th>
                                    </tr>
                                    @php
                                        $tot = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($ads as $value)
                                            <tr>
                                            <td>{{ $tot }}</td>
                                            <td> <img src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="" srcset=""
                                             width="50px" height="50px"> </td>
                                            <td> {{ $value->title }}</td>
                                            <td> {{ $value->quantity }}</td>
                                            <td> <a href="{{ URL::to('cview_responses/'.$value->id ) }}" class="btn btn-danger"> {{ $value->total_res }} <i class="fa fa-arrow-right"></i> </a></td>
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
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <h6> Customer Ads </h6>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>Ad</th>
                                        <th>Title</th>
                                        <th>Quantity</th>
                                        <th>Responses</th>
                                        <th>View</th>
                                    </tr>
                                    @php
                                        $tot = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($clients_ads as $value)
                                            <tr>
                                            <td>{{ $tot }}</td>
                                            <td> <img src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="" srcset=""
                                             width="50px" height="50px"> </td>
                                            <td> {{ $value->title }}</td>
                                            <td> {{ $value->quantity }}</td>
                                            <td> {{ $value->total_res }} </td>
                                            <td> <a href="{{ URL::to('csingle_ad/'.$value->id) }}" class="btn btn-primary"> <i class="fa fa-arrow-right"></i> </a> </td>
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
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Pending Orders</h6>
                        <a href="{{ URL::to('orders') }}">Show All</a>
                    </div>
                    <div class="table-responsive">

                                @if ( $count_pending_orders > 0)
                                    @foreach ($pending_orders as $value)
                                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                                        <thead>
                                            <tr class="text-white">
                                                <th scope="col">Date</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <tr>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ $value->first_name." ".$value->last_name }}</td>
                                        <td>{{ $value->ad_status }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <h1 class="text-danger"> No Orders yet. </h1>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @elseif(session()->get('user_type') == "WHOLESALLER")
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary text-center rounded p-4">
                            <h6> Carpenter Ads </h6>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>Ad</th>
                                        <th>Title</th>
                                        <th>Quantity</th>
                                        <th>Responses</th>
                                        <th>View</th>
                                    </tr>
                                    @php
                                        $tot = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($carpenter_ads as $value)
                                            <tr>
                                            <td>{{ $tot }}</td>
                                            <td> <img src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="" srcset=""
                                             width="50px" height="50px"> </td>
                                            <td> {{ $value->title }}</td>
                                            <td> {{ $value->quantity }}</td>
                                            <td> {{ $value->total_res }} </td>
                                            <td> <a href="{{ URL::to('csingle_ad/'.$value->id) }}" class="btn btn-primary"> <i class="fa fa-arrow-right"></i> </a> </td>
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
            </div>

            @endif

            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            {{--  <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Pending Orders</h6>
                        <a href="{{ URL::to('orders') }}">Show All</a>
                    </div>
                    <div class="table-responsive">

                                @if ( $count_customer_orders > 0)
                                    @foreach ($pending_orders as $value)
                                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                                        <thead>
                                            <tr class="text-white">
                                                <th scope="col">Date</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <tr>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ $value->first_name." ".$value->last_name }}</td>
                                        <td>{{ $value->ad_status }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <h1 class="text-danger"> No Orders yet. </h1>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  --}}
            <!-- Recent Sales End -->
<x-carpenter_footer />
