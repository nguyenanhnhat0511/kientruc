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
          <h2 class="alert alert-success text-center" role="alert"> Change Password </h2>
        </div>


        <!------------>
        
          <form >
            <div class="row mt-2">
              Username : <input style="" class="form-control" type="text" placeholder="Please enter your name " name="username" disabled="true" />
            </div>
        

          <div class="row mt-2">
            Old Password  : 
            <input style="" class="form-control" type="text" placeholder="Please enter old password" name="email"/>

          </div>

          <div class="row mt-2">
           New Password  : 
           <input style="" class="form-control" type="text" placeholder="Please enter your new password" name="phonenumber"/>
          </div>

          <div class="row mt-2">
            Re new Password: 
            <input style="" class="form-control" type="text" placeholder="Please enter your password again" name="password"/>
          
          </div>
            <button style="display:block; margin:0 auto;" type="submit" class="btn btn-lg btn-primary mt-3">Register</button>
        </form>
       


        </div>

        

      
      <!-- /.container-fluid -->
<?php include 'templates/footer_admin.php'; ?>