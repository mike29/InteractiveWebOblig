

<?php

$upload_checker;
//the folder where the uploaded file be saved
$target_dir = "uploaded/";
// folder to be uploaded and file name together
$target_file = $target_dir . basename($_FILES["theFile"]["name"]);
//echo $target_file;
//file type
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//echo $imageFileType;


//the file name only
$the_file_name = $_FILES["theFile"]["name"];
//the file type only
$file_type = $_FILES["theFile"]["type"];
//the file size
$file_size = $_FILES["theFile"]["size"];
//temporarly saved place before redirected to the folder or database
$tmp_file = $_FILES["theFile"]["tmp_name"];
//error
$upload_error = $_FILES["theFile"]["error"];

/*
//TEST THE ABOVE VARIABLES
echo $target_dir;
echo $the_file_name;
echo $file_type;
echo $file_size;
echo $tmp_file;
echo $upload_error;
*/

//DROP ERROR MESSAGE 
if(isset($_POST["submit"])) {
    if ($upload_error != 0){
        die ("Error uploading file! $error.");
            echo "UPLOADING FAILED!";
                $upload_checker = 1;
    }
    
}

// CHECK IF THE FILE EXISTS
if (file_exists($target_file)) {
    echo "SAME FILE CAN NOT BE UPLOADED MULITPLE TIMES";
    $upload_checker = 1;
}

if ($file_size > 500000) {
    echo "UPLOADING FAILED! MAX FILE SIZE IS 500000 MB.";
   $upload_checker = 1;
}

//FILE FORMAT CHECKER
if($file_type != "jpg" && $file_type!= "pdf" && $file_type != "png" && $file_type != "jpeg"
&& $file_type != "gif" ) {
    echo "Only JPG, PDF, JPEG, PNG & GIF files are allowed.";
    $upload_checker = 1;
}


// Check if $uploadOk is set to 0 by an error
if ($upload_checker != 1) {
    echo "FILE UPLOAD FAILED!";
    echo $error;
// if everything is ok, try to upload file
} 
if ( $upload_checker == 1) {
    

	//Deklarer databasevariabler
	$db_name = "*";
	$db_user = "*";
	$db_pass = "*";
	$db_host = "*";
	
	//Opprette en databasetilkobling
	$db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	
	//Skriv ut (eventuell) feilmelding
	if($db_conn->connect_error) {
		die('Tilkoblingsfeil #' . $db_conn->connect_errno . ': ' . $db_conn->connect_error);
	} 
	else {
		//En hurra-melding
		echo "Tilkoblet: " . $db_conn->host_info;
	}

   
    move_uploaded_file( $tmp_file, $target_file);

  //  echo "HERE: target: $the_file_name size: $file_size type: $file_type" ;
    
}
 /*   if (move_uploaded_file( $tmp_file, $target_file)) {  
        echo "THE FILE IS SUCCESFULLY UPLOADED.";
    } */
    
    
    else {
        echo "UPLOADING FAILED!";
        echo $error;
    }

