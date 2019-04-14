<?php include 'templates/header_admin.php'; ?>

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
        
          <form >
            <div class="row mt-2">
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Name : <input style="" class="form-control" type="text" placeholder="Please enter your name " name="username"  />
              </div>
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Number  : <input style="" class="form-control" type="number" placeholder="Please enter your name " name="number" value="0"  />
              </div>
            </div>


             <div class="row mt-2">
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                Name : <input style="" class="form-control" type="text" placeholder="Please enter your name " name="username"  />
              </div>
              <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                  Category:
                <select class="mdb-select md-form form-control">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>
        

            <div class="row mt-2   ">
               
              <div class="col-sm-12 col-sm-9 col-md-9  col-lg-9 ">
                  Producer:
                <select class="mdb-select md-form form-control">
                  <option value="" disabled selected>Choose your Producer</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>

                <div class="col-sm-12 col-sm-3  col-md-3   col-lg-3 ">
                  Producer:
                <select class="mdb-select md-form form-control">
                  <option value="" disabled selected>Choose your Phone Status </option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>

          </div>

       

            <button style="display:block; margin:0 auto;" type="submit" class="btn btn-lg btn-primary mt-3">Register</button>
        </form>
       


        </div>

        

      
      <!-- /.container-fluid -->
<?php include 'templates/footer_admin.php'; ?>