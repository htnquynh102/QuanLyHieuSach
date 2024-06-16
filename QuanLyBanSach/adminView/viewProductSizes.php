
<div >
  <h2>Kho sách</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">STT</th>
        <th class="text-center">Tên sách</th>
        <th class="text-center">Số lượng còn</th>
        <th class="text-center" colspan="2"></th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["product_name"]?></td> 
      <td><?=$row["quantity_in_stock"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?=$row['product_id']?>')">Edit</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table> 
</div>
   