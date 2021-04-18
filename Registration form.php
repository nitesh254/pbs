<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Samarpan Ek Prayas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
    body {
  font-family: 'Abel', sans-serif;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container2 {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  width: 100%;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-family: 'Abel', sans-serif;
}

input {
  width: 100%
}

label {
  margin-bottom: 10px;
  display: block;
  font-family: 'Abel', sans-serif;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #006e51;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #006e51;
  color: white;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}


button:hover {

} 
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  
  .col-25 {
    margin-bottom: 20px;
  }
}
<
  </style>


  </head>
  <body>
    <div class="container">
     <div class="row">
 
    <div class="container2">
      <form action="upload.php" method="post" enctype="multipart/form-data">
      
        <div class="row" id="contact">
          

          <div class="col-50">
        
           
            
           <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
            <label for="name">Full Name</label>
           <input type="text" id="first name" name="first name" placeholder="First Name">
           </div>
             <div class="col-lg-12">
            <label for="name">Email Id</label>
           <input type="text" id="name" name="name" placeholder="Full Name">
           </div>
           <div class="col-lg-12">
            <label for="mnum">Mobile Number</label>
            <input type="text" id="mnum" name="mnum" placeholder="Mobile Number">
            </div>
             <div class="col-lg-9 col-md-9 col-sm-9">
            <label for="name">Select image to upload:</label>
             <input type="file" name="fileToUpload" id="fileToUpload" style="width: 100%;">
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12">
          <br>
          <input type="submit" value="Upload Image" name="submit">
           </div>
               <div class="col-lg-12">
            <input type="submit" value="Submit" class="btn">
            </div>   
        
      </form>
  </div>
  </div>
</div>
</body>
</html>