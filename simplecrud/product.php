

<?php
class database{
    public function config(){
    $con = new mysqli("localhost","root","","sample");
    return $con;
}}



class pdata extends database{

    public function insert(){
        $con= $this->config();
    
    $ins =  "INSERT INTO product (name,sku,price) VALUES ('".$_POST['name']."','".$_POST['sku']."','".$_POST['price']."')"; 
    if ($con->query($ins) === TRUE) {
        echo "New record created successfully";
    }else {
        echo "Error: " . $ins . "<br>" . $con->error;
        }
    $exe = mysqli_query($con,$ins);
            return $exe;
        }
    
    
         public function select($id = 0){
             $con= $this->config();
             $sel = "SELECT* FROM product";
    
            if ($id > 0) {
               $sel = $sel . " WHERE entity_id = ".$id;
    
                $result = $con->query($sel);
                $result = $result->fetch_array();
                
                return $result;
            }
            
             $result = $con->query($sel);
    
             if ($result->num_rows > 0) {
                 return $result;
             }
             return false;
    
        }

        public function update($pid, $name){
            $con = $this->config();
            $upd   = "UPDATE product SET name='".$name."' WHERE entity_id =".$pid; 
            ; 
            $exe = mysqli_query($con,$upd);
            return $exe;
        }



        public function delete($pid){
            $con = $this->config();
            $del   = "delete from product WHERE entity_id =".$pid; 
            $exe = mysqli_query($con,$del);
            return $exe;
        }
    
    
    
    
    
    }

?>




    
<?php
if(!empty($_POST))
{
 if (isset($_POST['entity_id'])) {
        $run = new pdata();
        $run->update($_POST['entity_id'],$_POST['name']);
    }else{
$run = new pdata();
$run->insert();
}
}
  
?>
<?php
    $isEdit = false;
    if (isset($_GET['pid'])) {
        $isEdit = true;
        $run = new pdata();
        $product = $run->select($_GET['pid']);
    }
   

?>

<div>
        Product:
        <div>
        <form method="POST">
            <?php
       if ($isEdit) { ?>
            
             ID: <input type="text" name="entity_id" value = "<?php echo $product['entity_id'];?>"/>
            Name: <input type="text" name="name" value = "<?php echo $product['name'];?>"/>
            Sku: <input type="text" name="sku" value = "<?php echo $product['sku'];?>"/>
                Price: <input type="text" name="price" value = "<?php echo $product['price'];?>"/>
                <input type="submit" value="save"/>
                    <?php
                     } else{
                 ?> 
            
            Name: <input type="text" name="name"/>
            Sku: <input type="text" name="sku"/>
                Price: <input type="text" name="price"/>
                <input type="submit" value="Save"/>
            </form>
            <?php } ?>
        </div>
    </div>








    



<?php
$run = new pdata();
$result = $run->select();
if ($result) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["entity_id"]. " - Name: " . $row["name"]."  sku : " . $row["sku"] ."  Price : " . $row["price"];
   ?>
<div>
           <table>
            <td>
                <a href="?pid=<?php echo $row["entity_id"];?>">Edit</a>
                
            </td>
            <td>
                <a href="?del=<?php echo $row["entity_id"];?>">Delete</a>
                
            </td>
           </table>

</div>
    <?php
  }
} else {
  echo "0 results";
}

?>
<?php

if (isset($_REQUEST['del'])) {
    $run = new pdata();
    $dtd = $run->delete($_GET['del']);
    
    if($dtd){

   //     echo "deleted";
   // header("location:product.php");
}}

?>
