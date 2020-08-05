<?php include "header.php";
    include "functions.php";
    $connection = new Connection;

    $result = $connection->getAll( "SELECT * FROM info" );
    // print_r($result);
?>
<div class="container">


        <form>
            <div class="col-md-4 mb-3">

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                <select onchange="showUser(this.value)" class="form-control" id="exampleFormControlSelect1">
                <option value="" selected>Select One</option>
                    <?php
                        foreach ( $result as $res ) {
                            $firstName = $res['firstName'];
                            $id = $res['id'];
                        ?>
    <option value="<?php echo $id; ?>"><?php echo $firstName; ?></option>
    <?php
        }
    ?>

</select>
</div>
</div>
</form>

<div id="txtHint">
    <b>Person will be listed Here</b>
</div>

<a href="result.php" class="btn btn-primary">Show All</a>

</div>







<?php include "footer.php"?>
