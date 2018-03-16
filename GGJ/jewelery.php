<html>        
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaia Gemstone Jewelery</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <?php include "header.php"; ?>    
</head>    
<?php
    // standard PHP to MySQL database select script
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die         ('Error connecting to mysql');

    $dbname = 'GGJewellery'; // this is the schema name in MySQL Workbench or DB name in PHPmyadmin
    mysqli_select_db($conn, $dbname);
?>

<body>

<div id="container">
<?php
$page = $_GET['page'];
$items = $_GET['items'];
$Search = $_GET['Search'];
$SortBy = $_GET['SortBy'];
$NoResults = 0;


$query = "SELECT * FROM Items WHERE Item_Name LIKE '%{$Search}%'"; //ORDER BY Item_Price '%{$SortBy}%'
$resultSet = mysqli_query($conn, $query);($query);   ?>     
    <div id="Filter">
       <form action="jewelery.php">
        <table style="width: 50%; float:left;">
        <tr>
          <td><span style="font-weight: bold; font-style: italic;">Search:</span>
            <input style="width:80%;" name="Search" type="text" value="<?php echo $Search; ?>">
            </td>
           <td>
            <button type="submit">Update
            </button>
           </td>
        </table>
        </form>
  </div>        
    <table>
    <!-- this is how you interate a resultset from MYSQL as a associative array -->
    <?php
$counter=2; 
while($row = mysqli_fetch_array($resultSet, MYSQLI_ASSOC))
{
$endofarray = $row2['Item_Id'];
?>
    <?php 
if ($counter % 10 == 2)
{
?> 
    <tr>
      <td style="text-align:center; padding:10px;">
        <a href="jeweleryDetails.php?Item=<?php echo "{$row['Item_Id']}"; ?>" > 
          <img style="border-radius:5px; width:300px; height:300px;" src="<?php {echo "Jewelery/" . $row['Item_Image'];} ?>">
          <br>
            <h4 style="height:20px;"><?php {echo "{$row['Item_Name']}";} ?></h4>
        </a> 
      </td>
    <?php
$counter = 1;
$NoResults = 1;
}
else if ($counter % 10 == 1)
{
?> 
    <td style="text-align:center;padding:10px;">
      <a href="jeweleryDetails.php?Item=<?php echo "{$row['Item_Id']}"; ?>">
        <img style="border-radius:5px; width:300px; height:300px;" src="<?php {echo "Jewelery/" . $row['Item_Image'];} ?>">
        <br>
          <h4 style="height:20px;"><?php {echo $row['Item_Name'];} ?></h4>
        </td>
    </a> 
  <?php
$counter = 10;
}
else
{
?> 
  <td style="text-align:center;padding:10px;">
    <a href="jeweleryDetails.php?Item=<?php echo "{$row['Item_Id']}"; ?>">
      <img style="border-radius:5px; width:300px; height:300px;" src="<?php {echo "Jewelery/" . $row['Item_Image'];} ?>">
      <br>
        <h4 style="height:20px;"><?php {echo "{$row['Item_Name']}";} ?></h4>
    </a> 
  </td>
<?php
$counter = 2;
 
 
}
}   ?>
<br><br>    
<?php    
if ($NoResults == 0)
{
echo "There are no results, try adjusting your filters.";
}
else
{}
?>
</div>
</table>
</div>
</div>


<?php
mysqli_close($conn);
?>

  <?php include "footer.php"; ?>
</body>
</html>
