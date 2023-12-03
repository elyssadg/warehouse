@extends('layout.template')

@section('title', 'Dashboard')

@section('content')
				<section class="row">
								<div class="col-12 col-lg-9">
												<div class="row">
																<div class="col-6 col-lg-3 col-md-6">
																				<div class="card">
																								<div class="card-body py-4-5 px-4">
																												<div class="row">
																																<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
																																				<div class="stats-icon purple mb-2">
																																								<i class="iconly-boldShow"></i>
																																				</div>
																																</div>
																																<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
																																				<h6 class="text-muted font-semibold">Total Warehouse</h6>
																																				<h6 class="mb-0 font-extrabold">{{ $totalWarehouse }}</h6>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
																<div class="col-6 col-lg-3 col-md-6">
																				<div class="card">
																								<div class="card-body py-4-5 px-4">
																												<div class="row">
																																<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
																																				<div class="stats-icon blue mb-2">
																																								<i class="iconly-boldProfile"></i>
																																				</div>
																																</div>
																																<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
																																				<h6 class="text-muted font-semibold">Total Category</h6>
																																				<h6 class="mb-0 font-extrabold">{{ $totalCategory }}</h6>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
																<div class="col-6 col-lg-3 col-md-6">
																				<div class="card">
																								<div class="card-body py-4-5 px-4">
																												<div class="row">
																																<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
																																				<div class="stats-icon green mb-2">
																																								<i class="iconly-boldAdd-User"></i>
																																				</div>
																																</div>
																																<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
																																				<h6 class="text-muted font-semibold">Total Product</h6>
																																				<h6 class="mb-0 font-extrabold">{{ $totalProduct }}</h6>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
																<div class="col-6 col-lg-3 col-md-6">
																				<div class="card">
																								<div class="card-body py-4-5 px-4">
																												<div class="row">
																																<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
																																				<div class="stats-icon red mb-2">
																																								<i class="iconly-boldBookmark"></i>
																																				</div>
																																</div>
																																<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
																																				<h6 class="text-muted font-semibold">Total Staff</h6>
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
																<div class="col-12 col-xl-4">
																				<div class="card">
																								<div class="card-header">
																												<h4>Warehouse Activity</h4>
																								</div>
																								<div class="card-body">
																												<div class="row">
																																<div class="col-7">
																																				<div class="d-flex align-items-center">
																																								<svg class="bi text-primary" width="32" height="32" fill="blue"
																																												style="width:10px">
																																												<use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
																																								</svg>
																																								<h5 class="mb-0 ms-3">Europe</h5>
																																				</div>
																																</div>
																																<div class="col-5">
																																				<h5 class="mb-0 text-end">862</h5>
																																</div>
																																<div class="col-12">
																																				<div id="chart-europe"></div>
																																</div>
																												</div>
																												<div class="row">
																																<div class="col-7">
																																				<div class="d-flex align-items-center">
																																								<svg class="bi text-success" width="32" height="32" fill="blue"
																																												style="width:10px">
																																												<use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
																																								</svg>
																																								<h5 class="mb-0 ms-3">America</h5>
																																				</div>
																																</div>
																																<div class="col-5">
																																				<h5 class="mb-0 text-end">375</h5>
																																</div>
																																<div class="col-12">
																																				<div id="chart-america"></div>
																																</div>
																												</div>
																												<div class="row">
																																<div class="col-7">
																																				<div class="d-flex align-items-center">
																																								<svg class="bi text-success" width="32" height="32" fill="blue"
																																												style="width:10px">
																																												<use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
																																								</svg>
																																								<h5 class="mb-0 ms-3">India</h5>
																																				</div>
																																</div>
																																<div class="col-5">
																																				<h5 class="mb-0 text-end">625</h5>
																																</div>
																																<div class="col-12">
																																				<div id="chart-india"></div>
																																</div>
																												</div>
																												<div class="row">
																																<div class="col-7">
																																				<div class="d-flex align-items-center">
																																								<svg class="bi text-danger" width="32" height="32" fill="blue"
																																												style="width:10px">
																																												<use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
																																								</svg>
																																								<h5 class="mb-0 ms-3">Indonesia</h5>
																																				</div>
																																</div>
																																<div class="col-5">
																																				<h5 class="mb-0 text-end">1025</h5>
																																</div>
																																<div class="col-12">
																																				<div id="chart-indonesia"></div>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
																<div class="col-12 col-xl-8">
																				<div class="card">
																								<div class="card-header">
																												<h4>Latest Comments</h4>
																								</div>
																								<div class="card-body">
																												<div class="table-responsive">
																																<table class="table-hover table-lg table">
																																				<thead>
																																								<tr>
																																												<th>Name</th>
																																												<th>Comment</th>
																																								</tr>
																																				</thead>
																																				<tbody>
																																								<tr>
																																												<td class="col-3">
																																																<div class="d-flex align-items-center">
																																																				<div class="avatar avatar-md">
																																																								<img src="dist/assets/compiled/jpg/5.jpg">
																																																				</div>
																																																				<p class="mb-0 ms-3 font-bold">Si Cantik</p>
																																																</div>
																																												</td>
																																												<td class="col-auto">
																																																<p class="mb-0">Congratulations on your graduation!</p>
																																												</td>
																																								</tr>
																																								<tr>
																																												<td class="col-3">
																																																<div class="d-flex align-items-center">
																																																				<div class="avatar avatar-md">
																																																								<img src="dist/assets/compiled/jpg/2.jpg">
																																																				</div>
																																																				<p class="mb-0 ms-3 font-bold">Si Ganteng</p>
																																																</div>
																																												</td>
																																												<td class="col-auto">
																																																<p class="mb-0">Wow amazing design! Can you make another
																																																				tutorial for
																																																				this design?</p>
																																												</td>
																																								</tr>
																																								<tr>
																																												<td class="col-3">
																																																<div class="d-flex align-items-center">
																																																				<div class="avatar avatar-md">
																																																								<img src="dist/assets/compiled/jpg/8.jpg">
																																																				</div>
																																																				<p class="mb-0 ms-3 font-bold">Singh Eknoor</p>
																																																</div>
																																												</td>
																																												<td class="col-auto">
																																																<p class="mb-0">What a stunning design! You are so
																																																				talented and creative!</p>
																																												</td>
																																								</tr>
																																								<tr>
																																												<td class="col-3">
																																																<div class="d-flex align-items-center">
																																																				<div class="avatar avatar-md">
																																																								<img src="dist/assets/compiled/jpg/3.jpg">
																																																				</div>
																																																				<p class="mb-0 ms-3 font-bold">Rani Jhadav</p>
																																																</div>
																																												</td>
																																												<td class="col-auto">
																																																<p class="mb-0">I love your design! It’s so beautiful and
																																																				unique! How did you learn to do this?</p>
																																												</td>
																																								</tr>
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
																<div class="card-body px-4 py-4">
																				<div class="d-flex align-items-center">
																								<div class="avatar avatar-xl">
																												<img src="dist/assets/compiled/jpg/1.jpg" alt="Face 1">
																								</div>
																								<div class="name ms-3">
																												<h5 class="font-bold">{{ Auth::user()->name }}</h5>
																												<h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
																								</div>
																				</div>
																</div>
												</div>
												<div class="card">
																<div class="card-header">
																				<h4>Warehouse List</h4>
																</div>
																<div class="card-content pb-4">
																				<div class="recent-message d-flex px-4 py-3">
																								<div class="avatar avatar-lg">
																												<img src="dist/assets/compiled/jpg/4.jpg">
																								</div>
																								<div class="name ms-4">
																												<h5 class="mb-1"># {{ $warehouse[0]->id }}</h5>
																												<h6 class="text-muted mb-1">{{ $warehouse[0]->city }} {{ $warehouse[0]->postalcode }}</h6>
																								</div>
																				</div>
																				<div class="recent-message d-flex px-4 py-3">
																								<div class="avatar avatar-lg">
																												<img src="dist/assets/compiled/jpg/5.jpg">
																								</div>
																								<div class="name ms-4">
																												<h5 class="mb-1"># {{ $warehouse[1]->id }}</h5>
																												<h6 class="text-muted mb-1">{{ $warehouse[1]->city }} {{ $warehouse[1]->postalcode }}</h6>
																								</div>
																				</div>
																				<div class="recent-message d-flex px-4 py-3">
																								<div class="avatar avatar-lg">
																												<img src="dist/assets/compiled/jpg/1.jpg">
																								</div>
																								<div class="name ms-4">
																												<h5 class="mb-1"># {{ $warehouse[2]->id }}</h5>
																												<h6 class="text-muted mb-1">{{ $warehouse[2]->city }} {{ $warehouse[2]->postalcode }}</h6>
																								</div>
																				</div>
																				<div class="px-4">
																								<button class='btn btn-block btn-xl btn-outline-primary mt-3 font-bold'>View More</button>
																				</div>
																</div>
												</div>
												<div class="card">
																<div class="card-header">
																				<h4>Visitors Profile</h4>
																</div>
																<div class="card-body">
																				<div id="chart-visitors-profile"></div>
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
								var monthlyData = {!! json_encode($monthlyData) !!};

								var inDatas = monthlyData.map(function(item) {
												return item.total_in;
								});

								var outDatas = monthlyData.map(function(item) {
												return item.total_out;
								});

								var combinedData = monthlyData.map(function(item, index) {
												return {
																x: item.month,
																y: [inDatas[index], outDatas[index]]
												};
								});
								console.log(combinedData)
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

								let optionsVisitorsProfile = {
												series: [70, 30],
												labels: ["Male", "Female"],
												colors: ["#435ebe", "#55c6e8"],
												chart: {
																type: "donut",
																width: "100%",
																height: "350px",
												},
												legend: {
																position: "bottom",
												},
												plotOptions: {
																pie: {
																				donut: {
																								size: "30%",
																				},
																},
												},
								}

								var optionsEurope = {
												series: [{
																name: "series1",
																data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605],
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

								let optionsAmerica = {
												...optionsEurope,
												colors: ["#008b75"],
								}
								let optionsIndia = {
												...optionsEurope,
												colors: ["#ffc434"],
								}
								let optionsIndonesia = {
												...optionsEurope,
												colors: ["#dc3545"],
								}

								var chartItemYearly = new ApexCharts(
												document.querySelector("#chart-item-yearly"),
												optionsItemYearly
								)
								var chartVisitorsProfile = new ApexCharts(
												document.getElementById("chart-visitors-profile"),
												optionsVisitorsProfile
								)
								var chartEurope = new ApexCharts(
												document.querySelector("#chart-europe"),
												optionsEurope
								)
								var chartAmerica = new ApexCharts(
												document.querySelector("#chart-america"),
												optionsAmerica
								)
								var chartIndia = new ApexCharts(
												document.querySelector("#chart-india"),
												optionsIndia
								)
								var chartIndonesia = new ApexCharts(
												document.querySelector("#chart-indonesia"),
												optionsIndonesia
								)

								chartIndonesia.render()
								chartAmerica.render()
								chartIndia.render()
								chartEurope.render()
								chartItemYearly.render()
								chartVisitorsProfile.render()
				</script>
@endsection
