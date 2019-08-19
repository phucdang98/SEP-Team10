<?php

 include_once("header.php");
    
if(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] !== ""){

    $username = $_SESSION['admin-user'];

    $id = $_SESSION['admin-id'];

    $result = $db_con->query("SELECT * FROM admin WHERE username = '$username'");

    if($result->num_rows == 1){
        
        $row = $result->fetch_object();
        
        $fullname = $row->fname." ".$row->lname;
        
    }

    include_once("dash-header.php");
   
     echo "<div class='col-md-8 ml-md-3'>"
    . "<div class='main-content'>";
      show_alert();
    
   
    $date_posted = date('Y-m-d');

    $time_posted = date('h:m:sa',time());

    if(isset($_GET['tab']) && $_GET['tab'] == 1){

        $leave_types = ['sick'=>"Nghỉ bệnh",'maternity'=>'Nghỉ thai sản','study'=>'Nghỉ tập huấn','emergency'=>'Nghỉ đột xuất'];
    
        echo "<h1 class='text-center hide'>Hình thức nghỉ mới</h1>

                <form action='leaves.php' method='post' class='mb-5'>
                
                    <label for='leave-type'>Hình thức nghỉ</label><br>
                    <select name='leave_type' id='leave-type' class='selectable' required>
                        <option value=''>---Select---</option>";
        
                    foreach($leave_types as $key=>$value){
                        echo "<option value='$key'>$value</option>";
                    }
                    unset($leave_types);

                    $leave_id = rand(10, 20).date("U");
                    
                    $date_now = date("U")+2591590;
                    
                    $auto_date = date("U") + 2591590;

                    $dif = intval($date_now) - intval($auto_date);
                    
                    echo "</select><hr>
                
                    <label for='title'>Ngày được phép nghỉ thường niên</label><br>
                            
                    <input type='number' min='0' name='allowed_days' id='days' required><br>
                    <div id='hint' class='hide text-red'>
                    
                        <ul style='list-style-type:none;font-size:13px;'><br>
                            <b>Chú thích:</b>
                            <li> 0 nghĩa là không xác định</li>
                            <li> 1 trở lên là quy định</li>
                        </ul>
                    </div><hr>
                    <label for='title'>Số ngày được phép nghỉ trong tháng</label><br>
                            
                    <input type='number' min='1' name='allowed_monthly_days' required>
                    
                    <input type='hidden' name='leave_id' value='$leave_id'>
                    <input type='hidden' name='auto_update' value='$auto_date'>
                    <hr>
                    

                    <hr><button class='btn btn-primary ml-md-5' name='new_leave'>Công bố</button>

                </form><hr><br>";

    }elseif(isset($_GET['tab']) && $_GET['tab'] == 2){

        include_once("approve.php");
        
    }elseif(isset($_GET['tab']) && $_GET['tab'] == 3){

        include_once("pending-leaves.php");
        
    } elseif(isset($_GET['tab']) && $_GET['tab'] == 4){

        include_once("account.php");
        
    } elseif(isset($_GET['tab']) && $_GET['tab'] == 5){

        include_once("assign.php");
        
    }elseif(isset ($_GET['tab']) && $_GET['tab'] == 6){
        include("desc.php");
    }elseif(isset ($_GET['tab']) && $_GET['tab'] == 7){
        include("new.php");
     }elseif(isset ($_GET['tab']) && $_GET['tab'] == 8){
        include("leave-meta.php");
    }else{
    $kamil = <<<FMS
        <div class="container mb-5 p-4">
            
            Quản lý nghỉ phép trang admin
     </div>
FMS;
    echo $kamil;
    }

    echo "</div></div>";
    ?>
    <script src="js/jquery.js"></script>

    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#days').on('change input', function(){
            
            var val = $(this).val();
            
            if(val !== ''){
                $("#hint").removeClass("hide");
            }else{
                
                $('#hint').addClass("hide");
            }
        });
        
    </script>
        
    </body>
    </html>
    <?php
}else{
    header("Location:index.php?action=login&type=admin");
}

include("footer.php");
?>