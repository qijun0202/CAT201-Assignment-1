<?php
$target_dir = "file-upload/";
$target_file = $target_dir . basename($_FILES["pdfFileToUpload"]["name"]);
$uploadStatus = 1;
$documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if PDF file already exists
if(file_exists($target_file))
{
    echo "Sorry, PDF file already exists.";
    $uploadStatus = 0;
}

// Validate PDF file uploaded by user
if(is_uploaded_file($_FILES["pdfFileToUpload"]["tmp_name"])
{
    echo "Your file has been uploaded successfully.";
}

// Check PDF file size
if($_FILES["pdfFileToUpload"]["size"] > 100000)
{
    echo "Sorry, your file exceeds the maximum file size.";
    $uploadStatus = 0;
}

// Allowed file format
if($documentFileType != "pdf")
{
    echo "Sorry, only PDF file are allowed to upload here.";
}