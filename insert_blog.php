<?php include 'templates/header_admin.php'; ?>
<?php session_start(); ?>

  <div id="wrapper">

 <?php include 'templates/sidebar_admin.php' ?>
</div>
    

      <div class="container" style="margin:30px ">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">User</li>
        </ol>


        <div class="row">
          <h2 class="alert alert-success text-center" role="alert"> Insert Blog  </h2>
        </div>


        <!------------>
        <?php 

        if( isset(  $_POST['register'] )){
          include 'uploads.php';
          if( $uploadOk== 1 ){
           
            $title = mysqli_real_escape_string($conn, $_POST['titleitem']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $id_user = $_SESSION['id'];
      

            $sql = "INSERT INTO blog(title,image,description,status,id_user) VALUES ('".$title."','".$target_file."','".$description."',1,".$id_user.")";

          if (mysqli_query($conn, $sql)) {
    echo "<script>alert('thêm thành công');</script>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } 
      }
    } ?>
        
          <form action="" role="form" method="post" enctype="multipart/form-data">
 
            <div class="row mt-2">
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Title : <input style="" class="form-control" type="text" placeholder="Please enter your blog title " name="titleitem"  />
              </div>
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Image  : <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"   />

              </div>
            </div>


          <div class="md-form mb-2 mt-2 pink-textarea active-pink-textarea-2">
              <label for="form23">Nhập dữ liệu </label> 

            <i class="fas fa-angle-double-right prefix"></i>
            <textarea name="description" id="form23" class="md-textarea form-control" rows="3"></textarea>
          </div>
       

            <button name="register" type="submit"  style=" display:block; margin:0 auto;" type="submit" class=" mb-5 btn btn-lg btn-primary mt-3">Register</button>
        </form>
       


        </div>

        

      
      <!-- /.container-fluid -->
<?php include 'templates/footer_admin.php'; ?>