<?php
include('../model/lib.php');
?>

<?php
if(isset($_POST['action']))
{
    if ($_POST['action'] == "add") {
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
    }
    elseif ($_POST['action'] == "edit")
 
    {
       $pid = $_POST['pid'];
       $updateData = [
       'name' =>($_POST['name']),
       'sku' =>($_POST['sku']),
      'price' =>($_POST['price'])
                  ];
      $test = new product();
     $update = $test->update($pid,$updateData);

if($update){
  header("Location:index.php");
 
}}
}
?>




<?php

/*

 if (isset($_POST['name'])) {
     if ($_POST['action'] == "edit")
      {
  $pid = $_POST['pid'];
  $updateData = [
    'name' =>($_POST['name']),
    'sku' =>($_POST['sku']),
    'price' =>($_POST['price'])
];

  $test = new product();
  $update = $test->update($pid,$updateData);
 
  if($update){
    header("Location:index.php");
   
 }}
 }
 ?>




*/?>
<?php
if (isset($_REQUEST['pdel'])) {
    $id = $_REQUEST['pdel'];
    $test = new product();
    $delete = $test->delete($id);


    if($delete){
      
         echo "deleted succesfully";
    // header("Location:product.php");
    }
}

?>






