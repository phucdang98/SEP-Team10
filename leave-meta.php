<?php

$data = <<<TTY
    <h3 class='text-center'>Dữ liệu meta nghỉ phép của nhân viên</h3>
    
    <form action='process.php' method='post'>
        <label for='salary'>Select Staff</label>
        <select name='staff_level' id='select-user'>
            <option value='supervisor'>Quản lý</option>
            <option value='non-supervisor'>Nhân viên</option>         
        </select><hr>
             
        <label for='allowed_days'>Số ngày được phép nghỉ</label>
        <input type='number' min='1' name='annual_leave_days_allowed' class='form-control mb-2' id='allowed_days'><hr>

        <label for='monthly_allowed_days'>Ngày được phép nghỉ trong tháng</label>
        <input type='number' min='1' name='monthly_leave_days_allowed' class='form-control mb-2' id='monthly_allowed_days'><hr>

        <hr><button name='staff_meta' class='btn btn-primary'>Thêm Meta</button><br>
    </form>
TTY;
echo $data;