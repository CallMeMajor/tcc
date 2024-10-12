<?php

  
    $conn=mysqli_connect('localhost','root','','tcc');
    $query="delete from agents where id=".$_GET['id']."";
    $res=mysqli_query($conn,$query);
    if($res){
      echo "<script>alert('agent deleted....');window.location.href='index.php'</script>";
    }

?>