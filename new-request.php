<?php
if($level == "non-supervisor"){
    
    $result = $db_con->query("SELECT * FROM leaves WHERE for_staff_level = 'non-supervisor'");
    
}else{
        
    $result = $db_con->query("SELECT * FROM leaves WHERE for_staff_level = 'non-supervisor'");

}

if($result->num_rows > 0){
    
    include("leave-types.php");

    echo "<h1 class='text-center hide'>Đơn nghỉ mới</h1>

        <form action='request.php' method='post' class='mb-5' id='request-form'>
            <input type='hidden' name='staff_id' value='$id'>

            <label for='leave-type'>Chọn kiểu xin nghỉ :</label>
            <select name='leave_id' class='form-control' required>";

    while($row = $result->fetch_object()){

        
        $num_days = $row->allowed_monthly_days;
        
        switch($row->leave_type){

        case "sick": $type = "Nghỉ bệnh";
        break;
        case "maternity":$type = "Nghỉ thai sản";
        break;
        case "study": $type = "Nghỉ tập huấn";
        break;
        case "emergency": $type = "Nghỉ Khẩn cấp";
        break;
        case "others": $type = "Khác";
        break;
        default : "Unknown";
        break;
    
        }
            
            echo "<option class='leave_type' value='$row->leave_id'>$type</option>";
            
    }
       
        echo "</select><hr>";

        
}         

    $min = date("Y-m-d");
    
    echo "<label for='start'>Ngày bắt đầu</label><br>
        <input type='date' name='leave_start_date' min='$min' id='start' class='form-control' required><hr>
        <label for='end'>Ngày kết thúc</label><br>
        <input type='date' name='leave_end_date' id='end' min='$min' class='form-control' required><br>
        <small class='error' id='error'></small>
        <hr>
        <button class='btn btn-warning' type='submit' name='request'>
        Nộp đơn xin</button>
        </form>";
        
