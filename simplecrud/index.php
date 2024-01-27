

<?php
class database{
    public function config(){
    $con = new mysqli("localhost","root","","sample");
    return $con;
}}
?>


<?php
class userdata extends database{

    public function insert(){
        $con = $this->config();

        $ins = "INSERT INTO category (name) VALUES ('".$_POST['name']."')";
        if ($con->query($ins) === TRUE) {
            echo "New record created successfully";
        }else {
            echo "Error: " . $ins . "<br>" . $con->error;
            }
        $exe = mysqli_query($con,$ins);
        return $exe;
    }


    public function select($id = 0){
        $con = $this->config();

        $sel = "SELECT* FROM category";

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


    public function update($cid, $name){
        $con = $this->config();
        $upd   = "UPDATE category SET name='".$name."' WHERE entity_id =".$cid; 
        $exe = mysqli_query($con,$upd);
        return $exe;
    }



    public function delete($cid){
        $con = $this->config();
        $del   = "delete from category WHERE entity_id =".$cid; 
        $exe = mysqli_query($con,$del);
       
         return $exe;
    
}

}

?>

<?php
    if (!empty($_POST)) {        
        if (isset($_POST['entity_id'])) {
            $test = new userdata();
            $test->update($_POST['entity_id'], $_POST['name']);
        } else {
            $test = new userdata();
            $test->insert();
        }
    }
   
?>

<?php
    $isEdit = false;
    if (isset($_GET['cid'])) {
        $isEdit = true;
        $test = new userdata();
        $category = $test->select($_GET['cid']);
    }
   
?>

<div>
    Category:
    <div>
        <form method="POST">
            <?php 
            if ($isEdit) { ?>
                ID: <input type="text" name="entity_id" value="<?php echo $category['entity_id'];?>"/>
                
                Name: <input type="text" name="name" value="<?php echo $category['name'];?>"/>
                <input type="submit" value="Save"/>
            <?php } else { ?>
                Name: <input type="text" name="name"/>
                <input type="submit" value="Save"/>
                <?php  } ?> 
        </form>
    </div>
</div>


<?php
$test = new userdata();
$result = $test->select();
if ($result) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["entity_id"]. " - Name: " . $row["name"];
   ?>
<div>
           <table>
            <td>
                <a href="?cid=<?php echo $row["entity_id"];?>"><button>Edit</button></a>
                
            </td>
            <td>
                <a href="index.php?del=<?php echo $row["entity_id"];?>">Delete</a>
                
            </td>
           
           </table>

</div>
    <?php
  }
} else {
  echo "0 results";
}
?>


<br><br><br><br>




<?php

if (isset($_REQUEST['del'])) {
    $cid = $_REQUEST['del'];
    $test = new userdata();
    $delete = $test->delete($cid);


    if($delete){
        echo "deleted succesfully";
    header("Location:product.php");
    }
}

?>







