<div>
  <h2>Quản lý đơn hàng</h2>
  <button type="button" class="btn btn-secondary" name="product_xml.php">  <a style="text-decoration: none ; color: #FFFFFF" href="Order_xml.php">XML</a></button>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Khách hàng</th>
        <th>SĐT</th>
        <th>Ngày đặt hàng</th>
        <th>Phương thức thanh toán</th>
        <th>Tình trạng đơn hàng</th>
        <th>Tình trạng thanh toán</th>
        <th></th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from orders";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
          <td><?=$row["delivered_to"]?></td>
          <td><?=$row["phone_no"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["pay_method"]?></td>
           <?php 
              if($row["order_status"]==0){               
            ?>
              <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Đang xử lý</button></td>
            <?php            
              }else{
            ?>
              <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Đã giao</button></td>
            <?php
            }
              if($row["pay_status"]==0){
            ?>
              <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['order_id']?>')">Chưa thanh toán</button></td>
            <?php            
              }else if($row["pay_status"]==1){
            ?>
              <td><button class="btn btn-success" onclick="ChangePay('<?=$row['order_id']?>')">Đã thanh toán</button></td>
            <?php
              }
            ?>     
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">Chi tiết</a></td>
        </tr>
    <?php    
        }
      }
    ?>   
  </table>   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Chi tiết đơn đặt</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="order-view-modal modal-body">
      </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
  $(document).ready(function(){
    $('.openPopup').on('click',function(){
      var dataURL = $(this).attr('data-href');
      $('.order-view-modal').load(dataURL,function(){
        $('#viewModal').modal({show:true});
      });
    });
  });
</script>