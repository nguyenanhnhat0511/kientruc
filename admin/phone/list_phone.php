<?php 
	include 'templates/header.php'; ?>
 <!-- Products section -->
  <section id="aa-product">

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <?php 
                    $sql = "SELECT * FROM brands";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                             ?>
                       
                    <li><a href="list_product.php?id=<?php echo $row['id']; ?>" ><?php echo $row['name'];?></a></li>
                    
                    <?php 
                       }
                      } 

                      ?>
                  </ul>
                  	<h2 style="text-align:center"><?php
				  		if(isset($_GET['name'])){
				  			echo $_GET['name'];
				  		}
				  	 ?></h2>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                         <?php 
                    $sql = "SELECT * FROM phone limit 8";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                             ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="product-detail.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>"><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $row['name'] ?></a></h4>
                              <span class="aa-product-price"><?php echo number_format($row['price']); ?> VNĐ</span>

                              <?php if($row['sale'] != 0) { ?>
                              <span class="aa-product-price"><del><?php echo number_format($row['sale']); ?> VNĐ</del>
                              </span>
                          <?php } ?>

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
                        <!-- start single product item -->
                                <?php 
                            }
                        }

                                ?>            
                      </ul>
                      <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                  
                    <!-- / electronic product category -->
                  </div>
                  <!-- quick view modal -->                  
                              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php include 'templates/footer.php'; ?>