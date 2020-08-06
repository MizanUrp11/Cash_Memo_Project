<?php include "header.php"?>
<?php
    include "functions.php";
    $connection = new Connection;

    $products_from_session = $_SESSION['products'];
    
    
    if ( isset( $_GET['remove'] ) ) {
      $to_remove = $_GET['id'];
      $products = $_SESSION['products'];
      $products_array = $products_from_session;
      $search_result = array_search($to_remove,$products_array,true);
      unset($products_array[$search_result]);
      print_r($products_array);
      $_SESSION['products'] = $products_array;
      header("Location:cart-page.php");
    }
    
    ?>
<div class="container">


<h2 class="font-weight-bold mb-3">
    Cash Memo
</h2>
<table class="table table-hover" id="myTable">
  <thead>
    <tr>
      <th class="hide" scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Amount</th>
      <th scope="col">Price</th>
      <th class="hide" scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>



<?php
    //$products = $_SESSION['products'];
    // $products_from_session = $products_from_session;
    foreach ( $products_from_session as $pe ) {
        $result = $connection->getAll( "SELECT * FROM info WHERE id=$pe" );
        foreach ( $result as $res ) {
            $id = $res['id'];
            $productName = $res['productName'];
            $unitPrice = $res['unitPrice'];
        ?>
            <tr>
          <th class="hide" scope="row"><?php echo $id; ?></th>
          <td id="pn<?php echo $id; ?>"><?php echo $productName; ?></td>
          <td id="up<?php echo $id; ?>"><?php echo $unitPrice; ?></td>
          <td>
            <input onkeyup="calculate(this);" type="number" class="form-control border border-0" id="<?php echo $id; ?>" placeholder="Amount">
        </td>
        <td>
          <p class="price" id="pr<?php echo $id; ?>">0</p>
        </td>

          <td class="hide"><a href="cart-page.php?remove&id=<?php echo $id; ?>" class="btn btn-warning"><i class="far fa-times-circle"></i></a></td>
        </tr>
            <?php
                }
              }
              ?>
  </tbody>

  <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td class="hide"></td>
      <td class="font-weight-bold">Total</td>
      <td id="total_price" class="font-weight-bold">0</td>
    </tr>
  </tfoot>

<div id="cartpage"></div>

<br>
<div class="mb-3">
  <a href="result.php" class="btn btn-info hide">Go Back</a>
  <a onclick="calculate_price();" href="#" class="btn btn-danger ml-2 hide">Calculate</a>
  <a id="printIt" href="#" class="btn btn-warning ml-2 hide">Print</a>
</div>
</div>

<?php include "footer.php"?>