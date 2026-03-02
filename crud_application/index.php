
<?php 
include("header.php"); 
include("db.php"); 
?>

<div class="box1">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Add Students</button>
    <h2>All Students</h2>
    </div>
    <table class="table table-hover table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>AGE</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Profile</th>
            <th>UPDATE</th>
            <th>DELETE</th>
            
        
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM students";
        $result = mysqli_query($connect, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connect));
        }
        else{
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td> <?php echo $row['id'] ?></td>
            <td ><?php echo $row['Name'] ?></td>
            <td><?php echo $row['Email'] ?></td>
            <td><?php echo $row['Gender'] ?></td>
            <td><?php echo $row['Date'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['Address'] ?></td>
            <td><?php echo $row['PhoneNumber'] ?></td>
            <td><img src="upload_images/<?php echo $row['Image']; ?>" width="80" height="80" style="border-radius:30%;"></td>
            <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a></td>
        </tr>
        <?php }
 } ?>
    </tbody>
</table>

    <?php 
    if(isset($_GET['message'])){
       echo'<h6 class="text-success">'.$_GET['message'].'</h6>';
    }
    ?>

    <?php 
    if(isset($_GET['insert_msg'])){
       echo'<h6 class="text-success">'.$_GET['insert_msg'].'</h6>';
    }
    ?> 

     <?php 
    if(isset($_GET['update_msg'])){
       echo'<h6 class="text-success">'.$_GET['update_msg'].'</h6>';
    }
    ?>
    <?php 
    if(isset($_GET['delete_msg'])){
       echo'<h6 class="text-danger">'.$_GET['delete_msg'].'</h6>';
    }
    ?>

    <script>
    $(document).ready(function(){
        $("#add-btn").on("submit",function(e){
           e.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var gender = $("#gender").val();
            var date = $("#date").val();
            var age   = $("#age").val();
            var address= $("#address").val();
            var phone_number = $("#phone_number").val();
            var formData = new FormData(this);

            $.ajax({
                url: "insert_app.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    alert(response);
                },
                error: function(xhr, status, error){
                    console.error("Error: " + error);
                }
        });
    });
    </script>




 <form action="insert_app.php" method="POST" enctype="multipart/form-data" >
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="Name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="Email" class="form-control">
            </div>
            <div class="form-group">
                <label >Gender</label>
                <select id="gender" name="Gender" class="form-control" aria-label="Default select example">
                    <option value="">----Select Gender----</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>     
            </select>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="Address" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone_number">PhoneNumber</label>
                <input type="number" id="phone_number" name="PhoneNumber" class="form-control">
            </div>
             <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="Date" class="form-control">
            </div>
            <div class="form-group">
                <label for="file">Upload Profile</label>
                <input type="file" id="Image" name="Image" class="form-control">
                <span class="help-block" >Allowed File Type: jpg, jpeg, png, gif</span>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input id="add-btn" type="submit" class="btn btn-success" name="submit" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<?php include("footer.php"); ?>
