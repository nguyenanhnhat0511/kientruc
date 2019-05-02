<?php include 'templates/header.php'; ?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/slider/background_product_detail.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>
          <?php 
          if(isset($_GET['id'] ) ) {
            $id = $_GET['id'];

          }
          if( isset($_GET['insert'])){
            echo "<script>alert('thêm coment thành công');</script>";
          }


        ?></h2>
      
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <?php 
              $sql = "SELECT * FROM phone where id = ".$id;
                $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>

          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-lens-image"><img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a data-big-image="img/view-slider/medium/polo-shirt-1.png" data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                          </a>                                    
                          <a data-big-image="img/view-slider/medium/polo-shirt-3.png" data-lens-image="img/view-slider/large/polo-shirt-3.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                          </a>
                          <a data-big-image="img/view-slider/medium/polo-shirt-4.png" data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo $row['name']; ?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">
                        <?php echo number_format($row['price']);  ?> VNĐ
                      </span>
                      <p class="aa-product-avilability">Tình trạng: <span><?php if($row['number'] != 0 ){echo 'còn hàng';}else{
                        echo 'hết hàng';
                      } ?></span></p>
                    </div>
                    <p><?php echo $row['description']; ?>!</p>
                    <h4>Size</h4>
                   
                  
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">Polo T-Shirt</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="http://localhost:8081/bai4/rest/services/themgiohang/<?= $_SESSION['id'] ?>/<?= $row['id']; ?>">Add To Cart</a>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Sản phẩm bạn có thể mua</h3>
              <ul class="aa-product-catg aa-related-item-slider">

                 <?php 
              $sql = "SELECT * FROM phone limit 8";
                $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                <!-- start single product item -->
                <li>
                  <figure>
                    <a class="aa-product-img" href="product-detail.php?id=<?php echo $row['id']; ?>   "><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
                      <?php if($row['sale'] != 0 ){ ?>


                      <span class="aa-product-price"><?php echo number_format($row['sale']); ?> VNĐ</span><span class="aa-product-price"><del><?php echo number_format($row['price']); ?> VNĐ</del></span>
                      <?php 
                    }else{?>
                       <span class="aa-product-price"><?php echo number_format($row['price']); ?> VNĐ</span>
                    <?php }

                      ?>



                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <?php if($row['sale'] != 0 ){ ?>
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                <?php } ?>
                </li>
                <?php 
              }
            }
            ?>
                                                                                          
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>  
          </div>
            <?php 

          }
        }
        ?>


        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
  <div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="commentBox">
        
        <p class="taskDescription">Nhận xét</p>
    </div>
    <div class="actionBox">
        <ul class="commentList">
            
            <?php 
              $sql = "SELECT * FROM comment_for_user co 
              JOIN Customer c on co.id_user = c.id
               WHERE co.id_phone = $id and co.status = 1 ORDER BY co.date_start DESC"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {


            ?>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                  <h2 style="margin:0"><?= $row['username']; ?></h2>
                    <h3 class="" style="margin:0"><?= $row['description'];  ?></h3> 
                    <small><?php echo $row['date_start']; ?></small>

                </div>
            </li>
            <?php 
          }}
          ?>

        </ul>
        <form  action="http://localhost:8081/bai4/rest/services/insert-comment/" class="form-inline" method="post">
            <div class="form-group">
                <input  name="yourcomment" class="form-control" type="text" placeholder="Your comments" />
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="id_phone" value="<?php echo $id; ?>">

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Add</button>
            </div>
        </form>
    </div>
</div>

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Đăng kí cùng chúng tôi</h3>
            <p>Đăng kí để nhận thêm thông tin chi tiết</p>
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

 <?php include 'templates/footer.php'; ?>