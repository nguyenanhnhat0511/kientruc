<?php
	function list_brands(){

                    $sql = "SELECT id,name FROM brands";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                  <option value="<?= $row['id']; ?>"><?= $row['name'] ?></option>

                  <?php 
                }
              }
            
	}

?>