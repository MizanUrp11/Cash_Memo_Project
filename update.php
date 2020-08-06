<?php
    include "functions.php";

    $connection = new Connection;

    if ( isset( $_GET['update'] ) ) {
        $the_id = $_GET['id'];
        $result = $connection->getAll( "SELECT * FROM info WHERE id=$the_id" );
        // print_r($data);

        foreach ( $result as $res ) {
            $id = $res['id'];
            $productName = $res['productName'];
            $unitPrice = $res['unitPrice'];
            $Stock = $res['Stock'];
        }
    }

    if ( isset( $_POST['update'] ) ) {
        $productName = $_POST['productName'];
        $unitPrice = $_POST['unitPrice'];
        $Stock = $_POST['Stock'];
        $array = array(
            'productName' => $productName,
            'unitPrice'  => $unitPrice,
            'Stock'       => $Stock,
        );
        $connection->updateData( "UPDATE info SET productName=:productName, unitPrice=:unitPrice, Stock=:Stock WHERE id=$the_id", $array );
        header('Location: result.php');
    }

?>


<?php include "header.php";?>

  <div class="container">

      <form class="needs-validation" action="" method="POST" validate>

                <h2 class="display-4">
                    Update Form
                </h2>



            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" name="productName" id="productName" value="<?php echo $productName ?>" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
                <div class="col-md-5 mb-3">
                <label for="unitPrice">Unit Price</label>
                <input type="text" class="form-control" id="unitPrice" name="unitPrice" value="<?php echo $unitPrice ?>" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
            </div>


            <div class="form-row">


                <div class="col-md-3 mb-3">
                <label for="Stock">Stock</label>
                <input type="number" class="form-control" id="Stock" name="Stock" value="<?php echo $Stock ?>" required>
                <div class="invalid-tooltip">
                    Please provide a valid Stock.
                </div>
                </div>


            </div>

            <button class="btn btn-info" name="update" type="submit">update</button>

        </form>
        <br>
        <a href="result.php" target="_blank" class="btn btn-primary">View Data</a>


  </div>





<?php include "footer.php";?>