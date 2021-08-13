const home = document.querySelector('#home')
const dashboard = document.querySelector('#dashboard')
const inventory = document.querySelector('#inventory')
const itemList = document.querySelector('#itemList')
const addItem = document.querySelector('#addItem')

document.addEventListener("DOMContentLoaded", () => {
  var itemClass1 = document.querySelector(".itemClass1")
  var itemClass2 = document.querySelector(".itemClass2")

    itemClass1.style.display = "none"
    itemClass2.style.display = "none"
  keyFunc()
  toDo()
})

home.addEventListener('click', () => {
  window.localStorage.clear()
  window.localStorage.setItem('nav', 'home')
  window.localStorage.setItem('sect', 'homeSection')
  toDo()

})
dashboard.addEventListener('click', () => {
  window.localStorage.clear()
  window.localStorage.setItem('nav', 'dashboard')
  window.localStorage.setItem('sect', 'dashboardSection')
  toDo()

})
inventory.addEventListener('click', () => {
  window.localStorage.clear()
  window.localStorage.setItem('nav', 'inventory')
  window.localStorage.setItem('sect', 'inventorySection')
  toDo()
})

itemList.addEventListener('click', () => {
  window.localStorage.clear()
  window.localStorage.setItem('nav', 'itemList')
  window.localStorage.setItem('sect', 'itemSection')
  toDo()
  itemTable()


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
  var itemClass1 = document.querySelector(".itemClass1")
  var itemClass2 = document.querySelector(".itemClass2")
  if(window.localStorage.getItem('nav') === 'itemList'){
    $('#transactTable').DataTable().clear().destroy()
    itemTable()
  }else if(window.localStorage.getItem('nav') === 'inventory'){
    $('#itemTable').DataTable().clear().destroy()
    transactTable()
    itemClass1.style.display = "none"
    itemClass2.style.display = "none"
  }else{
    itemClass1.style.display = "none"
    itemClass2.style.display = "none"
  }

}
//------------------------------item------------------------------------------

// addItem.addEventListener('click', () => {
//   var itemClass1 = document.querySelector(".itemClass1")
//   var itemClass2 = document.querySelector(".itemClass2")
//   if (itemClass1.style.display == "none") {
//     itemClass1.style.display = ""
//     itemClass2.style.display = ""
//     document.getElementById("desc").focus()
//   } else {
//     itemClass1.style.display = "none"
//     itemClass2.style.display = "none"
//     document.getElementById("desc").blur()
//     document.getElementById("units").blur()
//     document.getElementById("desc").value = ""
//     document.getElementById("units").value = ""

//   }

// })

function keyFunc(){
  var desc = document.getElementById("desc")
  var units = document.getElementById("units")
  var itemId = document.getElementById("itemId")
  var insertItem = document.getElementById("insertItem")
  document.addEventListener('keydown', function(e) {
      switch (e.keyCode) {
          case 37:
              // ('left');
              if(units === document.activeElement){
                document.getElementById("desc").focus()
                document.getElementById("units").blur()
              }
              else if(insertItem === document.activeElement){
                document.getElementById("insertItem").blur()
                document.getElementById("units").focus()
              }
            break
          case 39:
              // ('right');
              if(desc === document.activeElement){
                document.getElementById("desc").blur()
                document.getElementById("units").focus()
              }
              else if(units === document.activeElement){
                document.getElementById("unit").blur()
                document.getElementById("insertItem").focus()
              }
            break
          case 13:
              // ('enter');
              if(insertItem === document.activeElement || units === document.activeElement){
                doAddItem()
              }
            break
      }
  })
  insertItem.addEventListener('click',()=>{
    doAddItem()
  })
  function doAddItem(){
    $.ajax({
      type:'post',
      url:'addItem',
      dataType:'json',
      data:{desc:desc.value,units:units.value,itemId:itemId.value},
      success:(res) =>{
        document.getElementById("itemId").value = ""
        document.getElementById("desc").value = ""
        document.getElementById("units").value = ""
        // document.getElementById("desc").focus()
        $('#exampleModal').modal('show')
        document.getElementById("alertSpan").innerHTML = "Success..."

        setTimeout(function() {
          $('#exampleModal').modal('hide')
          document.getElementById("desc").focus()
        }, 1000)
        itemTable()

      },
      error:(res) =>{
        alert('error')
      }

    })
  }
}

$('#itemTable').on('click','.itemEditClass',function(){

  var itemClass1 = document.querySelector(".itemClass1")
  var itemClass2 = document.querySelector(".itemClass2")
  itemClass1.style.display = ""
  itemClass2.style.display = ""
  document.getElementById("desc").focus()

  document.getElementById("itemId").value = $(this).data('id')
  document.getElementById("desc").value = $(this).data('desc')
  document.getElementById("units").value = $(this).data('unit')

})

$('#itemTable').on('click','.itemDeleteClass',function(){

  document.getElementById("itemId").value = ""
  document.getElementById("desc").value = ""
  document.getElementById("units").value = ""

  var itemClass1 = document.querySelector(".itemClass1")
  var itemClass2 = document.querySelector(".itemClass2")
  itemClass1.style.display = "none"
  itemClass2.style.display = "none"
  document.getElementById("desc").blur()
  document.getElementById("units").blur()

  if (confirm('Are you sure you want to delete? _'+$(this).data("id"))) {
    // Save it!
    $.ajax({
      type:'post',
      url:'delItem',
      dataType:'json',
      data:{itemId:$(this).data("id")},
      success:(res) =>{
        $('#exampleModal').modal('show');
        document.getElementById("alertSpan").innerHTML = "Successfully deleted..."

        setTimeout(function() {
          $('#exampleModal').modal('hide');
        }, 1000);
        itemTable()
      },
      error:(res) =>{

      }

    })

  }
})


function itemTable(){
  $('#itemTable').DataTable().clear().destroy()
  $('#itemTable').DataTable({
      processing: true,
      serverSide: true,
      pagingType: "first_last_numbers",
      ajax: {
        url:'getItem',
        type: 'post',
        dataType: 'json'
      },
      order: [[ 0, "desc" ]],
      bLengthChange: false,
      responsive: true,
      columnDefs: [
        { orderable: false, targets: -1 }
      ],

  });
}

//------------------------------item------------------------------------------


//------------------------------transact--------------------------------------

function transactTable(){
  $('#transactTable').DataTable().clear().destroy()
  $('#transactTable').DataTable({
      processing: true,
      serverSide: true,
      pagingType: "first_last_numbers",
      ajax: {
        url:'getTransactItem',
        type: 'post',
        dataType: 'json'
      },
      order: [[ 0, "desc" ]],
      bLengthChange: false,
      responsive: true,
      columnDefs: [
        {
            targets: 1,
            className: 'dt-body-right'
        },
        { orderable: false, targets: -1 },
      ],

  });
}



var addNew = document.getElementById("addNew")
var iDesc = document.getElementById("iDesc")
var iUnit = document.getElementById("iUnit")
var iBalance = document.getElementById("iBalance")
var ide = document.getElementById("ide")

$('#transactTable').on('click','.itemDepoClass',function(){

  $('#curBal').show();

  if($(this).data('ident') !== 'y'){
    // alert('Oops! This item is zero balance.')
  }else{
    $('#modalInvent').modal('show')
    document.getElementById("modalInventLabel").innerHTML = 'Deposit'
    document.getElementById("forStatus").value = 'Deposit'
    iDesc.value = $(this).data('desc')
    iUnit.value = $(this).data('unit')
    iBalance.value = $(this).data('bal')
    ide.value = $(this).data('id')
  }


})

$('#transactTable').on('click','.itemWithdrawClass',function(){

  $('#curBal').show();

  if($(this).data('bal') < 1 ){
    alert('Oops! This item is zero balance.')
  }
  else if($(this).data('ident') !== 'y'){
    // alert('Oops! This item is zero balance.')
  }
  else{
    $('#modalInvent').modal('show')
    document.getElementById("modalInventLabel").innerHTML = 'Withdrawal'
    document.getElementById("forStatus").value = 'Withdrawal'
    iDesc.value = $(this).data('desc')
    iUnit.value = $(this).data('unit')
    iBalance.value = $(this).data('bal')
    ide.value = $(this).data('id')

      // var input = document.getElementById("iQuantity");
      // input.setAttribute("max",iBalance.value);


  }

})

addNew.addEventListener('click',()=>{

  $('#curBal').hide();

  $('#modalInvent').modal('show')

  document.getElementById("modalInventLabel").innerHTML ='New'
  document.getElementById("forStatus").value = 'New'
})

var iSubmit = document.getElementById('iSubmit')
var forStatus = document.getElementById('forStatus')

iSubmit.addEventListener('click', () =>{

  if (forStatus.value === "New"){

    if(iDesc.value === "" || iUnit.value === ""){
      alert('Please fill the fields...')
    }else{
      $.ajax({
        type:'post',
        url:'iNew',
        dataType:'json',
        data:{desc:iDesc.value,qty:iQuantity.value,unit:iUnit.value},
        success:(res) =>{
          $('#modalInvent').modal('hide')
          $('#exampleModal').modal('show')
          document.getElementById("alertSpan").innerHTML = "Success..."

          setTimeout(function() {
            $('#exampleModal').modal('hide')
          }, 1000);
          transactTable()
        },
        error:(res) =>{
          alert('error')
        }
      })
    }


  }
  else if (forStatus.value === "Deposit"){

    if(iQuantity.value === "" || iQuantity.value === 0){
      alert('Please input Quantity')
    }else{
      var latestBal = Number(iBalance.value) + Number(iQuantity.value);
      $.ajax({
        type:'post',
        url:'iDeposit',
        dataType:'json',
        data:{itemId:ide.value,qty:iQuantity.value,latestBal:latestBal},
        success:(res) =>{
          $('#modalInvent').modal('hide')
          $('#exampleModal').modal('show')
          document.getElementById("alertSpan").innerHTML = "Success..."

          setTimeout(function() {
            $('#exampleModal').modal('hide')
          }, 1000);
          transactTable()
        },
        error:(res) =>{
          alert('error')
        }
      })

    }

  }
  else if (forStatus.value === "Withdrawal"){

    if(iQuantity.value === "" || iQuantity.value === 0){
      alert('Please input Quantity')
    }else{
      var latestBal = Number(iBalance.value) - Number(iQuantity.value);
      $.ajax({
        type:'post',
        url:'iWithdraw',
        dataType:'json',
        data:{itemId:ide.value,qty:iQuantity.value,latestBal:latestBal},
        success:(res) =>{
          $('#modalInvent').modal('hide')
          $('#exampleModal').modal('show')
          document.getElementById("alertSpan").innerHTML = "Success..."

          setTimeout(function() {
            $('#exampleModal').modal('hide')
          }, 1000);
          transactTable()
        },
        error:(res) =>{
          alert('error')
        }
      })
    }


  }

})


var iQuantity = document.getElementById('iQuantity');

// Listen for input event on numInput.
iQuantity.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58)
      || e.keyCode == 8)) {
        return false;
    }
}


var modalInvent = document.getElementById('modalInvent')
modalInvent.addEventListener('hidden.bs.modal', () => {
  iDesc.value = ''
  iUnit.value = ''
  iBalance.value = ''
  ide.value = ''
  iQuantity.value = ''

})

modalInvent.addEventListener('shown.bs.modal', () => {
  iQuantity.focus()
  var forStatus = $('#forStatus').val()

  if(forStatus === 'Withdrawal'){
    $("#iQuantity").prop('max',Number(iBalance.value))

    setTimeout(function(){
      iQuantity.onkeyup = function(e) {
        if(Number(iQuantity.value) > Number(iBalance.value)) {
          iQuantity.value = ''
        }
      }
    },500)
  }else{
    $("#iQuantity").prop('max','')
    setTimeout(function(){
      iQuantity.onkeyup = function(e) {

      }
    },500)
  }

})


//------------------------------transact--------------------------------------

