const home = document.querySelector('#home');
const dashboard = document.querySelector('#dashboard');
const inventory = document.querySelector('#inventory');
const itemList = document.querySelector('#itemList');

document.addEventListener("DOMContentLoaded", () => {
  toDo()
});

home.addEventListener('click', () => {
  window.localStorage.clear();
  window.localStorage.setItem('nav', 'home');
  window.localStorage.setItem('sect', 'homeSection');
  toDo();

})
dashboard.addEventListener('click', () => {
  window.localStorage.clear();
  window.localStorage.setItem('nav', 'dashboard');
  window.localStorage.setItem('sect', 'dashboardSection');
  toDo();

})
inventory.addEventListener('click', () => {
  window.localStorage.clear();
  window.localStorage.setItem('nav', 'inventory');
  window.localStorage.setItem('sect', 'inventorySection');
  toDo();
})

itemList.addEventListener('click', () => {
  window.localStorage.clear();
  window.localStorage.setItem('nav', 'itemList');
  window.localStorage.setItem('sect', 'itemSection');
  toDo();

})


function toDo() {
  var Opt = window.localStorage.getItem('nav')
  var Sect = window.localStorage.getItem('sect')

  if (Opt == null){
    $('#homeSection').show()
    $('#home').removeClass('text-white')
    $('#home').addClass('text-danger')
  }else{
    $('section').hide()
    $('#'+ Sect).show()

    $('a.nav-link').removeClass('text-danger')
    $('a.nav-link').addClass('text-white')
    $('#'+ Opt).removeClass('text-white')
    $('#'+ Opt).addClass('text-danger')

  }

}

