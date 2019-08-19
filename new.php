<?php

$result = $db_con->query("SELECT * FROM employee WHERE supervisor IS NULL OR supervisor = ''");

if($result->num_rows > 0){
    echo "<h1 class='text-center hide'>Cấp quyền quản lý</h1>

            <form action='process.php' method='post'>

            
            <label for='select'>Cấp quyền quản lý mới</label>
                <select name='make-supervisor' class='form-control w-50' id='select'>";
        while($row = $result->fetch_object()){
            
            echo "<option value='$row->username'>$row->fname $row->lname ($row->username)
                    </option>";
        }
        
        echo '</select><br>
            <input type="hidden" name="tab" value="7">
            <button class="btn btn-default" name="make-super" type="submit">
            Cấp quyền
            </button></form><hr>
           </select><br>
            <button class="btn btn-default" id="btn-toggle">
            <i class="fa fa-plus-circle fa-lg mr-2"></i> 
            Đăng ký quản lý mới
            </button>
             <div class="container mx-md-4 hide" id="add">
             <h4 class="text-center mb-2">Register New Supervisor</h4>';
        
        include_once("inc.register.php");
        
        echo '</div>';
        
}else{
    
$res = $db_con->query("SELECT * FROM employee WHERE supervisor <> 'N/A'");

if($res->num_rows > 0){

    echo '<div class="card mb-md-5">
    <h1 class="text-md text-center">Quản lý mới</h1>
        <table class="table table-bordered table-responsive-sm w-100">

            <thead class="thead-dark">
                <th>Mã nhân viên</th>
                <th>Tên đăng nhập</th>
                <th>Họ Tên</th>
                <th>Ngày đăng ký</th>
                <th>Hành động</th>
            </thead>';

    $here = $_SERVER["PHP_SELF"];
    
    while ($row = $res->fetch_object()){
    
        
        $student = <<<STAFF
                <tr>

                    <td>$row->staff_id</td>
                    <td>$row->username</td>
                    <td>
                        $row->fname $row->lname
                    </td>
                
                     <td>$row->date_registered</td>
                   
                    
                    <td><form action="$here?tab=7" method="post">
                        <input name="staff_id" value="$row->staff_id" type="hidden">
                        <input type="hidden" name="id" value="$row->id">
                        <button class="btn success-btn" name='make_super'>Cấp quản lý</button>
                        </form>
                    </td>
                   
                </tr>
STAFF;

    echo $student; 
    }
    
    echo '</table></div>';
}else{
    echo '<div class="mt-4">
        <h1 class="text-md text-center">Nothing available</h1></div>';
}
    
}

if(isset($_POST['make_super'])){
    
    $errors = array();
    
    if(var_set($_POST['staff_id'])){
        $staff_id = intval(strip_tags($_POST['staff_id']));
    }else{
        $errors[] = urlencode("An error occurred. Please try again");
    }
    
    if(var_set($_POST['id'])){
        $id = intval(strip_tags($_POST['id']));
    }else{
        $errors[] = urlencode("An error occurred. Try again");
    }
    
    if(!$errors){
        $stmt = $db_con->prepare("UPDATE employee SET supervisor = 'N/A', 
            staff_level = 'supervisor' WHERE id = ? AND staff_id = ?");
        $stmt->bind_param("ii", $id, $staff_id);
        
        $stmt->execute();
        
        if($db_con->affected_rows == 1){
            redirect_user("admin.php?tab=7");
        }
    }else{
        redirect_user("admin.php?tab=7&error=".join($errors,  urlencode("<br>")));
    }
}