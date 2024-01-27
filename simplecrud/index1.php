<?php

    /**
     * Category
     *  entity_id : PK
     *  name
     *  created_at
     *  updated_at
     */

    /**
     * Product
     *  entity_id : PK
     *  name
     *  sku
     *  price
     *  created_at
     *  updated_at
     */
?>
<?php if (empty($_POST)) { ?>
    <div>
        Category:
        <div>
            <form method="POST">
                Name: <input type="text" name="name"/>
                <input type="submit" value="Save"/>
            </form>
        </div>
    </div>
<?php } else { ?>
    <!-- 
        $conn = new mysqli("localhost", "root", "", "sample");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO category (name) VALUES ('".$_POST['name']."')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?> -->

    
<?php } ?>

 <?php
 echo"<br>";
 ?> 

<?php
 $conn = new mysqli("localhost", "root", "", "sample");
$sql = "SELECT* FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["entity_id"]. " - Name: " . $row["name"];
    ?>


<div>
           <table>
            <td>
                <a href="edit.php?id=<?php echo $row["entity_id"];?>"><button>Edit</button></a>
                
            </td>
           </table>

</div>

    <?php
  }
} else {
  echo "0 results";
}

echo"<br><br>";

$sql = "UPDATE category SET name='jjkkf' WHERE entity_id=2";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}


$conn->close();

?>



<div>
        Product:
        <div>
            <form method="POST">
            Name: <input type="text" name="name"/>
            Sku: <input type="text" name="sku"/>
                Price: <input type="text" name="price"/>
                <input type="submit" value="Save"/>
            </form>
        </div>
    </div>