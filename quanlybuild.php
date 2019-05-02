<?php include 'templates/header_admin.php'; ?>

   
    


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
        <form action="" method="post">
          <input type="date" name="timestart">
          <input type="date" name="timeend">
          <button type="submit" name="submit">Lọc</button>
        </form>
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
                    <th>Ngày</th>
                    <th>Số Tiền</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th>Ngày</th>
                    <th>Số Tiền</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php 
                if (isset($_POST['submit'])){
                  $datestart = $_POST['timestart'];
                  $dateend = $_POST['timeend'];
                  if($datestart == ''){
                    $sql = "select * from bill 
                    
                    ";
                  }else{
                    $sql = "select * from bill 
                     where date between '$datestart' and '$dateend'";
                  }

                  
                  echo $sql;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?= $row['date'] ?></td>
                    <td><?= number_format($row['total_price']) ?> VNĐ</td>

                  </tr>
                  <?php 
                }
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