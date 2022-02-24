<?php
// Include the database configuration file
include 'database_connection.php';
$status = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $fileName;
$fileType = pathinfo($fileName,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow only image formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db_connection->query("INSERT into mc (file_name, date_upload) VALUES ('".$fileName."', NOW())");
            if($insert){
                $status = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $status = "File upload failed, please try again.";
            } 
        }else{
            $status = "Sorry, there was an error uploading your file.";
        }
    }else{
        $status = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
    }
}else{
    $status = 'Please select a file to upload.';
}

// Display status message
echo $status;
?>