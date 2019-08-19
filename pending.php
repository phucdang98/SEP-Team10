<?php

$result = $db_con->query("SELECT * FROM leave_applications WHERE 
        action IS NULL");

echo '<div class="card mb-md-5">
    <h1 class="text-md text-center">Duyệt đơn</h1>
        <table class="table table-bordered table-responsive-sm w-100">

            <thead class="thead-dark">
                <th>ID</th>
                <th>Hình thức nghỉ</th>
                
                <th>Mã nhân viên</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Gửi đơn ngày</th>
                <th colspan="3">Hành động</th>
            </thead>';

if($result->num_rows > 0){

    while ($row = $result->fetch_object()){
    
        if($row->leave_type == "short_embark_disembark"){

            $type = "Short Embarkation/Disembarkation Leave";

        }elseif ($row->leave_type == "long_embark_disembark") {

            $type = "Long Embarkation/Disembarkation Leave";

        }  else {

            $type = ucfirst($row->leave_type)." Leave";

        }
        
        $id = $row->id;
        $staf_id = $row->staff_id;
        $leave_type = $row->leave_type;
        $leave_id = $row->leave_id;
        global  $id;
        global $staf_id;
        global $leave_id;
        global $leave_type;
        
        $start = str_replace('-', '', $row->leave_start_date);
        
        $end = str_replace('-', '',$row->leave_end_date);
        
        $num_days = intval($end) - intval($start);
        
        $rows = query_db("SELECT * FROM employee WHERE 
            staff_id = $row->staff_id");
        
        $student = <<<STAFF
                <tr>

                    <td>$row->leave_id</td>
                    <td>$type</td>
                    

                    <td>
                        $row->staff_id
                    </td>
                
                     <td>$row->leave_start_date</td>
                   
                    <td>
                        $row->leave_end_date
                    </td>
                    <td>
                        $row->date_requested
                    </td>
                    <td>
                    <button type="button" class="btn success-btn" data-toggle="modal" data-target="#rec-$row->leave_id">
                        Chấp thuận
                    </button>
                    <div class="modal" id="rec-$row->leave_id" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Lý do để đồng ý</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="recommend.php" method="post">
                                    <input name="leave_id" value="$row->leave_id" type="hidden">
                                    <input type="hidden" name="staff_id" value="$row->staff_id">
                                    <input type="hidden" name="recommended_by" value="$username">
                                    <input name="leave_type" value="$row->leave_type" type="hidden">

                                    <input type="hidden" name="email" value="$rows->email">
                                    <input type="hidden" name="firstname" value="$rows->fname">
                                    <input type="hidden" name="num_days" value="$num_days">
                                    <label>Điền lý do</label><br>
                                    <textarea name="why_recommend" class="form-control"></textarea><hr>
                                    <button class="btn btn-success" name='accept'>
                                        Gửi lên trưởng khoa
                                    </button>
                                </form>
                            </div>
                           </div>
                          </div>
                         </div>
                    </td>
                   
                </tr>
STAFF;

    echo $student; 
    }
    
    echo '</table></div>';
    
    echo "";
  
 }else {
        echo '<tr><td class="text-center mb-m-2">Không có đơn nghỉ phép</td></tr>'
     . '</table></div>';
    }

