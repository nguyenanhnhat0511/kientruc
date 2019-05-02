<?php include 'templates/header_admin.php'; ?>
<?php if(isset($_GET['delete'])){
  echo '<script>alert("Xóa thành công");</script>';   
} ?>
  <div id="wrapper">

 <?php include 'templates/sidebar_admin.php' ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Brands</th>
                    <th>Comment</th>
                    <th>View Product</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Name</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Brands</th>
                    <th>Comment</th>
                    <th>View Product</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php 
                    $sql = "SELECT p.id as product_id, p.name,p.number,p.image,p.price,p.sale,p.description,c.name as name_category, b.name as name_brands FROM (phone p JOIN category c) Join brands b  ON p.id_category = c.id and p.id_brands = b.id ";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
            ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['sale']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['name_category']; ?></td>
                    <td><?php echo $row['name_brands']; ?></td>
                    <td><a class="btn btn-primary" href="comment.php?id=<?= $row['product_id']; ?>">Comment</a></td>
                    <td><a class="btn btn-dark" href="http://localhost/shop/product-detail.php?id=<?php echo $row['product_id']; ?>">View</a></td>
                    <td><a class="btn btn-dark" href="#">Edit</a></td>
                    <td><a onclick="return confirm('Bạn có thể xóa tất cả các điện thoại thuộc danh mục <?= $row["name"]; ?>?');" class="btn btn-danger" href="http://localhost:8081/bai4/rest/services/remove_user/<?php echo $row['id'];?>/phone/">delete</a></td>

                  </tr>
                  <?php 
                }
              }
              ?>
                
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->
<?php include 'templates/footer_admin.php'; ?>