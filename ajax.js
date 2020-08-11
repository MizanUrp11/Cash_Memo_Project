function showUser(str) {
  if (str.length >= 1) {
    $.ajax({
      type: "GET",
      url: "returnUser.php?q=" + str,
      data: "data",
      // dataType: "dataType",
      success: function (response) {
        //console.log(response);
        $("#txtHint").html(response);
      },
    });
  }
}

var current_array = $("#current_session").text();

var products_array = [];

var res;
function addToCart(str, ele) {
  if (current_array.includes(str)) {
    alert("Already added to Cart");
    return;
  } else {
    products_array.push(str);
    //$('str').text('Remove');
    //console.log(products_array);
  }
  $(document).ready(function () {
    $("#cart_count").text(products_array.length);

    $.ajax({
      type: "GET",
      url: "cart.php?products=" + products_array + "&id=" + str,
      data: "data",
      success: function (response) {
        //console.log(response);
        //console.log(ele.id);
        var id = ele.id;
        $("#" + id).attr("class", "btn btn-secondary");
        $("#" + id).text("Added");
      },
    });
  });
}

$(document).ready(function () {
  $("#success-alert").hide();
  $(".addAllert").click(function showAlert() {
    $("#success-alert")
      .fadeTo(2000, 500)
      .slideUp(500, function () {
        $("#success-alert").slideUp(500);
      });
  });
});

// $(document).ready(function () {
//     $('#amount').keyup(function () {
//         var value = $('#amount').val();
//         $('#price').text(value);
//         var valueParent = $('#amount').parent()
//         console.log(valueParent);
//     });
// });

function calculate(ele) {
  var id = ele.id;
  var amount = ele.value;
  var unitPrice = $("#up" + id).text();
  //console.log(amount);
  var calculated_price = unitPrice * amount;
  $("#pr" + id).text(calculated_price);
}

function calculate_price() {
  var prices = $(".price")
    .map(function () {
      return $(this).text();
    })
    .get();
  var total_price = 0;
  for (i = 0; i < prices.length; i++) {
    var typeofa = typeof prices[i];
    var parseNumber = parseFloat(prices[i]);
    //console.log(typeof parseNumber);
    total_price += parseNumber;
  }
  $("#total_price").text(total_price + " Taka Only");
}


$("#printIt").on("click", function () {
    $('.hide').hide();
  window.print();
});


function myFunction() {
  var input, filter, table, tr, td, i, textValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  table = document.getElementById('myTable');
  tr = document.getElementsByTagName('tr');
  
  
  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[0];
      // console.log(td);
      if (td) {
          textValue = td.textContent || td.innerText;
          if (textValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
}
