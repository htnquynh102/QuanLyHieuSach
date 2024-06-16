
<div >
  <h2>Thể loại sách</h2>
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Thêm thể loại
  </button>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">STT</th>
        <th class="text-center">Thể loại</th>
        <th class="text-center" colspan="2"></th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from category";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["category_name"]?></td>   
      <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['category_id']?>')">Delete</i></button></td>
      </tr>
      <?php
            $count=$count+1;
        }
      }
      ?>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm thể loại sách</h4>
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
            <div class="form-group">
              <label for="c_name">Thể loại:</label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" onclick="addCat()" style="height:40px">Thêm</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
   