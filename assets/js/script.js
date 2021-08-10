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

  if(window.localStorage.getItem('nav') === 'itemList'){
    itemTable()
  }else{
    $('#itemTable').DataTable().clear().destroy()
  }

}

addItem.addEventListener('click', () => {
  var itemClass1 = document.querySelector(".itemClass1")
  var itemClass2 = document.querySelector(".itemClass2")
  if (itemClass1.style.display == "none") {
    itemClass1.style.display = ""
    itemClass2.style.display = ""
    document.getElementById("desc").focus()
  } else {
    itemClass1.style.display = "none"
    itemClass2.style.display = "none"
    document.getElementById("desc").blur()
    document.getElementById("units").blur()
    document.getElementById("desc").value = ""
    document.getElementById("units").value = ""

  }

})

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

                  }

                })
              }
            break
      }
  })
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
      bLengthChange: false,
      responsive: true,
      columnDefs: [
        { orderable: false, targets: -1 }
      ],

  });
}