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


<h2 class="display-4 mb-3">
    Cart Page
</h2>
<table class="table table-hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Home Town</th>
      <th scope="col">Job</th>
      <th scope="col">Delete</th>
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
            $firstName = $res['firstName'];
            $lastName = $res['lastName'];
            $age = $res['age'];
            $homeTown = $res['homeTown'];
            $job = $res['job'];
        ?>
            <tr>
          <th scope="row"><?php echo $id; ?></th>
          <td><?php echo $firstName; ?></td>
          <td><?php echo $lastName; ?></td>
          <td><?php echo $age; ?></td>
          <td><?php echo $homeTown; ?></td>
          <td><?php echo $job; ?></td>

          <td><a href="cart-page.php?remove&id=<?php echo $id; ?>" class="btn btn-warning"><i class="far fa-times-circle"></i></a></td>
        </tr>
            <?php
                }
              }
              ?>

<div id="cartpage"></div>

<br>
<a href="result.php" class="btn btn-info">All records</a>
</div>
<?php include "footer.php"?>