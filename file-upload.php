<!DOCTYPE html>
<html>
<head>
    <title>Processing conversion...</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php
    //phpinfo();
    $target_dir = "file-upload/";
    $originalName = basename($_FILES["pdfFileToUpload"]["name"]);
    $modifiedName = "original.pdf";
    $target_file = $target_dir . $originalName;
    $documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $convert_dir = "file-converted/";
    $convert_file = "converted.txt";
    $uploadStatus = 1;
    
    // Check if PDF file already exists
    if(file_exists($target_file))
    {
        echo "Sorry, PDF file already exists.";
        echo "<br>";
        $uploadStatus = 0;
    }

    // Validate PDF file uploaded by user
    if(is_uploaded_file($_FILES["pdfFileToUpload"]["tmp_name"]))
    {
        echo "Your file has been uploaded successfully.";
        echo "<br>";
    }

    // Check PDF file size
    if($_FILES["pdfFileToUpload"]["size"] > 10000000)
    {
        echo "Sorry, your file exceeds the maximum file size.";
        echo "<br>";
        $uploadStatus = 0;
    }

    // Allowed file format
    if($documentFileType != "pdf")
    {
        echo "Sorry, only PDF file are allowed to upload here.";
        echo "<br>";
        $uploadStatus = 0;
    }

    // Check if $uploadStatus is set to 0 by any validation above
    if($uploadStatus == 0)
    {
        echo "Sorry, your file failed to upload.";
        echo "<br>";
    }
    else
    {
        if(move_uploaded_file($_FILES["pdfFileToUpload"]['tmp_name'], $target_file))
        {
            echo "The file " . htmlspecialchars(basename($_FILES["pdfFileToUpload"]["name"])) . " has been uploaded.";
            echo "<br>";
            rename($target_dir . $originalName , $target_dir . $modifiedName);
            shell_exec("java -jar /var/www/qijun0202/out/artifacts/qijun0202_PDFBox_jar/qijun0202-PDFBox.jar");
        }
        else
        {
            echo "Sorry, there was an error uploading your file to the server. #" . $_FILES["pdfFileToUpload"]["error"];
            echo "<br>";
        }
    }
    ?>

    <div class="download-link-button">
        <a href="/file-converted/converted.txt" download="<?php echo htmlspecialchars(basename($_FILES["pdfFileToUpload"]["name"], ".pdf"))?>">Download your converted text file here</a>
    </div>

    </body>
</html>
