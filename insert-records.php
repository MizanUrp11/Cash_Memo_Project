<?php
    include "functions.php";

    $connection = new Connection;

    if ( isset( $_POST['submit'] ) ) {
        $productName = $_POST['productName'];
        $unitPrice = $_POST['unitPrice'];
        $Stock = $_POST['Stock'];
        $connection->insertData( $productName, $unitPrice, $Stock );
        //echo 'inserted';
    }

?>



<?php include "header.php"; ?>

  <div class="container">
      
      <form class="needs-validation" action="" method="POST" validate>
    
                <h2 class="display-4">
                    Ajax Form
                </h2>
    
    
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" name="productName" id="productName" value="" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
                <div class="col-md-5 mb-3">
                <label for="unitPrice">Unit Price</label>
                <input type="number" class="form-control" id="unitPrice" name="unitPrice" value="" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
            </div>


            <div class="form-row">


                <div class="col-md-3 mb-3">
                <label for="Stock">Stock</label>
                <input type="number" class="form-control" id="Stock" name="Stock" required>
                <div class="invalid-tooltip">
                    Please provide a valid Stock.
                </div>
                </div>



            </div>

            <button class="btn btn-primary" name="submit" type="submit">Submit</button>

        </form>
        <br>
        <a href="result.php" class="btn btn-primary">View Data</a>


  </div>





<?php include "footer.php"; ?>