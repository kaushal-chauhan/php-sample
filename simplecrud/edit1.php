<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "sample");

$sql = "SELECT* FROM category WHERE entity_id = ".$id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["entity_id"]. " - Name: " . $row["name"].  "";

    ?>
  

<div>
        Category:
        <div>
            <form method="POST">
            ID: <input type="text" name="entity_id" value="<?php echo  $row["entity_id"];  ?>"/>
            Name: <input type="text" name="name" value="<?php echo  $row["name"];  ?>"/>
                <input type="submit" value="Edit"/>
            </form>
        </div>
    </div>

    <?php
    }
} else {
  echo "0 results";
}
$conn->close();
?>





    <?php



$conn = new mysqli("localhost", "root", "", "sample");
$sql = "UPDATE category SET name='jjkkf' WHERE entity_id=2";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

?>