<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Demo</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<script>
    var isshow = false;
    function goto(x){
        window.location="detail.php?id="+x;
    }
    $(function(){
        $("#menu").click(function(ev){
           if(isshow==false){

               document.getElementById("menu").className="glyphicon glyphicon-remove";
               document.getElementById("nav").className="nav nav-show";
               isshow = true;
           }else{
            document.getElementById("menu").className="glyphicon glyphicon-align-justify";
            document.getElementById("nav").className="nav nav-hide";
               isshow = false;
           }
            ev.preventDefault();
        })
    })
</script>
</head>
<body>
<div class="logo">
    <img src="images/Logo.png" class="icon">
    <div class="right-menu">
        <l id="menu" class="glyphicon glyphicon-align-justify"></l>
    </div>
</div>    
<nav id="nav" class="nav">
    <ul>
        <li>
            <a href="#">หน้าหลัก</a>
        </li>
        <li>
        <a href="#"> รหัสเกมส์</a>
        </li>
        <li>
        <a href="#"> เครดิต</a>
        </li>
        <li>
        <a href="#">วิธีสั่งซื้อ</a>
        </li>
        <li>
        <a href="#"> ติดต่อเรา</a>
        </li>
    </ul>
    <div class="search">
        <label>
        <input placeholder="ค้นหารายการ" type="text" class="form-control">
        </label>
    </div>
</nav>
<div class="content">
    <div class="bg">
    
<div class="slidebar">
        <div class="icon"><img width="100%;" height="100%;" src="images/freefire-icon.png"></div>
            
        <div class="icon"><img width="100%;" height="100%;" src="images/pb-icon.png"></div>

        <div class="icon"><img  width="100%;" height="100%;" src="images/pubgm-icon.png"></div>
        <div class="icon"><img width="100%;" height="100%;" src="images/rov-icon.png"></div>
        <div class="icon"><img width="100%;" height="100%;" src="images/overwatch-icon.png"></div>
        <div class="icon"><img width="100%;" height="100%;" src="images/speed-icon.png"></div>
        <div class="icon"><img width="100%;" height="100%;" src="images/callof-icon.png"></div>
    </div>
    <div class="left-ch">
                <img width="100%;" height="100%;" src="images/ch.png">
            </div>

            <div class="right-ch">
                <img width="100%;" height="100%;" src="images/ch2.png">
            </div>
        <div class="screen-text">
           <b>
       <font color="red">WWW.RIZERSHOP.COM</font>
       </b>
       <br/>
        แจ้งเตือนจากทางเว็บไซต์<br/>
WWW.RIZERSHOP.COM สั่งซื้อทุกครั้งเช็คเว็บก่อนสั่งทุกครั้งเช่น<br/>
<b>
<font color="red">.ONLINE .PE.HU .GA .HOL.ES .FREESITE.VIP และ .WEP.APP</font>
</b>
<br/>
ลิ้งจริงจะต้องลงท้ายด้วย .COM เท่านั่น เว็บไซต์จริง RIZERSHOP.COM เท่านั่น<br/>
ดูลายน้ำลิ้งกับลายน้ำตรงกันหรือไม่ก่อนสั่งทุกครั้ง
        </div>
        </div>

        <div class="item-frame">
            <?php
            $data = array();
            if(file_exists("config.json")){
                $myfile = fopen("config.json", "r") or die("Unable to open file!");
                $txt = fread($myfile,filesize("config.json"));
                if($txt!=""){
                    $data = json_decode($txt,true);
                }
    
                fclose($myfile);
            }
            foreach($data["data"] as $result){
        ?>
    <div class="item">
    <?php
       $btn="";
       if($result["status"]=="1"){
           $btn="disabled";
           ?>
        <div class="tab">
        <i class="glyphicon glyphicon-exclamation-sign"></i>    
        <br/>
        จำหน่ายแล้ว</div>
        <?php }?>
        
    <div class="rowspart">
      
    <div>
    <img width="100%;" height="100%;" src="images/<?php echo $result["images"];?>"></div>
    <div class="rowspart-content">
       <button onclick="javascript:goto('<?php echo $result["id"];?>');" <?php echo $btn;?> class="btn btn-danger">
       <i class="glyphicon glyphicon-shopping-cart"></i>    
       สั่งซื้อ</button>
 
    </div>
    </div>

    </div>
    <?php }?>
    
   

</div>

</div>
<footer>
    <div>
    COPY RIGHT By RIZERSHOP.COM © 2021-2022
    </div>
    <div  class="t-hide">
    WWW.RIZERSHOP.COM
    </div>
    <div>
    <img src="images/Logo.png">
    </div>
</footer>



</body>
</html>
