<?php session_start(); /* Starts the session */

function getIP(){
    // ตรวจสอบ IP กรณีการใช้งาน share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$visitorIP = getIP();

/* Check Login form submitted */	
if(isset($_POST['Submit'])){
  /* Define username and associated password array */
  $logins = array('test' => 'a1234','' => '');
  
  /* Check and assign submitted Username and Password to new variable */
  $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
  
  /* Check Username and Password existence in defined array */		
  if (isset($logins[$Username]) && $logins[$Username] == $Password){
   /* Success: Set session variables and redirect to Protected page  */
   $_SESSION['UserData']['Username']=$logins[$Username];
	  $result = curl_exec( $chOne ); 
  //Result error 
if(curl_error($chOne)) 
{ 
  echo 'error:' . curl_error($chOne); 
} 
else { 
  $result_ = json_decode($result, true); 
} 
curl_close( $chOne );
   header("location:index.php");
   exit;
 } else {
	  ini_set('display_errors', 1);
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
  //Result error 
if(curl_error($chOne)) 
{ 
  echo 'error:' . curl_error($chOne); 
} 
else { 
  $result_ = json_decode($result, true); 
} 
curl_close( $chOne );
   $msg="<span style='color:red'>ชื่อผู้ใช้หรือรหัสผ่านผิด</span>";
 }
}
  
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>
<center>
<div class="card col-md-4">
  <div class="card-body">
	  
	  <div class="col-sm-13" align="left">
			  <h4><svg class="bi bi-life-preserver" width="1em" height="1em" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M8 11a3 3 0 100-6 3 3 0 000 6zm0 1a4 4 0 100-8 4 4 0 000 8z" clip-rule="evenodd"/>
  <path d="M11.642 6.343L15 5v6l-3.358-1.343A3.99 3.99 0 0012 8a3.99 3.99 0 00-.358-1.657zM9.657 4.358L11 1H5l1.343 3.358A3.985 3.985 0 018 4c.59 0 1.152.128 1.657.358zM4.358 6.343L1 5v6l3.358-1.343A3.985 3.985 0 014 8c0-.59.128-1.152.358-1.657zm1.985 5.299L5 15h6l-1.343-3.358A3.984 3.984 0 018 12a3.99 3.99 0 01-1.657-.358z"/>
</svg> เข้าสู่ระบบ</h4>
			  
		  </div>
<form action="" method="post" name="Login_Form">
	    <div class="form-group">
	      <label for="exampleInputEmail1"><svg class="bi bi-person-fill" width="1.2em" height="1.2em" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
</svg> ชื่อผู้ใช้</label>
	      <input name="Username" type="text" class="form-control"  placeholder="Username" required>
	      </div>
	    <div class="form-group">
	      <label for="exampleInputPassword1"><svg class="bi bi-lock-fill" width="1.2em" height="1.2em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <rect width="11" height="9" x="2.5" y="7" rx="2"/>
  <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z" clip-rule="evenodd"/>
</svg> รหัสผ่าน</label>
	      <input name="Password" type="password"  class="form-control" placeholder="Password" required>
      </div>
	<div><input name="Submit" type="submit" value="Login" class="btn btn-primary"></div> 
    <div class="col-sm-13" align="left">
<?php if(isset($msg)){?>
        <h6><?php echo $msg;?></h6>
<?php } ?>
		
	</div>
	  </form>
	  
  </div>
</div>
</center>
</body>
</html>