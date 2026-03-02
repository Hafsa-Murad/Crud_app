<?php 
include("header.php"); 
include("db.php"); 
?>

<?php 
     if(isset($_GET["id"])){
        $id = $_GET["id"];
    
        $query = "SELECT * FROM students where `id` = '$id'" ;
        $result = mysqli_query($connect, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connect));
        }
        else{
        $row = mysqli_fetch_assoc($result);
       
     }
}

?>

        <?php 
    if(isset($_POST["update_students"])){  

    if(isset($_GET["id_new"])){
        $idnew = $_GET["id_new"];
    }

    $fname = $_POST["f_name"];
    $lname = $_POST["l_name"];
    $age = $_POST["age"];

    $query = "UPDATE `students` 
              SET `FirstName` = '$fname',
                  `LastName` = '$lname',
                  `age` = '$age'
              WHERE `id` = '$idnew'";

    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connect));
    }
    else{
        header("location:index.php?update_msg=Data has been updated successfully...");
    }
}
   

?>


<form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
     <div class="form-group">
                <label for="f_name">Name</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['FirstName'] ?>">
            </div>
            <div class="form-group">
                <label for="l_name">Email</label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $row['LastName'] ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" value="<?php echo $row['age'] ?>">
            </div>
            <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>




<?php include("footer.php"); ?>