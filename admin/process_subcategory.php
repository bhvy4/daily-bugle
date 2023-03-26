<?php
//fetching subcategories with ajax and jquery
include '../config/db_connect.php';
$category_id = $_POST['category_id'];
// echo "cake";
$sql = "select * from subcategory where category_id = '$category_id'";
// echo "<script>alert('test')</script>";
$result = mysqli_query($conn, $sql);
?>
<?php while ($row = mysqli_fetch_array($result)) : ?>
    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
<?php endwhile; ?>