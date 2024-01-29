<?php
include('../model/lib.php');
?>

<!DOCTYPE html>
<html>
<body>

<h2>PRODUCT EDIT</h2>
<?php
 if(isset($_GET['pid']))
 {
     $pid = ($_GET['pid']);
     $test = new product();
     $result = $test->select($pid);

 ?>

<form name="productForm" action="action.php"onsubmit="return validateForm()" method="post">
<label for="name">Entity Id:</label><br>
  <input type="text" id="entity_id" name="pid" value="<?php echo $result['entity_id'];?>" ><br>
   <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="<?php echo $result['name'];?>" ><br>
  <label for="sku">Sku:</label><br>
  <input type="text" id="sku" name="sku" value="<?php echo $result['sku'];?>" ><br>
  <label for="price">Price:</label><br>
  <input type="text" id="price" name="price" value= "<?php echo $result['price'];?>">
  <input type="hidden" value="edit" name="action"><br><br>
  <input type="submit" value="Submit">
</form> 
<?php  } ?>





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