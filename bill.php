<?php include 'templates/header_admin.php'; ?>
<?php if(isset($_GET['delete'])){
  echo '<script>alert("Ẩn thành công");</script>';   
} 
    if(isset($_GET['id'])){
      $id = $_GET['id'];
    }
    


?>
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
                    <th>Name User</th>
                    <th>Content</th>
                    <th>Show/Hidden</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Name User</th>
                    <th>Content</th>
                    <th>Show/Hidden</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php 
                    $sql = "
                    SELECT p.description,c.username,co.status,co.id   from comment_for_user co 
                      JOIN Customer c  on co.id_user = c.id
                        JOIN phone p on co.id_phone = p.id
                        where p.id =". $id
                       ;
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
            ?>
                  <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                  
                    <td><a onclick="return confirm('Bạn chắc chắn ẩn comment ?');" class="btn btn-danger" href="http://localhost:8081/bai4/rest/services/show-hide-comment/<?php echo $row['id'];?>/<?= $row['status']; ?>">  <?php 
                      if($row['status']==1 ){
                        echo "ẩn";
                      }else{
                        echo "hiện";  
                      }


                    ?></a></td>

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