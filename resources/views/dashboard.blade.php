@extends('layout.template')

@section('title', 'Dashboard')

@section('content')
	<section class="row">
		<div class="col-12 col-lg-9">
			<div class="row">
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="px-4 card-body py-4-5">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="mb-2 stats-icon purple">
										<i class="iconly-boldShow"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="font-semibold text-muted">Total Warehouse</h6>
									<h6 class="mb-0 font-extrabold">{{ $totalWarehouse }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="px-4 card-body py-4-5">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="mb-2 stats-icon blue">
										<i class="iconly-boldProfile"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="font-semibold text-muted">Total Category</h6>
									<h6 class="mb-0 font-extrabold">{{ $totalCategory }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="px-4 card-body py-4-5">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="mb-2 stats-icon green">
										<i class="iconly-boldAdd-User"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="font-semibold text-muted">Total Product</h6>
									<h6 class="mb-0 font-extrabold">{{ $totalProduct }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="px-4 card-body py-4-5">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="mb-2 stats-icon red">
										<i class="iconly-boldBookmark"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="font-semibold text-muted">Total Staff</h6>
									<h6 class="mb-0 font-extrabold">{{ $totalStaff }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Item Yearly Statistic</h4>
						</div>
						<div class="card-body">
							<div id="chart-item-yearly"></div>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-xl-12">
					<div class="card">
						<div class="card-header">
							<h4>Recent Activity</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover table-lg">
									<thead>
										<tr>
											<th>Product</th>
											<th>Warehouse</th>
											<th>Quantity Changes</th>
											<th>Log Time</th>
										</tr>
									</thead>
									<tbody>
										@for ($i = 0; $i < 4; $i++)
											<tr>
												<td class="col-3">
													<div class="d-flex align-items-center">
														<div class="avatar avatar-md">
															<img src="dist/assets/compiled/jpg/{{ $i + 1 }}.jpg">
														</div>
														<p class="mb-0 font-bold ms-3">{{ $stockHistory[$i]->product->name }}</p>
													</div>
												</td>
												<td class="col-auto">
													<p class="mb-0">{{ $stockHistory[$i]->warehouse->city }}</p>
												</td>
												<td class="col-auto">
													<p class="mb-0">{{ $stockHistory[$i]->transaction_value }}</p>
												</td>
												<td class="col-auto">
													<p class="mb-0">{{ $stockHistory[$i]->created_at }}</p>
												</td>
											</tr>
										@endfor
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-3">
			<div class="card">
				<div class="px-4 py-4 card-body">
					<div class="d-flex align-items-center">
						<div class="avatar avatar-xl">
							<img src="dist/assets/compiled/jpg/1.jpg" alt="Face 1">
						</div>
						<div class="name ms-3">
							<h5 class="font-bold">{{ Auth::user()->name }}</h5>
							<h6 class="mb-0 text-muted">{{ Auth::user()->email }}</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h4>Warehouse List</h4>
				</div>
				<div class="pb-4 card-content">
					@for ($i = 0; $i < 3; $i++)
						<div class="px-4 py-3 recent-message d-flex">
							<div class="avatar avatar-lg">
								<img src="dist/assets/compiled/jpg/{{ $i + 1 }}.jpg">
							</div>
							<div class="name ms-4">
								<h5 class="mb-1"># {{ $warehouse[$i]->id }}</h5>
								<h6 class="mb-1 text-muted">{{ $warehouse[$i]->city }} {{ $warehouse[$i]->postalcode }}</h6>
							</div>
						</div>
					@endfor
					<div class="px-4">
						<a href="{{route('warehouse.index')}}" class='mt-3 font-bold btn btn-block btn-xl btn-outline-primary'>View More</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h4>Warehouse Activity</h4>
				</div>
				<div class="card-body">
                    @foreach ($activity as $act)
                        <div class="row">
                            <div class="col-7">
                                <div class="d-flex align-items-center">
                                    <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                                        <use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">{{$act['warehouseDetail']->warehouse->city}}</h5>
                                </div>
                            </div>
                            <div class="col-5">
                                <h5 class="mb-0 text-end">{{$act['transaction_per_year']}}</h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-{{$act['warehouseDetail']->warehouse->city}}"></div>
                            </div>
                        </div>
                    @endforeach
				</div>
			</div>
		</div>
	</section>
@endsection

@section('custom-script')
	<!-- Need: Apexcharts -->
	<script src="dist/assets/extensions/apexcharts/apexcharts.min.js"></script>
	{{-- <script src="dist/assets/static/js/pages/dashboard.js"></script> --}}
	<script>
		var monthlyData = {!! json_encode($monthlyData) !!};
        var activity = {!! json_encode($activity) !!};

        var city = activity.map(function(item) {
            return item.warehouseDetail
        });

        var activityData = activity.map(function(item) {
            return item.monthly_data
        });

		var inDatas = monthlyData.map(function(item) {
			return item.total_in;
		});

		var outDatas = monthlyData.map(function(item) {
			return item.total_out;
		});

		var optionsItemYearly = {
			annotations: {
				position: "back",
			},
			dataLabels: {
				enabled: false,
			},
			chart: {
				type: "bar",
				height: 300,
				stacked: true,

			},
			fill: {
				opacity: 1,
			},
			plotOptions: {
				bar: {
					horizontal: false,
					columnWidth: '55%',
					endingShape: 'rounded'
				},
			},
			series: [{
					name: "In",
					group: 'Item flow',
					data: inDatas,
				},
				{
					name: "Out",
					group: 'Item flow',
					data: outDatas,
				}
			],
			colors: ["#435ebe", "#dc3545"],
			plotOptions: {
				bar: {
					columnWidth: 20,
				}
			},
			legend: {
				position: 'top',
				horizontalAlign: 'left'
			},
			xaxis: {
				categories: [
					"Jan",
					"Feb",
					"Mar",
					"Apr",
					"May",
					"Jun",
					"Jul",
					"Aug",
					"Sep",
					"Oct",
					"Nov",
					"Dec",
				],
			},
		}

		var option1 = {
			series: [{
				name: "series1",
				data: activityData[0],
			}, ],
			chart: {
				height: 80,
				type: "area",
				toolbar: {
					show: false,
				},
			},
			colors: ["#5350e9"],
			stroke: {
				width: 2,
			},
			grid: {
				show: false,
			},
			dataLabels: {
				enabled: false,
			},
			xaxis: {
				type: "datetime",
				categories: [
					"2018-09-19T00:00:00.000Z",
					"2018-09-19T01:30:00.000Z",
					"2018-09-19T02:30:00.000Z",
					"2018-09-19T03:30:00.000Z",
					"2018-09-19T04:30:00.000Z",
					"2018-09-19T05:30:00.000Z",
					"2018-09-19T06:30:00.000Z",
					"2018-09-19T07:30:00.000Z",
					"2018-09-19T08:30:00.000Z",
					"2018-09-19T09:30:00.000Z",
					"2018-09-19T10:30:00.000Z",
					"2018-09-19T11:30:00.000Z",
				],
				axisBorder: {
					show: false,
				},
				axisTicks: {
					show: false,
				},
				labels: {
					show: false,
				},
			},
			show: false,
			yaxis: {
				labels: {
					show: false,
				},
			},
			tooltip: {
				x: {
					format: "dd/MM/yy HH:mm",
				},
			},
		}

		var option2 = {
			series: [{
				name: "series1",
				data: activityData[1],
			}, ],
			chart: {
				height: 80,
				type: "area",
				toolbar: {
					show: false,
				},
			},
			colors: ["#5350e9"],
			stroke: {
				width: 2,
			},
			grid: {
				show: false,
			},
			dataLabels: {
				enabled: false,
			},
			xaxis: {
				type: "datetime",
				categories: [
					"2018-09-19T00:00:00.000Z",
					"2018-09-19T01:30:00.000Z",
					"2018-09-19T02:30:00.000Z",
					"2018-09-19T03:30:00.000Z",
					"2018-09-19T04:30:00.000Z",
					"2018-09-19T05:30:00.000Z",
					"2018-09-19T06:30:00.000Z",
					"2018-09-19T07:30:00.000Z",
					"2018-09-19T08:30:00.000Z",
					"2018-09-19T09:30:00.000Z",
					"2018-09-19T10:30:00.000Z",
					"2018-09-19T11:30:00.000Z",
				],
				axisBorder: {
					show: false,
				},
				axisTicks: {
					show: false,
				},
				labels: {
					show: false,
				},
			},
			show: false,
			yaxis: {
				labels: {
					show: false,
				},
			},
			tooltip: {
				x: {
					format: "dd/MM/yy HH:mm",
				},
			},
		}

        var option3 = {
			series: [{
				name: "series1",
				data: activityData[2],
			}, ],
			chart: {
				height: 80,
				type: "area",
				toolbar: {
					show: false,
				},
			},
			colors: ["#5350e9"],
			stroke: {
				width: 2,
			},
			grid: {
				show: false,
			},
			dataLabels: {
				enabled: false,
			},
			xaxis: {
				type: "datetime",
				categories: [
					"2018-09-19T00:00:00.000Z",
					"2018-09-19T01:30:00.000Z",
					"2018-09-19T02:30:00.000Z",
					"2018-09-19T03:30:00.000Z",
					"2018-09-19T04:30:00.000Z",
					"2018-09-19T05:30:00.000Z",
					"2018-09-19T06:30:00.000Z",
					"2018-09-19T07:30:00.000Z",
					"2018-09-19T08:30:00.000Z",
					"2018-09-19T09:30:00.000Z",
					"2018-09-19T10:30:00.000Z",
					"2018-09-19T11:30:00.000Z",
				],
				axisBorder: {
					show: false,
				},
				axisTicks: {
					show: false,
				},
				labels: {
					show: false,
				},
			},
			show: false,
			yaxis: {
				labels: {
					show: false,
				},
			},
			tooltip: {
				x: {
					format: "dd/MM/yy HH:mm",
				},
			},
		}

        var option4 = {
			series: [{
				name: "series1",
				data: activityData[3],
			}, ],
			chart: {
				height: 80,
				type: "area",
				toolbar: {
					show: false,
				},
			},
			colors: ["#5350e9"],
			stroke: {
				width: 2,
			},
			grid: {
				show: false,
			},
			dataLabels: {
				enabled: false,
			},
			xaxis: {
				type: "datetime",
				categories: [
					"2018-09-19T00:00:00.000Z",
					"2018-09-19T01:30:00.000Z",
					"2018-09-19T02:30:00.000Z",
					"2018-09-19T03:30:00.000Z",
					"2018-09-19T04:30:00.000Z",
					"2018-09-19T05:30:00.000Z",
					"2018-09-19T06:30:00.000Z",
					"2018-09-19T07:30:00.000Z",
					"2018-09-19T08:30:00.000Z",
					"2018-09-19T09:30:00.000Z",
					"2018-09-19T10:30:00.000Z",
					"2018-09-19T11:30:00.000Z",
				],
				axisBorder: {
					show: false,
				},
				axisTicks: {
					show: false,
				},
				labels: {
					show: false,
				},
			},
			show: false,
			yaxis: {
				labels: {
					show: false,
				},
			},
			tooltip: {
				x: {
					format: "dd/MM/yy HH:mm",
				},
			},
		}

		var chartItemYearly = new ApexCharts(
			document.querySelector("#chart-item-yearly"),
			optionsItemYearly
		)
		var chart1 = new ApexCharts(
			document.querySelector("#chart-"+city[0]['warehouse']['city']),
			option1
		)
		var chart2 = new ApexCharts(
			document.querySelector("#chart-"+city[1]['warehouse']['city']),
			option2
		)
		var chart3 = new ApexCharts(
			document.querySelector("#chart-"+city[2]['warehouse']['city']),
			option3
		)
		var chart4 = new ApexCharts(
			document.querySelector("#chart-"+city[3]['warehouse']['city']),
			option4
		)

		chart4.render()
		chart2.render()
		chart3.render()
		chart1.render()
		chartItemYearly.render()
	</script>
@endsection
