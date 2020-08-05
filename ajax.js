function showUser(str) {
    if (str.length >= 1) {
        $.ajax({
            type: "GET",
            url: "returnUser.php?q=" + str,
            data: "data",
            // dataType: "dataType",
            success: function (response) {
                //console.log(response);
                $('#txtHint').html(response);
            }
        });
    }

}

var current_array = $('#current_session').text();
console.log(current_array);

var products_array = [];

var res;
function addToCart(str,ele) {
    if (current_array.includes(str)) {
        alert('Already added to Cart');
        return;

    } else {
        products_array.push(str);
        //$('str').text('Remove');
        //console.log(products_array);
    }
    $(document).ready(function () {
        $('#cart_count').text(products_array.length);

        $.ajax({
            type: "GET",
            url: "cart.php?products=" + products_array+"&id="+str,
            data: "data",
            success: function (response) {
                //console.log(response);
                //console.log(ele.id);
                var id = ele.id;
                $('#'+id).attr('class', 'btn btn-secondary');
                $('#'+id).text('Added');
            }
        });
    });
}

$(document).ready(function () {
    $("#success-alert").hide();
    $(".addAllert").click(function showAlert() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
            $("#success-alert").slideUp(500);
        });
    });
});

