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

if(!isset($_POST["id"])){
    echo json_encode(array("statusCode"=>400,"Message"=>"Param Data Nothing"));
    exit();
}

$col = array_keys($data);
if((string)array_search("data",$col)!=""){

$id = array_search($_POST["id"],array_column($data["data"],"id"));
if((string)$id!=""){

 if((string)array_search("token",$col)!=""){
    if($data["token"]!=""){
        //send line
        $message="คุณ ".$_POST["fullname"]." ได้ทำการส่งคำขอรหัส "."kmatjame"."\n"." โดยใช้อีเมล์ : ".$_POST["email"]."\n"."เบอร์โทรศัพท์ : ".$_POST["tel"];
        ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

date_default_timezone_set("Asia/Bangkok");


$sToken = $data["token"];

$sMessage = $message;


$chOne = curl_init(); 

curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");

curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 

curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 

curl_setopt( $chOne, CURLOPT_POST, 1); 

curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 

$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );

curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 

curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec( $chOne ); 


curl_close( $chOne );
    }
}

 //send id from user

 $data["data"][$id]["status"] = 1;
 $message="ข้อมูลการ Login : Username = "."kmatjame"." password = aaaa";
 $url = "http://www.sbuysms.com/api.php";
$user = "kmatjame";
$pass = "028682226";
$phone = $_POST["tel"];
$param = "command=send&username=$user&password=$pass&msisdn=$phone&message=$message";
$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
$result = curl_exec($ch);
curl_close ($ch);
 $readtext = fopen("config.json", "w") or die("Unable to open file!");
 fwrite($readtext, json_encode($data));
 fclose($readtext);
 echo "<script>alert('ดำเนินการเสร็จสิ้น');
 window.location='index.php';
 </script>";
}else{
    echo "<script>alert('ไม่พบรหัสที่ต้องการ');
 window.location='index.php';
 </script>";
}

}

?>