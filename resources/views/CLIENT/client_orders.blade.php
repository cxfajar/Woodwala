<x-header title="My Orders"/>
<!-- Feature Start -->
<div class="container-xxl py-5">
<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    <h1 class="display-5 mb-5">My Ordes</h1>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Carpenter</th>
                        <th>Carpenter Contact</th>
                        <th>Status</th>
                    </tr>
                    @php
                        $total = 1;
                    @endphp
                    <tbody>
                        @foreach ($orders as $value)
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
<!-- Team End -->
<x-footer />
