<?php include 'templates/header_admin.php'; ?>
<?php require_once 'file_run.php'; ?>


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
          <h2 class="alert alert-success text-center" role="alert"> Insert Phone  </h2>
        </div>
             <!------------>
        <?php 

        if( isset(  $_POST['submit'] )){
          include 'uploads.php';
          if( $uploadOk== 1 ){
           
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $sale = mysqli_real_escape_string($conn, $_POST['sale']);
            $number = mysqli_real_escape_string($conn, $_POST['number']);
            $category = mysqli_real_escape_string($conn, $_POST['category']);
            $brands = mysqli_real_escape_string($conn, $_POST['brands']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);

            
            $sql = "INSERT INTO phone(name,number,price,description,image,sale,id_category,id_brands) VALUES 
            ('$name',$number,$price,'$description','$target_file',$sale,$category,$brands)";

          if (mysqli_query($conn, $sql)) {
    echo "<script>alert('thêm thành công');</script>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } 
      }
    } ?>

        <!------------>
        
          <form action="" method="post" enctype="multipart/form-data">

            <div class="row mt-2">
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Name : <input  class="form-control" type="text"  name="name"  required />
              </div>
              <div class="col-sm-12 col-sm-3  col-md-3  col-lg-3">
                Price  : <input  class="form-control" type="number"  name="price"  required />
              </div>
              <div class="col-sm-12 col-sm-3  col-md-3  col-lg-3">
                Sale  : <input class="form-control" type="number" name="sale"  required />
              </div>
            </div>


             <div class="row mt-2">
              <div class="col-sm-12 col-sm-3 col-md-3 col-lg-3">
                Number : <input class="form-control" type="number" name="number" required />
              </div>
              <div class="col-sm-12 col-sm-3 col-md-3 col-lg-3">
                Image : <input  class="form-control" type="file"  name="fileToUpload" required  />
              </div>
               <div class="col-sm-12 col-sm-3 col-md-3 col-lg-3">
                <DATA></DATA>escription : <input class="form-control" type="text" name="description" required />
              </div>
              
            
            </div>
      


        

            <div class="row mt-2">
               
              <div class="col-sm-12 col-sm-9 col-md-9  col-lg-9 ">
                  Category:
                <select name="category" class="mdb-select md-form form-control">
                        <?php
                    $sql = "SELECT id,name FROM category";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                  <option value="<?= $row['id']; ?>"><?= $row['name'] ?></option>
                <?php }}?>
               </select>
              </div>

                <div class="col-sm-12 col-sm-3  col-md-3 col-lg-3 ">
                  Producer:
                <select name="brands" class="mdb-select md-form form-control">
                    <?php
                    $sql = "SELECT id,name FROM brands";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                  <option value="<?= $row['id']; ?>"><?= $row['name'] ?></option>

                  <?php 
                }
              }
          


?>
                </select>
              </div>

          </div>



       

            <button name="submit"  type="submit" style="display:block; margin:0 auto;" type="submit" class="btn btn-lg btn-primary mt-3">Register</button>

        </form>
       


        </div>

        

      
      <!-- /.container-fluid -->
<?php include 'templates/footer_admin.php'; ?>