<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
   
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadFile"><br><br>
        <input type="submit" name='submit' value="Upload File">
    </form>
</body>
</html>

<?Php 
if(isset($_POST["submit"]) && isset( $_FILES["uploadFile"])) {
   $fileName = $_FILES["uploadFile"]["name"];
   $temp_name = $_FILES["uploadFile"]["tmp_name"];
   $folder = "upload_images/".$fileName;
   echo $folder;
   if(move_uploaded_file($temp_name, $folder)){
    echo "File uploaded Successfully....";
   }else{
    echo "File can't be uploaded.....";
   }
}
   
   
   ?>