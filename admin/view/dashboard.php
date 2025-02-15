<?php 
    require('../controller/dashboardController.php');
    $connection =  new DashboardController();
    $arrData = $connection->fetchAllDetailOfSite();

    $dataPoints = array(
        array("x"=> 10, "y"=> $arrData[0] , "indexLabel" => "Category"),
        array("x"=> 20, "y"=> $arrData[1] , "indexLabel" => "Products") ,
        array("x"=> 30, "y"=> $arrData[2] , "indexLabel" => "Orders"),
        array("x"=> 40, "y"=> $arrData[3] , "indexLabel" => "Users"),
    );
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <!-- CONTENT -->
    <div class="mt-3">
        <div class="row row-cols-lg-4">
            <div class="col d-flex align-items-start border-end">
                <i class="fa fa-object-group  fa-3x text-muted"></i>
                <div class="ms-2">
                    <h4 class="fw-bold mb-0">Total Catgory</h4>
                    <p><?php echo (!empty($arrData) ? $arrData[0] : 0  ); ?></p>
                </div>
            </div>
            <div class="col d-flex align-items-start border-end">
                <i class="fa fa-shopping-cart fa-3x text-muted"></i>
                <div class="ms-2">
                    <h4 class="fw-bold mb-0">Total Products</h4>
                    <p><?php echo (!empty($arrData) ? $arrData[1] : 0  ); ?></p>
                </div>
            </div>
            <div class="col d-flex align-items-start border-end">
                <i class="fa fa-sticky-note fa-3x text-muted"></i>
                <div class="ms-2">
                    <h4 class="fw-bold mb-0">Total Orders</h4>
                    <p><?php echo (!empty($arrData) ? $arrData[2] : 0  ); ?></p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="fa fa-users fa-3x text-muted"></i>
                <div class="ms-2">
                    <h4 class="fw-bold mb-0">Total Users</h4>
                    <p><?php echo (!empty($arrData) ? $arrData[3] : 0  ); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->

    <!-- CHART CONTENT START -->
    <div class="mt-5">
        <div class="card mb-3">
            <div class="card-body p-3">
                <div class="chart">
                    <div id="bar-chart" style="height: 370px; width: 100% "></div>
                </div>
            </div>
        </div>
    </div>
    <!-- CHART CONTENT END -->

  