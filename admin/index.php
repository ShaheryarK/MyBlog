<?php include 'includes/header.php';?>
<?php
//Creat db object
$db=new Database;
//Select Query
$query="Select posts.*,categories.name From posts
INNER JOIN categories on posts.category= categories.id
order by posts.id Desc";
//Run Query
$posts=$db->select($query);

//Create Query
$query="select * from categories order by id desc";

//Run Query
$categories=$db->select($query);
?>
		<!-----Content here----->
		<table class="table table-striped">
		<tr>
		<th>Post ID#</th>
		<th>Post Title</th>
		<th>Category</th>
		<th>Author</th>
		<th>Date</th>
		</tr>
		
		<?php while($row=$posts->fetch_assoc()):?>
		<tr>
		  <td><?php echo $row['id']; ?></td>
		  <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
		  <td><?php echo $row['name']; ?></td>
		  <td><?php echo $row['author']; ?></td>
		  <td><?php echo $row['date']; ?></td>
		</tr>
		<?php endwhile;?>
		
</table>

<table class="table table-striped">
		<tr>
		<th>Category ID#</th>
		<th>Category Name</th>
		</tr>
		
		<?php while($row=$categories->fetch_assoc()):?>
		<tr>
		  <td><?php echo $row['id']; ?></td>
		  <td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
		</tr>
		<?php endwhile;?>
</table>
		<?php include 'includes/footer.php';?>
		  