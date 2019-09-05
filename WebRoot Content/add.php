<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
 
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {    
    $Name = $_POST['Name'];
    $Favoritecolor = $_POST['Favoritecolor'];
    $Dogs = $_POST['Dogs'];


    // checking empty fields
    if(empty($Name) || empty($Favoritecolor) || empty($Dogs)) {
        if(empty($Name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($Favoritecolor)) {
            echo "<font color='red'>Favorite Color field is empty.</font><br/>";
        }

        if(empty($Dogs)) {
            echo "<font color='red'>Dogs field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {

    //connect to the database
    $check=mysqli_query($mysqli,"select * from data where Name='$Name'");
    $checkrows=mysqli_num_rows($check);


   if($checkrows>0) {
      echo "Name already exist"." ".'<a href="javascript:window.history.go(-1)"> Back  </a> ';
  die();

  }

 else {  



        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO data(name,favorite_color,dogs) VALUES('$Name','$Favoritecolor','$Dogs')");


      mysqli_close($mysqli);
    }
    echo "Customer Added"." ".'<a href="javascript:window.history.go(-1)"> Back  </a> ';
    };
}
  ?>



        
</body>
</html>
