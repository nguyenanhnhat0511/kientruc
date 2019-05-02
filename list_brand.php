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
                    <th>Sửa</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Name</th>
                   <th>Sửa</th>
                   <th>Xóa</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php 
                    $sql = "SELECT id,name from brands ";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
            ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
               
                    <td><button href="#">sửa</button></td>
                     <td><a onclick="return confirm('Bạn có thể xóa tất cả các điện thoại thuộc danh mục <?= $row["name"]; ?>?');" class="btn btn-danger" href="http://localhost:8081/bai4/rest/services/remove_user/<?php echo $row['id'];?>/brands/">delete</a></td>

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