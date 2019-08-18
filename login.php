<?php
include_once("db.php");

if(isset($_GET['action']) && $_GET['action'] == "login"){
    

    if(isset($_GET['type']) && $_GET['type'] == "admin"){

        if(isset($_SESSION['admin-username'])){

            header("Location:admin.php");
        }

        $username = "username";

        $action = "user.php?type=admin";

        $id = "admin-login";

        $field = "Tên đăng nhập admin";

        $prop = 'text';

        $login_type = "admin";

        $title = "Đăng Nhập Admin";
        
        $page = 'admin.php';
        
        $tbl = "admin";

        
        
    }else{

        if(isset($_SESSION['staff-user'])){
    
            echo "<script>history.back();</script>";
            
        }        

        $username = "staff";
    
        $field = "Staff Username";

        $action = "user.php";

        $id = "staff-login";

        $login_type = "staff";

        $prop = 'text';

        $title = "Đăng nhập nhân viên";

        $page = 'dashboard.php';

        $tbl = "employee";
        
        $account_trigger = "Chưa có tài khoản? <a href='register.php' class='text-sm'>"
                . "Đăng ký ngay</a>";

    }    
    
}else{

    if(isset($_SESSION['staff-user'])){
    
        echo "<script>history.back();</script>";
            
    }        

    $username = "username";
    
    $field = "Tên đăng nhập";

    $action = "user.php";

    $id = "staff-login";
    
    $page = 'dashboard.php';

    $login_type = "staff";

    $prop = 'text';

    $title = "Đăng Nhập Nhân Viên";
    
    $tbl = "employee";
    
    $account_trigger = "Chưa có tài khoản? <a href='register.php' class='text-sm'>"
            . "Đăng ký</a>";

}    

$part = <<<TY
 <div class='splash-img'>
    <div class="container login">
    <h1 class="hide">$title</h1>

    <div class="row">

        <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
    <h3 class="text-center form-head">$title</h3>

            <div class="card login">
TY;

echo $part;

            if(isset($_GET['error']) && !empty($_GET['error'])){

                $error = $_GET['error'];
                
                echo "<small class='alert alert-danger alert-dismissible'>$error
                <span class='close' data-dismiss='alert'>&times;</span></small>";
            }

        $ac = (isset($account_trigger)) ? $account_trigger: '';
       
        
        $last = <<<YOP
                
            <form action="user.php" method="post" id="$id">
                
                <input type="hidden" name="login-type" value="$login_type">
    
                <input type="hidden" name="table" value="$tbl">
    
                <input type="hidden" name="page" value="$page">
                    
                <label class="text-black" for="staff_user">$field</label class="text-black"><br>
                <input type="$prop" name="$username" maxlength="50" class="input-text" id="username"><br>
                       
                <label class="text-black" for="password">Mật khẩu</label class="text-black"><br>
                <input type="password" name="password" maxlength="50" class="input-text" id="password">
 
                <button name="login" class="btn btn-yellow" type="submit">Đăng nhập</button>
                <br>
                <small class='mr-2'>$ac</small>
                
            </form>
            
        </div>
YOP;

echo $last;

echo '</div>';