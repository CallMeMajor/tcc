<?php

  
    $conn=mysqli_connect('localhost','root','','tcc');
    $query="delete from add_parcel where id=".$_GET['id']."";
    $res=mysqli_query($conn,$query);
    if($res){
      echo "<script>alert('parcel deleted....');window.location.href='index.php'</script>";
    }

?>
