<?php
    include "functions.php";

    $connection = new Connection;

    if ( isset( $_GET['update'] ) ) {
        $the_id = $_GET['id'];
        $result = $connection->getAll( "SELECT * FROM info WHERE id=$the_id" );
        // print_r($data);

        foreach ( $result as $res ) {
            $id = $res['id'];
            $firstName = $res['firstName'];
            $lastName = $res['lastName'];
            $age = $res['age'];
            $homeTown = $res['homeTown'];
            $job = $res['job'];
        }
    }

    if ( isset( $_POST['update'] ) ) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $homeTown = $_POST['homeTown'];
        $job = $_POST['job'];
        $array = array(
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'age'       => $age,
            'homeTown'  => $homeTown,
            'job'       => $job,
        );
        $connection->updateData( "UPDATE info SET firstName=:firstName, lastName=:lastName, age=:age, homeTown=:homeTown, job=:job WHERE id=$the_id", $array );
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
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $firstName ?>" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
                <div class="col-md-5 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName ?>" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
                </div>
            </div>


            <div class="form-row">


                <div class="col-md-3 mb-3">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $age ?>" required>
                <div class="invalid-tooltip">
                    Please provide a valid age.
                </div>
                </div>


                <div class="col-md-3 mb-3">
                <label for="homeTown">Home Town</label>
                <input type="text" class="form-control" id="homeTown" name="homeTown" value="<?php echo $homeTown ?>" required>
                <div class="invalid-tooltip">
                    Please provide a valid city.
                </div>
                </div>



            </div>

            <div class="form-row">
                <div class="col-md-3 mb-3">
                <label for="job">Job</label>
                <input type="text" class="form-control" id="job" name="job" value="<?php echo $job ?>" required>
                <div class="invalid-tooltip">
                    Please provide a valid job.
                </div>
                </div>
            </div>


            <button class="btn btn-info" name="update" type="submit">update</button>

        </form>
        <br>
        <a href="result.php" target="_blank" class="btn btn-primary">View Data</a>


  </div>





<?php include "footer.php";?>