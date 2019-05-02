<?php include 'templates/header.php'; ?>
  <?php if( isset($_GET['delete'])){
    echo '<script>alert("xóa thành công")</script>';

  }?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Sản phẩm </th>
                        <th>Giá </th>
                        <th>Số lượng </th>
                        <th>Tổng tiền </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $tongtien = 0;
                      $id =  $_SESSION['id'];
                        $sql = "SELECT c.id, p.image,c.count, p.name, p.price , p.sale FROM cart c join phone p on c.id_phone = p.id 
where c.id_user = $id";

                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($result)) {
                            $tongtien += ($row['price'] * $row['count']);

                      ?>

                      <tr>
                        <td><a class="remove" href="http://localhost:8081/bai4/rest/services/xoasanpham/<?= $row['id']; ?>/<?= $_SESSION['id']; ?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="<?= $row['image'] ?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#"><?= $row['name']; ?></a></td>
                        <td><?= number_format($row['price']); ?> VNĐ </td>
                        <td><input class="aa-cart-quantity" type="number" value="<?= $row['count']; ?>"></td>
                        <td><?= number_format(  $row['price'] * $row['count'])?> VNĐ</td>
                      </tr>
                    <?php }}
                    ?>
                   
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng số tiền </th>
                     <td><?= number_format($tongtien)?> VNĐ</td>
                   </tr>
                  
                 </tbody>
               </table>
               <a href="http://localhost:8081/bai4/rest/services/thanhtoan/<?= $tongtien?>/<?= $id ?>" class="aa-cart-view-btn">thủ tục thanh toán
</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

   
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>


    
 
<?php include 'templates/footer.php'; ?>