<x-admin_header title="ADMIN PANEL"/>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">{{ $admin->first_name." ".$admin->last_name }}!</div>
						</h4>
						<ul>
                            <li> Manage Customers </li>
                            <li> Manage Wholesallers </li>
                            <li> Manage Carpenters </li>
                            <li> Manage Ads </li>
                        </ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $count_customers }}</div>
								<div class="weight-600 font-14">Customers</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $count_carpenters }}</div>
								<div class="weight-600 font-14">Carpenters</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $count_wholesallers }}</div>
								<div class="weight-600 font-14">Whole Saller</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $count_ads }}</div>
								<div class="weight-600 font-14">Ads</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Completed Orders</h2>
				<table class="table p-3">
                    <tr>
                        <th> Title </th>
                        <th> Ad by </th>
                        <th> Completed by </th>
                        <th> Date </th>
                    </tr>
                    <tbody>
                        @foreach ($completed_orders as $value)
                            <tr>
                                <td>{{ $value->title }}</td>
                                <td> {{ $value->type }}</td>
                                <td> {{ $value->first_name." ".$value->last_name }} </td>
                                <td> {{ $value->updated_at }} </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
			</div>
			<x-admin_footer />
