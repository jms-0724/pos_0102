<?php

require_once("../connection.php"); //Connection to Database

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $stmt = $conn->prepare("SELECT * FROM tbl_inventory WHERE prod_id LIKE '%$search%' OR prod_name LIKE '%$search%' OR prod_type LIKE '%$search%'");

} else {
    $stmt = $conn->prepare("SELECT * FROM tbl_inventory");
}
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    ?>
    <!-- Display data in the table-->
        <tr>
        <td><input type="checkbox" name="" id="" class="form-check-input"></td>
        <td><?= $row['prod_id']?></td>
        <td><?= $row['prod_name']?></td>
        <td><?= $row['prod_type']?></td>
        <td><?= $row['prod_quantity']?></td>
        <td><?= $row['prod_price']?></td>
        </tr>
        
    <?php
} 
} else {
?>
    <tr>
        <td colspan="6">No Products Found</td>
    </tr>
<?php
}
?>

