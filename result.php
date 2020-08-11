<?php
    include "header.php";
    include "functions.php";
    $connection = new Connection;

    if ( isset( $_GET['delete'] ) ) {
        $the_id = $_GET['id'];
        $connection->deleteData( "DELETE FROM info WHERE id=$the_id" );
        header( 'Location: result.php' );
    }

    if(isset($_GET['logout'])){
      session_unset();
      session_destroy();
      header("Location: index.php");
    }

?>

<div class="container">
<div class="alert alert-success" id="success-alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Success! </strong> Product added to your wishlist.
</div>
    <h2 class="display-4 mb-3">
        <?php
          if(isset($_SESSION['logged_username'])){
            echo 'Welcome '.$_SESSION['logged_username'];
          }
        ?>
    </h2>

    <a id="cart_count_link" href="cart-page.php" class="btn btn-info mb-3">
    <i class="fas fa-shopping-cart"></i> <span class="badge badge-light" id="cart_count">
      <?php
          if ( isset( $_GET['resetcart'] ) ) {
              $_SESSION['products'] = array();
              $products_count       = count( $_SESSION['products'] );
              echo $products_count;
              header( "Location: result.php" );
          } else {
              $products_array = $_SESSION['products'];
              $products_count = count( $products_array );
              echo $products_count;
          }
      ?>
    </span>
    </a>


    <div class="row">
        <input class="form-control mr-sm-2 mb-3" type="search" placeholder="Search for something" aria-label="Search" id="myInput" onkeyup="myFunction()">

    <table class="table table-hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Add to menu</th>
      <?php
      if("admin" == $_SESSION['logged_username']){
        ?>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        <?php
      }
      ?>
    </tr>
  </thead>
  <tbody>

  <?php
      $result = $connection->getAll( 'SELECT * FROM info' );
      foreach ( $result as $res ) {
          $id          = $res['id'];
          $productName = $res['productName'];
          $unitPrice   = $res['unitPrice'];
          $Stock       = $res['Stock'];
      ?>
        <tr>
          <th scope="row"><?php echo $id; ?></th>
          <td><?php echo $productName; ?></td>
          <td><?php echo $unitPrice; ?></td>
          <td><?php echo $Stock; ?></td>
          <td><a id="<?php echo $id ?>" onclick="addToCart(<?php echo $id ?>,this)" href="javascript:;" class="btn <?php if ( in_array( $id, $products_array, true ) ) {echo 'btn-secondary';} else {echo 'btn-warning';}?> addAllert">
        <?php
            $products_array = $_SESSION['products'];
                if ( in_array( $id, $products_array, true ) ) {
                    echo "Added";
                    //header("Location: result.php");
                } else {
                    echo "Add";
                }
            ?>
        </a></td>
        <?php
        if("admin" == $_SESSION['logged_username']){
          ?>
          <td><a href="update.php?update&id=<?php echo $id; ?>" class="btn btn-info">Update</a></td>
          <td><a href="result.php?delete&id=<?php echo $id; ?>" class="btn btn-warning">Delete</a></td>
          <?php
        }
        ?>
        </tr>

        <?php
            }
        ?>




  </tbody>
</table>
    </div>
    <a href="insert-records.php" class="btn btn-primary">Add More</a>

    <a href="result.php?resetcart=0" class="btn btn-primary">Reset Cart</a>
    <a href="result.php?logout=1" class="btn btn-primary">log Out</a>
</div>

<p class="d-none" id="current_session"><?php echo json_encode( $_SESSION['products'] ); ?></p>

<?php include "footer.php";?>