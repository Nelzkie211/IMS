<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/imsIcon.ico');?>"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<title>IMS</title>
</head>
<body class="bg-light">
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
					<a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
						<span class="fs-3 d-none text-danger d-sm-inline">IMS</span>
					</a>
					<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
						<li class="nav-item mb-3 mt-3">
							<a href="#" class="nav-link align-middle px-0 text-danger " id="home">
								<i class="fas fa-home"></i> <span class="ms-2 d-none d-sm-inline">Home</span>
							</a>
						</li>
						<li class="nav-item mb-3">
							<a href="#" class="nav-link align-middle px-0 text-white " id="dashboard">
								<i class="fas fa-chart-pie"></i> <span class="ms-2 d-none d-sm-inline">Dashbord</span>
							</a>
						</li>
						<li class="nav-item mb-3">
							<a href="#" class="nav-link px-0 align-middle text-white " id="inventory">
								<i class="fas fa-list"></i> <span class="ms-2 d-none d-sm-inline">Inventory</span>
							</a>
						</li>
						<li class="nav-item mb-3">
							<a href="#" class="nav-link px-0 align-middle text-white itemss" id="itemList">
								<i class="fas fa-box-tissue"></i> <span class="ms-2 d-none d-sm-inline">Items</span>
							</a>
						</li>
						<!-- <li>
							<a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
								<i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Bootstrap</span></a>
							<ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
								<li class="w-100">
									<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
								</li>
								<li>
									<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
								</li>
							</ul>
						</li> -->
					</ul>
					<hr>
					<div class="dropdown pb-4">
						<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
						<!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users rounded" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff4500" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<circle cx="9" cy="7" r="4" />
							<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
							<path d="M16 3.13a4 4 0 0 1 0 7.75" />
							<path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
						</svg> -->
						<img src="<?php echo base_url('assets/img/profile.png');?>" height="30" width="30" alt="">
							<span class="d-none d-sm-inline mx-3">Admin</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-dark text-small shadow">
							<li><a class="dropdown-item" href="#">New project...</a></li>
							<li><a class="dropdown-item" href="#">Settings</a></li>
							<li><a class="dropdown-item" href="#">Profile</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="../IMS">Sign out</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col py-3">
				<div class="container-lg" id="main">

					<section id="homeSection">
						<div class="container-lg">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
									<img src="<?php echo base_url('assets/img/home.png');?>" alt="home-img" class="img-fluid">
								</div>
								<div class="col-md-6">
									<h1 class="spacing-1"><span class="text-danger fs-1 fw-bold">I</span>nventory</h1>
									<h1><span class="text-danger fs-1 fw-bold">M</span>anagement</h1>
									<h1><span class="text-danger fs-1 fw-bold">S</span>ystem</h1>
								</div>
							</div>
						</div>
					</section>

					<section id="dashboardSection" style="display:none;">
						<h1>Dashboard Section</h1>
					</section>

					<section id="inventorySection" style="display:none;">
						<h1>Inventory Section</h1>
					</section>

					<section id="itemSection" style="display:none;">
						<h1>Item Section</h1>
						<div class="container-lg">
							<div class="row">
								<div>
									<button class="btn btn-success btn-sm float-end"> <i class="fas fa-plus mx-1"></i> Add Item</button>
								</div>
							</div>
							<div class="row">
								<div class="col shadow-sm bg-white mt-3">
									<table class="table">
										<thead>
											<tr>
											<th scope="col">Item no.</th>
											<th scope="col">Unit</th>
											<th scope="col">Description</th>
											<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
											<th scope="row">1</th>
											<td>pcs</td>
											<td>asdas asd asd asd asd</td>
											<td><button class="btn btn-primary btn-sm mx-1">Edit</button><button class="btn btn-danger btn-sm">delete</button></td>
											</tr>
											<tr>
											<th scope="row">2</th>
											<td>pcs</td>
											<td>asdas asd asd asd asd</td>
											<td><button class="btn btn-primary btn-sm mx-1">Edit</button><button class="btn btn-danger btn-sm">delete</button></td>
											</tr>
											<tr>
											<th scope="row">3</th>
											<td>pcs</td>
											<td>asdas asd asd asd asd</td>
											<td><button class="btn btn-primary btn-sm mx-1">Edit</button><button class="btn btn-danger btn-sm">delete</button></td>
											</tr>
											<tr>
											<th scope="row">4</th>
											<td>pcs</td>
											<td>asdas asd asd asd asdasdasdasdasd asd asd asd </td>
											<td><button class="btn btn-primary btn-sm mx-1">Edit</button><button class="btn btn-danger btn-sm">delete</button></td>
											</tr>
											<tr>
											<th scope="row">5</th>
											<td>pcs</td>
											<td>asdas asd asd asd asd</td>
											<td><button class="btn btn-primary btn-sm mx-1">Edit</button><button class="btn btn-danger btn-sm">delete</button></td>
											</tr>
											<tr>
											<th scope="row">6</th>
											<td>pcs</td>
											<td>asdas asd asd asd asd</td>
											<td><button class="btn btn-primary btn-sm mx-1">Edit</button><button class="btn btn-danger btn-sm">delete</button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/jquery-3.6.0.min.js"); ?>"></script>
	<script src="<?php echo site_url("assets/js/script.min.js"); ?>"></script>
</body>
</html>