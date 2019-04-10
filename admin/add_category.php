<?php include 'includes/header.php';?>
<?php 
//Creat DB object
$db=new Database();

if(isset($_POST['submit']))
{
	//assign vars


$name=mysqli_real_escape_string($db->link,$_POST['name']);
if($name =='')
{
$error='please fill out all the required fields';
}
else{
	$query="Insert into categories
	(name)
	values('$name')";
	$insert_row=$db->insert($query);
}
}

?>
<form role="form" method="Post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control"  placeholder="Category">
  </div>
  <div>
  <button name="submit" type="submit" class="btn btn-default">Submit</button>
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>
<?php include 'includes/footer.php';?>