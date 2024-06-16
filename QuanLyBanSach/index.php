<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body>
    <?php        
        include_once "./config/dbconnect.php";
    ?>
    <div>
    <div id="header">
        <img id="logo" src="./assets/images/logosach.png" width="140" height="140" alt="Swiss Collection" > 

        <ul>
            <li><a href="./index.php" ><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
            <li><a href="#customers"  onclick="showCustomers()" ><i class="fa fa-user" aria-hidden="true"></i> Khách hàng</a></li>
            <li><a href="#category"   onclick="showCategory()" ><i class="fa fa-list"></i> Thể loại</a></li>
            <li><a href="#productsizes"   onclick="showProductSizes()" ><i class="fa fa-inbox" aria-hidden="true"></i> Kho sách</a></li>
            <li><a href="#products"   onclick="showProductItems()" ><i class="fa fa-book" aria-hidden="true"></i></i> Sách</a></li>
            <li><a href="#orders" onclick="showOrders()"><i class="fa fa-align-justify" aria-hidden="true"></i> Đơn hàng</a></li>
        </ul>
    </div> 
        
    <div id="main-content" class="container allContent-section py-4" >
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-user" aria-hidden="true" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Khách hàng</h4>
                    <h6 style="color:white;">Số lượng: 
                    <?php
                        $sql="SELECT * from users where isAdmin=0";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h6>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-book" aria-hidden="true" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Thể loại sách</h4>
                    <h6 style="color:white;">Số lượng: 
                    <?php   
                        $sql="SELECT * from category";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>
                    </h6>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-inbox" aria-hidden="true" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Sách</h4>
                    <h6 style="color:white;">Số lượng: 
                    <?php
                        $sql="SELECT * from product";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>
                    </h6>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-align-justify" aria-hidden="true" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Đơn hàng</h4>
                    <h6 style="color:white;">Số lượng: 
                    <?php
                        $sql="SELECT * from orders";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>
                    </h6>
                </div>
            </div>
        </div>   
    </div>  
                   
    <?php
        if (isset($_GET['category']) && $_GET['category'] == "success") {
            echo '<script> alert("Category Successfully Added")</script>';
        }else if (isset($_GET['category']) && $_GET['category'] == "error") {
            echo '<script> alert("Adding Unsuccess")</script>';
        }
        if (isset($_GET['variation']) && $_GET['variation'] == "success") {
            echo '<script> alert("Variation Successfully Added")</script>';
        }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
            echo '<script> alert("Adding Unsuccess")</script>';
        }
    ?>
</div>
<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>