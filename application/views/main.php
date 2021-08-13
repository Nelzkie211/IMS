<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/imsIcon.ico');?>"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/dt/datatables.min.css"); ?>">
	<title>IMS</title>

</head>
<body class="bg-light">
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
					<a class="d-flex align-items-center py-2 ps-2 mb-md-0 me-md-auto text-decoration-none">
						<span class="fs-3 d-none text-danger d-sm-inline">IMS</span>
					</a>
					<!-- <hr class="bg-white border-0 w-100"> -->
					<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
						<li class="nav-item mb-3 mt-3">
							<a class="nav-link align-middle px-0 text-white " id="home">
								<i class="fas fa-home"></i> <span class="ms-2 d-none d-sm-inline">Home</span>
							</a>
						</li>
						<li class="nav-item mb-3">
							<a class="nav-link align-middle px-0 text-white " id="dashboard">
								<i class="fas fa-chart-pie"></i> <span class="ms-2 d-none d-sm-inline">Dashboard</span>
							</a>
						</li>
						<li class="nav-item mb-3">
							<a class="nav-link px-0 align-middle text-white " id="inventory">
								<i class="fas fa-list"></i> <span class="ms-2 d-none d-sm-inline">Inventory</span>
							</a>
						</li>
						<li class="nav-item mb-3">
							<a class="nav-link px-0 align-middle text-white " id="itemList">
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
							<span class="d-none d-sm-inline mx-3"><?php echo $this->session->userdata('u_name'); ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-dark text-small shadow">
							<li><a class="dropdown-item" href="#">New project...</a></li>
							<li><a class="dropdown-item" href="#">Settings</a></li>
							<li><a class="dropdown-item" href="#">Profile</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="LoginControllers/logout">Sign out</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col py-3">
				<div class="container-lg" id="main">

					<section id="homeSection" style="display:none;">
						<div class="container-lg">
							<div class="row d-flex align-items-center">
								<div class="col-md-6">
									<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
										<div class="carousel-inner">
											<div class="carousel-item active">
											<img src="<?php echo base_url('assets/img/home.png');?>" class="d-block w-100 img-fluid" alt="...">
											</div>
											<div class="carousel-item">
											<img src="<?php echo base_url('assets/img/home1.png');?>" class="d-block w-100 img-fluid" alt="...">
											</div>
											<div class="carousel-item">
											<img src="<?php echo base_url('assets/img/home2.png');?>" class="d-block w-100 img-fluid" alt="...">
											</div>
										</div>
									</div>
									<!-- <img src="<?php echo base_url('assets/img/home.png');?>" alt="home-img" class="img-fluid"> -->
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
						<h1 class="fs-2 fw-normal text-muted">Dashboards</h1>
					</section>

					<section id="inventorySection" style="display:none;">

						<div class="container-lg">
							<div class="row p-0 m-0">
								<div class="col-md-7 p-0">
									<!-- <div class="input-group input-group-sm itemClass1">
										<span class="input-group-text" id="description">Description :</span>
										<input type="hidden" readonly id="itemId">
										<input type="text" class="form-control" id="desc" maxlength="65" aria-label="desc" aria-describedby="description">
									</div> -->
									<h1 class="fs-2 fw-normal text-muted">Inventory </h1>
								</div>
								<div class="col-md-3 p-0 m-0 px-2">
									<a href="spreadSheetFormatIn" target="_blank" class="btn btn-outline-danger btn-sm ">IN</a>
									<a href="spreadSheetFormatOut" target="_blank" class="btn btn-outline-danger btn-sm ">OUT</a>
									<a href="spreadSheetFormatAll" target="_blank" class="btn btn-outline-danger btn-sm ">ALL</a>
									<!-- <div class="input-group input-group-sm itemClass2">
										<span class="input-group-text" id="unit">Unit :</span>
										<input type="text" class="form-control" id="units" maxlength="10" aria-label="units" aria-describedby="unit">
										<button class="btn btn-success bg-gradient btn-sm" id="insertItem">Insert</button>
									</div> -->
								</div>
								<div class="col-md-2 p-0 m-0">
									<button class="btn btn-outline-success btn-sm float-end bg-gradient" id="addNew"><i class="fas fa-plus"></i> Add new</button>
								</div>
							</div>
							<div class="row">
								<div class="shadow-sm bg-white mt-1 pt-2 pb-2 border-0">
									<!-- <div>
										<div class="input-group input-group-sm" id="autocomplete-container">
											<span class="input-group-text" id="description">Description :</span>
											<input type="text" class="form-control" id="transDesc" maxlength="65" aria-label="desc" aria-describedby="description">
										</div>
									</div> -->
									<table class="table table-hover table-striped w-100 table-sm" id="transactTable">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Qty</th>
												<th scope="col">Bal</th>
												<th scope="col">Type</th>
												<th scope="col">Unit</th>
												<th scope="col">Description</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>

					<section id="itemSection" style="display:none;">
						<!-- <h1 class="fs-2 fw-normal text-muted">Item </h1> -->
						<div class="container-lg">
							<div class="row p-0 m-0">
								<div class="col-md-7 p-0">
									<div class="input-group input-group-sm itemClass1">
										<span class="input-group-text" id="description">Description :</span>
										<input type="hidden" readonly id="itemId">
										<input type="text" class="form-control" id="desc" maxlength="65" aria-label="desc" aria-describedby="description">
									</div>
								</div>
								<div class="col-md-3 p-0 m-0 px-2">
									<div class="input-group input-group-sm itemClass2">
										<span class="input-group-text" id="unit">Unit :</span>
										<input type="text" class="form-control" id="units" maxlength="10" aria-label="units" aria-describedby="unit">
										<button class="btn btn-success bg-gradient btn-sm" id="insertItem">Insert</button>
									</div>
								</div>
								<div class="col-md-2 p-0 m-0">
									<button class="btn btn-outline-success btn-sm float-end bg-gradient disabled text-light border-0" id="addItem"> <i class="fas fa-plus mx-1"></i> Add Item</button>
								</div>
							</div>
							<div class="row">
								<div class=" shadow-sm bg-white mt-1 pt-2 pb-2 border-0">
									<!-- <div class="table-responsive"> -->
									<table class="table table-hover table-striped w-100 table-sm" id="itemTable">
										<thead>
											<tr>
												<th scope="col">Item no.</th>
												<th scope="col">Unit</th>
												<th scope="col">Description</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>
											<!-- <tr>
											<th scope="row">1</th>
											<td>pcs</td>
											<td>asdas asd asd asd asd</td>
											<td><button class="btn btn-primary btn-sm mx-1"><i class="fas fa-pen"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
											</tr>
											-->
										</tbody>
									</table>
									<!-- </div> -->
								</div>
							</div>
						</div>
					</section>


					<div class="modal fade" id="modalInvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalInventLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalInventLabel"></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form>
									<div class="mb-3">
										<label class="form-label">Description *</label>
										<input type="text" class="form-control form-control-sm" maxlength="65" id="iDesc" name="iDesc" placeholder="Description" />
									</div>
									<div class="mb-3">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">Unit *</label>
												<input type="text" class="form-control form-control-sm" maxlength="10" id="iUnit" name="iUnit" placeholder="Unit" />
											</div>
											<div class="col-md-4" id="curBal">
												<label class="form-label">Current Balance *</label>
												<input type="text" class="form-control form-control-sm" readonly maxlength="11" id="iBalance" name="iBalance" placeholder="Current Balance" />
											</div>
											<div class="col-md-4">
												<label class="form-label">Quantity *</label>
												<input type="number" class="form-control form-control-sm" min="0" maxlength="11" id="iQuantity" name="iQuantity" value="" placeholder="Quantity" />
											</div>
											<input type="hidden" id="forStatus">
											<input type="hidden" id="ide">
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="iSubmit">Submit</button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
							</div>
							</div>
						</div>
					</div>


					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-body">
									<i class="fas fa-check-circle text-success bg-gradient"></i> <span class="text-success" id="alertSpan"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url("assets/js/jquery-3.6.0.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/dt/datatables.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/script.min.js"); ?>"></script>
</body>
</html>