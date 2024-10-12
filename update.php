<?php
require './assets/navbar.php'
?>
<?php
if (isset($_POST['btn'])) {
    $conn = mysqli_connect('localhost', 'root', '', '');
    if ($conn) {
        $query = "update ajax set name='".$_POST['']."' where id=".$_GET['id']."";
        $res = mysqli_query($conn, $query);
        if () {
            echo 'data Update successfully';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update</h1>
    <form action="" id="form_data" method="post">
        name: <input type="text" id="name" name="">
      
        <button type="submit" id="submit" name="btn">Update</button>
    </form>
</body>
</html>