<?php
include('../model/lib.php');
?>

<!DOCTYPE html>
<html>
<body>

<h2>PRODUCT ADD</h2>

<form name="productForm" action="action.php"onsubmit="return validateForm()" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" ><br>
  <label for="sku">Sku:</label><br>
  <input type="text" id="sku" name="sku"><br>
  <label for="price">Price:</label><br>
  <input type="text" id="price" name="price"><br><br>
  <input type="hidden" value="add" name="action">
  <input type="submit" value="Submit">
</form> 


<?php
/*
if(isset($_POST['name']))
{
    $inserData = [
    'name' => ($_POST['name']),
    'sku' => ($_POST['sku']),
    'price' =>( $_POST['price'])
    ];


    $p = new Product();
    $insert = $p->insert($inserData);

    if($insert){
        header("Location:index.php");
    }
}*/
?>


</body>
</html>
<script>
function validateForm() {
      name = document.forms["productForm"]["name"].value;
      sku = document.forms["productForm"]["sku"].value;
      price = document.forms["productForm"]["price"].value;
   
    if (name == ""){
     alert("Please enter your name.");
     return false;
   }
    
   if (sku == ""){
     alert("Please enter your sku.");
     return false;
   }
  
   if (price == ""){
     alert("Please enter your price.");
     return false;
   }
  
  
}</script>