<?php
include "functions.php";
$connection = new Connection;

$q = intval( $_GET['q'] );
$result = $connection->getAll("SELECT * FROM info WHERE id=$q");

?>


<table class="table table-hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Home Town</th>
      <th scope="col">Job</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php
    foreach($result as $res){
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
          <td><a href="update.php?update&id=<?php echo $id; ?>" class="btn btn-info">Update</a></td>
          <td><a href="result.php?delete&id=<?php echo $id; ?>" class="btn btn-warning">Delete</a></td>
        </tr>
        
        <?php
    }
?>


  </tbody>
</table>