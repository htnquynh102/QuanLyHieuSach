<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            
        </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $ID= $_GET['orderID'];
        $sql="SELECT * from product v, order_details d 
        where v.product_id=d.product_id AND 
        d.order_id=$ID";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
                $v_id=$row['product_id'];
        ?>
        <tr>
            <td><?=$count?></td>
            <td><?=$row["product_name"] ?></td>
            <td><?=$row["quantity"]?></td>
            <td><?=$row["price"]?></td>
        </tr>
        <?php
            $count=$count+1;
            }
        }else{
            echo "error";
        }
        ?>
    </table>
</div>
