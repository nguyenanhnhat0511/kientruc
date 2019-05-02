<?php include 'templates/header_admin.php'; ?>
  <?php 
    if(isset($_GET['insert'])){
      echo '<script>alert("thêm thành công");</script>';
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
          <h2 class="alert alert-success text-center" role="alert"> Insert Blog  </h2>
        </div>


        <!------------>
        
          <form action="http://localhost:8081/bai4/rest/services/insert-category" method="post">
            <div class="row mt-2">
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Name : <input style="" class="form-control" type="text" placeholder="Please enter your name brands" name="name"  />
              </div>
            
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">

                Brands: 
                <select class="form-control" name="id_brands">
                    <?php
                $sql = "SELECT * FROM brands";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {

               ?>
               <option value="<?= $row['id']  ?>"><?= $row['name'] ?></option>
             <?php }}?>
                </select>
              </div>

             
            </div>


       

            <button  style=" display:block; margin:0 auto;" type="submit" class=" mb-5 btn btn-lg btn-primary mt-3">Register</button>
        </form>
       


        </div>

        

      
      <!-- /.container-fluid -->
<?php include 'templates/footer_admin.php'; ?>