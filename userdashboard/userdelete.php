<?php

  
    $conn=mysqli_connect('localhost','root','','tcc');
    $query="delete from users where id=".$_GET['id']."";
    $res=mysqli_query($conn,$query);
    if($res){
      echo "<script>alert('user deleted....');window.location.href='index.php'</script>";
    }

?>