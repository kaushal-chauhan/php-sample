<?php
include('../model/lib.php');
?>





<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>

  <h2>PRODUCT LIST</h2>
  <tr><td><a href="add.php">ADD</a></td></tr>

  <?php $order = (isset($_GET['sort']) && $_GET['sort'] == "asc") ? "desc" : "asc";?>
  <table>
    <tr>
      <th><a href="?sort=<?php echo $order; ?>&col=entity_id">ID</a></th>
      <th>NAME</th>
      <th>SKU</th>
      <th>PRICE</th>
      <th>ACTION</th>
    </tr>
    <?php
    $p = new Product();
    //$p->select($id,$updateData);

    if (isset($_GET['sort'])&&($_GET['col'])) {

      $data = $p->select(0, $_GET['col'], $_GET['sort']);
    } else {
      $data = $p->select();
    }



    while ($row = $data->fetch_assoc()) {
    ?>
      <tr>
        <td><?php echo $row["entity_id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["sku"]; ?></td>
        <td><?php echo $row["price"]; ?></td>

        <td><a href="edit.php?pid=<?php echo $row["entity_id"];?>"><button>Edit</button></a>
        <a onClick="return confirm('ARE YOU SURE')" href="index.php?pdel=<?php echo $row["entity_id"];?>"><button>Delete</button></a></td>
      </tr>
    <?php
    }
    ?>
  </table>

</body>

</html>