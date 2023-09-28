<x-carpenter_header title="Manage Orders"/>
<!-- Table Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="text-center"> Customer Orders</h4>
                <div class="row">
                  <div class="col-12">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Customer Name</th>
                            <th>Customer Contact</th>
                            <th>Status</th>
                        </tr>
                        @php
                            $total = 1;
                        @endphp
                        <tbody>
                            @foreach ($customer_orders as $value)
                            <tr>
                                <td>{{ $total }}</td>
                                <td><img class="img-fluid" src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="" width="200px"></td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->first_name." ".$value->last_name }}</td>
                                <td>{{ $value->contact }}</td>
                                @if ($value->ad_status == "PENDING")
                                    <td> <a href="{{ URL::to('cmplt_order/'.$value->id) }}" class="btn btn-white" style="border: 1px solid white"> <i class="fa fa-check"></i> </a></td>
                                @else
                                    <td>{{ $value->status }}</td>
                                @endif
                                <td>  </td>
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
</div>
@if (session()->get('user_type') == "CARPENTER")
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="text-center"> My Orders</h4>
                <div class="row">
                  <div class="col-12">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>WholeSaller</th>
                            <th>WholeSaller Contact</th>
                            <th>Status</th>
                        </tr>
                        @php
                            $total = 1;
                        @endphp
                        <tbody>
                            @foreach ($myorders as $value)
                            <tr>
                                <td>{{ $total }}</td>
                                <td><img class="img-fluid" src="{{ URL::asset('uploads/ads/'.$value->img) }}" alt="" width="200px"></td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->first_name." ".$value->last_name }}</td>
                                <td>{{ $value->contact }}</td>
                                <td> <span class="text-primary">{{ $value->ad_status }}</span> </td>
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
@endif

<!-- Table End -->
<x-carpenter_footer />
