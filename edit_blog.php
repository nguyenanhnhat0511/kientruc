<?php include 'templates/header_admin.php'; ?>
<?php session_start(); ?>
  <?php
    if(isset($_GET['id'])){
      $id = $_GET['id'];
    }
    if(isset($_SESSION['id'])){
      $id_blog = $_SESSION['id'];
    }
     if(isset($_GET['edit'])){
      echo "<script>alert('sửa thành công');</script>";
    }
   ?>
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
          <h2 class="alert alert-success text-center" role="alert"> Edit Blog  </h2>
        </div>


        <!------------>



    <?php
      $sql1  = "SELECT image, `title`, `description`, `status`  FROM `blog` WHERE id=".$id;
      $result1  = mysqli_query($conn, $sql1 );

      if (mysqli_num_rows($result1 ) > 0) {
          // output data of each row
          while($row1  = mysqli_fetch_assoc($result1 )) {

     ?>
        
          <form action="http://localhost:8081/bai4/rest/services/insert-blog/"  method="post" >
 
            <div class="row mt-2">
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Title : <input style="" class="form-control" type="text" placeholder="Please enter your blog title " name="title" value="<?= $row1['title']; ?>" />
              </div>
                
            </div>
            <img src="<?= $row1['image']; ?>" width="50px" height="50px"/>

          <div class="md-form mb-2 mt-2 pink-textarea active-pink-textarea-2">
              <label for="form23">Nhập dữ liệu </label> 

            <i class="fas fa-angle-double-right prefix"></i>
            <input name="description" type="text" id="form23" value="<?= $row1['description'];?>" class="md-textarea form-control"></input>
            <input name="id_blog" type="hidden" id="form23" value="<?= $id_blog;?>" class="md-textarea form-control"></input>
          </div>
       

            <button name="register" type="submit"  style=" display:block; margin:0 auto;" type="submit" class=" mb-5 btn btn-lg btn-primary mt-3">Register</button>
        </form>

        <?php 
      }
    }
    ?>
       


        </div>

        

      
      <!-- /.container-fluid -->
<?php include 'templates/footer_admin.php'; ?>