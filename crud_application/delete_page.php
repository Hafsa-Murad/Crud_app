<?php  
include("db.php"); 

if(isset($_GET["id"])){

    $id = $_GET["id"];

    $query = "DELETE FROM `students` WHERE `id` = '$id'";

    $result = mysqli_query($connect, $query);

    if(!$result){
        die("Query Failed...".mysqli_error($connect));
    }
    else{
        header("location:index.php?delete_msg=Record has been deleted...");
    }
}
?>