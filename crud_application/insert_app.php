<?php
include("db.php");

if(isset($_POST['submit'])){

    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Gender = $_POST["Gender"];
    $Date = $_POST["Date"];
    $age = $_POST["age"];
    $Address = $_POST["Address"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $Image = $_FILES["Image"]["name"];
    $tempFile = $_FILES["Image"]["tmp_name"];

    if(move_uploaded_file($tempFile, "upload_images/".$Image)){

        $query = "INSERT INTO students 
        (Name, Email, Gender, Date, age, Address, PhoneNumber, Image)
        VALUES 
        ('$Name','$Email','$Gender','$Date','$age','$Address','$PhoneNumber','$Image')";

        if(mysqli_query($connect, $query)){
            header("Location: index.php?insert_msg=Student Added Successfully");
        } else {
            echo "Query Failed: " . mysqli_error($connect);
        }

    } else {
        echo "Image Upload Failed";
    }
}
?>
    
