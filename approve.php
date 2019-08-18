<?php

/**
 * This file contains all leave activities by staff - accepted leaves, rejected 
 * leaves and pending leaves
 */

$result = $db_con->query("SELECT * FROM leave_applications");

echo '<div class="card mb-md-5">
        <h1 class="text-center mb-4 text-md">Thống kê nghỉ phép nhân viên</h1>
        <table class="table table-bordered table-responsive-sm w-100">

            <thead class="thead-dark">
                <th>Mã đơn nghỉ</th>
                <th>Mã nhân viên</th>
                <th>Hình thức nghỉ</th>
                
                <th>Bắt đầu nghỉ</th>
                <th>Hạn nghỉ</th>
                <th>Gửi đơn ngày</th>
                <th>Trạng thái</th>
            </thead>';

if($result->num_rows > 0){

    while ($row = $result->fetch_object()){
    
        if($row->action == 'accept'){

        $status = "<button class='btn success-btn'>"
                . "<i class='fa fa-check pr-2'></i> Accepted</button>";
        }elseif($row->action == "reject"){

            $status = "<button class='btn danger-btn'>"
                    . "<i class='fa fa-remove pr-2'></i> Rejected</button>";
        }else{
            $status = "<button class='btn pending-btn'>"
                    . "<i class='fa fa-refresh pr-2'></i> Pending</button>";
        }

        if($row->leave_type == "short_embark_disembark"){

            $type = "Short Embarkation/Disembarkation Leave";

        }elseif ($row->leave_type == "long_embark_disembark") {

            $type = "Long Embarkation/Disembarkation Leave";

        }  else {

            $type = ucfirst($row->leave_type)." Leave";

        }

        $student = <<<STAFF
                <tr>

                    <td>$row->leave_id</td>
                    <td>$row->staff_id</td>

                    <td>$type</td>
                   

                    
                      <td>$row->leave_start_date</td>
                   
                    <td>
                        $row->leave_end_date
                    </td>
                    
                    
                    <td>
                        $row->date_requested
                    </td>
                     <td>
                        $status
                     </td>
                </tr>
STAFF;

    echo $student; 
    }
     
  
 }else {
        echo '<tr><td class="text-center mb-m-2">No leave data available</td></tr>';
    }

echo '</table></div>';

