<?php
include("header.php");

if(session_id() == ""){
    redirect_user("login.php");
}

$members = array("Phúc Đặng"=>"T160114","Trường Đạo"=>"...",
    "Quốc Nghị"=>"...","Quang Minhh"=>"...",
        "Hoàng Tài"=>"...");
?>
<div class="container my-5">
    <div class="card">
        <table class="table table-bordered table-responsive-xl">
            <thead class="thead-light">
           
            <th>Name</th>
            <th>ID</th>
            </thead>
            
            <?php
            foreach($members as $key=>$value){
                
            echo "<tr><td>$key</td><td>$value</td></tr>";
            
            }
        echo "</table>      
            
    </div>
</div>";
        ?>
