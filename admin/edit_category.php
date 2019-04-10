<?php include 'includes/header.php';?>
<?php 

$id=$_GET['id'];
//Creat DB object
$db=new Database();
//Create Query
$query="select * from categories where id=".$id;

//Run Query
$category=$db->select($query)->fetch_assoc();


//Create Query
$query="select * from categories";

//Run Query
$categories=$db->select($query);
?>
<?php 
if(isset($_POST['submit']))
{
	//assign vars


$name=mysqli_real_escape_string($db->link,$_POST['name']);
if($name =='')
{
$error='please fill out all the required fields';
}
else{
	$query="UPDATE categories 
	         SET
			 name='$name'
			 where id =".$id;
	$update_row=$db->update($query);
}
}

?>
<?php 
if(isset($_POST['delete']))
{
	$query='DELETE FROM categories where id='.$id;
	$delete_row=$db->remove($query);
}
?>
<form role="form" method="Post" action="edit_category.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control"  placeholder="Category" value="<?php echo $category['name'];?>">
  </div>
  <div>
  <input name ="submit" type="submit" class="btn btn-default" value="Submit"/>
  <a href="index.php" class="btn btn-default">Cancel</a>
   <input name ="delete" type="submit" class="btn btn-danger" value="Delete"/>
  </div>
  <br>
</form>
<?php include 'includes/footer.php';?>