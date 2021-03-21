<!DOCTYPE html>
<html>
<body>
<table>
<tr>
<th>Id</th>
<th>Dish</th>
<th>Ingredients</th>
<th>email</th>
<th>date of creation</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "newDB");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, title, ingredients, email, created_at FROM newpizza";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>". $row["id"]. "</td>
<td>". $row["title"] ."</td>
<td>". $row["ingredients"]. "</td>
<td>". $row["email"]. "</td>
<td>". $row["created_at"]. "</td>
</tr>";
}

echo "</table>";
} else { echo "0 results"; }

$tit = $_POST['title'];
$ingre = $_POST['ingredients'];
$ema = $_POST['email'];
$sqlins = "INSERT INTO newpizza (title, ingredients, email, created_at) VALUES ('$tit', '$ingre', '$ema', NOW());";
	if(!mysqli_query($conn,$sqlins)){
		echo'not inserted';
	}else{
		echo 'inserted';
	}
?>
</table>
<form method="POST">
	<input type="text" name="title" placeholder="Title">
	<br>
	<input type="text" name="ingredients" placeholder="Ingredients">
	<br>
	<input type="text" name="email" placeholder="Email">
	<br>
	<button type="submit" name="Submit">Enter Recipe</button>
</form>
</html>
