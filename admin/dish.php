<?php
session_start();
    require_once('auth.php');
?>
<?php
//checking connection and connecting to a database
// require_once('connection/config.php');
//Connect to mysql server
    $link = mysqli_connect('localhost', 'root', '');
    if(!$link) {
        die('Failed to connect to server: ' . mysqli_error($link));
    }
    
    //Select database
    $db = mysqli_select_db($link,'nnk_FODS');
    if(!$db) {
        die("Unable to select database");
    }
    //retrive promotions from the specials table
    $result=mysqli_query($link,"SELECT * FROM product_details")
    or die("There are no records to display ... \n" . mysqli_error($link)); 
?>
<?php
    //retrive categories from the categories table
    // $categories=mysqli_query($link,"SELECT * FROM categories")
    // or die("There are no records to display ... \n" . mysqli_error($link)); 
?>
    <?php include 'inc/top.php';?>
<div class="container" style="margin-top: 50px;">
<table >
<CAPTION><h3>ADD A NEW FOOD</h3></CAPTION>
<form name="foodsForm" id="foodsForm" action="add-dish.php" method="post" enctype="multipart/form-data">
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>
    <th>Photo</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" id="name" class="textfield" /></td>
    <td><textarea name="description" id="description" class="textfield" rows="2" cols="15"></textarea></td>
    <td><input type="text" name="price" id="price" class="textfield" /></td>
    <td width="168"><select name="category" id="category">
    <option value="select">- select one option -
    <option value="dish">Dish</option>
    <option value="drink">Drink</option>
    </select></td>
    <td><input type="file" name="photo" id="photo"/></td>
    <td><input type="submit" name="add-dish" value="add-dish" /></td>
</tr>
</form>
</table>
<hr>
<table class="table table-border">
<CAPTION><h3>AVAILABLE FOODS</h3></CAPTION>
<tr>
<th>Food Photo</th>
<th>Food Name</th>
<th>Food Description</th>
<th>Food Price</th>
<th>Food Category</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
// $symbol=mysqli_fetch_assoc($currencies); //gets active currency
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo '<td><img src=../images/'. $row['photo']. ' width="80" height="70"></td>';
echo "<td>" . $row['name']."</td>";
echo "<td>" . $row['description']."</td>";
echo "<td>" . $row['price']."</td>";
echo "<td>" . $row['category']."</td>";
echo '<td><a href="delete-food.php?id=' . $row['id'] . '">Remove Food</a></td>';
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($link);
?>
</table>
<hr>
</div>
</div>
</body>
</html>