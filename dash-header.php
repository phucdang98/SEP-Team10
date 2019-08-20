<?php

    if(is_session_inplace("admin-user")){
        $page = "admin.php";
    }elseif (is_session_inplace("supervisor-user")) {
        $page = "dashboard.php?type=supervisor";
    }elseif(is_session_inplace("staff-user")){
        $page = "dashboard.php";
    }
?>
<div class="row mt-4">
    <div class="col-md-3 navigation">
        <h4 class="ml-3 hide-sm">
            <i class="fa fa-paw mr-2"></i>
            <span class="extra-sm"><?php echo ucfirst($username);?></span>
        </h4>

        <ul class="main-nav">

             <li class="list-main">
                <a href="<?php echo $page;?>?tab=4">
                <i class="fa fa-user-circle icon"></i>
                <span class="extra-sm">Tài Khoản của tôi</span>
                </a>
            </li>

<?php
if(isset($_SESSION['staff-user']) && $_SESSION['staff-user'] !== ""){
?>      <li class="list-main">
                <a href="dashboard.php?tab=1">
                <i class="fa fa-bell icon"></i>
                <span class="extra-sm">Lịch sử nghỉ phép</span>
                </a>
            </li>


            <li class="list-main">
                <a data-toggle="collapse" href="#more" role="button"
                   aria-controls="more">
                <i class="fa fa-plus icon"></i>
                <span class="extra-sm">Xin nghỉ phép</span>
                </a>

                <ul id="more" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=6">
                            <i class="fa fa-plus-circle icon"></i>
                            <span class="extra-sm break">Yêu cầu nghỉ phép mới</span>
                        </a>
                    </li>

                    <li>
                        <a href="dashboard.php?tab=3">
                            <i class="fa fa-archive icon"></i>
                            <span class="extra-sm break">Thông tin</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=5">
                            <i class="fa fa-print icon"></i>
                            <span class="extra-sm break">Báo cáo</span>
                        </a>
                    </li>
                </ul>
            </li>

<?php   if($level == "supervisor"){
            echo '<li style="list-style:none;">
                    <a href="dashboard.php?tab=7">
                        <i class="fa fa-recycle icon"></i>
                        <span class="extra-sm break">Duyệt đơn</span>
                    </a>
                </li>';
            }

   }elseif(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] !== ''){
        ?>
            <li class="list-main">
                <a href="admin.php?tab=3">
                <i class="fa fa-refresh icon"></i>
                <span class="extra-sm break">
                    Đơn cần duyệt
                </span>
                </a>
            </li>

           <!--  <li class="list-main">
                <a href="admin.php?tab=1">
                <i class="fa fa-plus icon"></i>
                <span class="extra-sm break">
                    Kiểu nghỉ mới
                </span>
                </a>
            </li> -->
            <li class="list-main">
                <a href="admin.php?tab=2">
                <i class="fa fa-bell icon"></i>
                <span class="extra-sm">Thống kê nghỉ phép</span>
                </a>
            </li>

            <li class="list-main">
                <a href="admin.php?tab=7">
                <i class="fa fa-address-book-o icon"></i>
                <span class="extra-sm break">
                    Người giám sát mới
                </span>
                </a>
            </li>


            
           

           

           

           
    <?php } ?>
        </ul>
    </div>
