<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มไฟล์</title>
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
          
			  <h4>เพิ่มไฟล์</h4>
          </div>
          <form method="post" action="">
          <label>URL</label>
          <input class="form-control" type="url" name="url">
          <label>NAME</label>
          <input class="form-control" type="name" name="name">
          <label></label>
          <input class="form-control btn btn-primary" type="submit" name="submit" >
          </form>
          <?php 
if ($_POST==true) {
    //The URL of the file that you want to download.
$url = $_POST['url'];
$fileName = $_POST['name'];
$filetype = $fileName.".m4a";
//Download the file using file_get_contents.
$downloadedFileContents = file_get_contents($url);

//Check to see if file_get_contents failed.
if($downloadedFileContents === false){
    throw new Exception('Failed to download file at: ' . $url);
}

//The path and filename that you want to save the file to.

//Save the data using file_put_contents.
$save = file_put_contents("./file/".$filetype, $downloadedFileContents);

//Check to see if it failed to save or not.
if($save === false){
    throw new Exception('Failed to save file to: ' , $filetype);
}else {
    echo "success";
}
}

?>
<br>
  </div>
</div>
</center>
</body>
</html>