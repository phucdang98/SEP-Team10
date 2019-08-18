<?php
include_once("connection.php");
include("functions.php");

if(isset($_POST['new_leave'])){
    
    $error = array();
    
    if(var_set($_POST['leave_type'])){
        
        include("leave-types.php");
        
        $leave_type = in_array(strip_tags($_POST['leave_type']),$arr) ? strip_tags($_POST['leave_type']):
            $error[] = urlencode("Không có dữ liệu kiểu nghỉ");
        
    }else{
        
        $error[] = urlencode("Kiểu nghỉ chưa được chọn");
    }
    
    
    if(var_set($_POST['staff_level'])){
        
        
        $for_staff_level = is_string($_POST['staff_level']) ? strip_tags($_POST['staff_level']):
            $error[] = urlencode("Không có dữ liệu nhân viên");
        
    }else{
        
        $error[] = urlencode("Cấp nhân viên phải được chọn");
    }
    
    $leave_id = var_set($_POST['leave_id']) ? intval($_POST['leave_id']) :$error[] = urlencode("Có lỗi. Thử lại");
    
    if(var_set($_POST['allowed_days'])){
    
        $allowed_days = is_numeric($_POST['allowed_days']) ? $_POST['allowed_days']: $error[] = urldecode("Số ngày nghỉ phải là số");
        
    }else{
        $error[] = urlencode("Số ngày nghỉ không được bỏ trống");
    }
    
    if(var_set($_POST['allowed_monthly_days'])){
  
        $allowed_monthly_days = is_numeric($_POST['allowed_monthly_days']) ? $_POST['allowed_monthly_days']: 
            $error[] = urldecode("Số ngày nghỉ trong tháng không phải là số");
        
    }else{
        $error[] = urlencode("Hãy nhập số ngày nghỉ");
    }
    
    $auto_date = var_set($_POST['auto_update']) ? intval($_POST['auto_update']): 
        $error[] = urlencode("Có lỗi. Thử lại!");
    
    $result = $db_con->query("SELECT * FROM leaves WHERE leave_type = '$leave_type' 
            AND for_staff_level = '$for_staff_level'");
   
    $rows = $result->num_rows;
    
    if($rows == 1){
        
        $error[] = urlencode("Kiểu nghỉ đã tồn tại");
    }
    
    if(!$error){
        
        $stmt = $db_con->prepare("INSERT INTO leaves(leave_id,leave_type,
                allowed_days,current_days,allowed_monthly_days, for_staff_level,
                auto_update) VALUES(?,?,?,?,?,?,?)");
        
        $stmt->bind_param("isiiisi",$leave_id,$leave_type,$allowed_days,$allowed_days,
                $allowed_monthly_days,$for_staff_level,$auto_date);
        
        $stmt->execute();
        
        if($db_con->affected_rows == 1){
            
            $msg = urlencode("Tạo thành công");
            redirect_user("admin.php?tab=1&msg=$msg");

        }else{
            
            $error = urlencode("Tạo thất bại ".$db_con->error);
            redirect_user("admin.php?tab=1&error=$error");
        }
        
    }else{
          
        redirect_user("admin.php?tab=1&error=".join($error, urlencode("<br>")));
    }
}else{ 
    redirect_user("404.php");
}