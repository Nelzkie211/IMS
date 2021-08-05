const home = document.querySelector('#home');
const dashboard = document.querySelector('#dashboard');
const inventory = document.querySelector('#inventory');
const itemList = document.querySelector('#itemList');

home.addEventListener('click', () => {
  $('#home').removeClass('text-white')
  $('#itemList').removeClass('text-danger')
  $('#inventory').removeClass('text-danger')
  $('#inventory').addClass('text-white')
  $('#itemList').addClass('text-white')
  $('#dashboard').removeClass('text-danger')
  $('#dashboard').addClass('text-white')
  $('#home').addClass('text-danger')
  $('#homeSection').show()
  $('#dashboardSection').hide()
  $('#inventorySection').hide()
  $('#itemSection').hide()
  // $('#main section').remove()
  // if($('#homeSection').length <= 0 ){
  //   $('#main').append(`<section id="homeSection">
  //   <div class="container-lg border-1">
  //     <div class="row d-flex align-items-center">
  //       <div class="col-md-6">
  //         <img src="<?php echo base_url('assets/img/home.png');?>" alt="home-img" class="img-fluid">
  //       </div>
  //       <div class="col-md-6">
  //         <h1 class="spacing-1"><span class="text-danger fs-1 fw-bold">I</span>nventory</h1>
  //         <h1><span class="text-danger fs-1 fw-bold">M</span>anagement</h1>
  //         <h1><span class="text-danger fs-1 fw-bold">S</span>ystem</h1>
  //       </div>
  //     </div>
  //   </div>
  // </section>`)
  // }
})
dashboard.addEventListener('click', () => {
  $('#dashboard').removeClass('text-white')
  $('#itemList').removeClass('text-danger')
  $('#home').removeClass('text-danger')
  $('#home').addClass('text-white')
  $('#inventory').removeClass('text-danger')
  $('#itemList').addClass('text-white')
  $('#inventory').addClass('text-white')
  $('#dashboard').addClass('text-danger')
  $('#homeSection').hide()
  $('#dashboardSection').show()
  $('#inventorySection').hide()
  $('#itemSection').hide()
  // $('#main section').remove()
  // if($('#dashboardSection').length <= 0 ){
  //   $('#main').append(`<section id="dashboardSection">
  //     <h1>Dashboard</h1>
  //   </section>`)
  // }
})
inventory.addEventListener('click', () => {
  $('#inventory').removeClass('text-white')
  $('#itemList').removeClass('text-danger')
  $('#home').removeClass('text-danger')
  $('#itemList').addClass('text-white')
  $('#home').addClass('text-white')
  $('#dashboard').removeClass('text-danger')
  $('#dashboard').addClass('text-white')
  $('#inventory').addClass('text-danger')
  $('#homeSection').hide()
  $('#dashboardSection').hide()
  $('#inventorySection').show()
  $('#itemSection').hide()

  // $('#main section').remove()
  // if($('#inventorySection').length <= 0 ){
  //   $('#main').append(`<section id="inventorySection">
  //     <h1>inventory</h1>
  //   </section>`)
  // }
})

itemList.addEventListener('click', () => {
	$('#itemList').removeClass('text-white')
  $('#home').removeClass('text-danger')
  $('#dashboard').removeClass('text-danger')
  $('#inventory').removeClass('text-danger')
  $('#home').addClass('text-white')
  $('#inventory').addClass('text-white')
  $('#dashboard').addClass('text-white')
  $('#itemList').addClass('text-danger')
  $('#homeSection').hide()
  $('#dashboardSection').hide()
  $('#inventorySection').hide()
  $('#itemSection').show()

  // $('#main section').remove()
  // if($('#itemSection').length <= 0 ){
  //   $('#main').append(`<section id="itemSection">
  //     <h1>Items</h1>
  //   </section>`)
  // }
});

