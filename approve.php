<?php

/**
 * This file contains all leave activities by staff - accepted leaves, rejected 
 * leaves and pending leaves
 */

$result = $db_con->query("SELECT * FROM accepted_leaves");

        echo '<div class="tab-pane fade show p-5" role="tabpanel"
                aria-labelledby="accepted-tab" id="accepted">';

        if($result->num_rows > 0){

            echo '<div class="card">
                    <table class="table table-bordered table-responsive-sm w-100">

                        <thead class="thead-dark">
                            <th>Mã đơn nghỉ</th>
                            <th>Kiểu đơn nghỉ</th>
                            <th>Nhân viên</th>
                            <th>Số ngày</th>
                            <th>Ngày xét duyệt</th>
                        </thead>';

            while($row = $result->fetch_object()){

                $type = ucwords(implode(' ',explode('_',$row->leave_type)));

                echo "<tr>
                        <td>$row->leave_id</td>

                        <td>$type</td>
                        <td>$row->staff_id</td>

                        <td>$row->num_days</td>

                        <td>
                            $row->date_accepted
                        </td>
                    </tr>";
            }

        echo "</table>
           </div>";

        }else {
            echo '<h2 class="text-center mb-5">Không có dữ liệu</h2>';
        }

        echo ' </div>';

