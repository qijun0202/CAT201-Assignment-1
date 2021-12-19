<!DOCTYPE html>
<html>
    <head>
        <title>Conversion page</title>
        <link rel="stylesheet" href="./styles/styles.css">
    </head>

    <body background="./images/beach-bridge-dawn-201101.jpg">
        <nav class="navbar">
            <a href="./index.php">
                <h1>PDF to Text Conversion</h1>
            </a>
            <div class="nav-links">
                <a href="./index.php">Home</a>
            </div>
        </nav>
        <div id="header">
            <div class="web_title">
                <marquee><h1>Welcome! PDF to text conversion</h1></marquee>
            </div>
        </div>

        <?php
            $target_dir = "file-upload/";
            $originalName = basename($_FILES["pdfFileToUpload"]["name"]);
            $modifiedName = "original.pdf";
            $target_file = $target_dir . $originalName;
            $documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $convert_dir = "file-converted/";
            $convert_file = "converted.txt";
            $uploadStatus = 1;
            $printMsg = array();
            $dwldLink = "javascript:void(0)";

            // Check if PDF file already exists
            if(file_exists($target_file))
            {
                array_push($printMsg, "Sorry, PDF file already exists.");
                $uploadStatus = 0;
            }

            // Validate PDF file uploaded by user
            if(is_uploaded_file($_FILES["pdfFileToUpload"]["tmp_name"]))
            {
                array_push($printMsg, "Your file has been validated as uploaded file.");
            }

            // Check PDF file size
            if($_FILES["pdfFileToUpload"]["size"] > 10000000)
            {
                array_push($printMsg, "Sorry, your file exceeds the maximum file size.");
                $uploadStatus = 0;
            }

            // Allowed file format
            if($documentFileType != "pdf")
            {
                array_push($printMsg, "Sorry, only PDF file are allowed to upload here.");
                $uploadStatus = 0;
            }

            // Check if $uploadStatus is set to 0 by any validation above
            if($uploadStatus == 0)
            {
                array_push($printMsg, "Sorry, your file failed to upload.");
            }
            else
            {
                if(move_uploaded_file($_FILES["pdfFileToUpload"]['tmp_name'], $target_file))
                {
                    array_push($printMsg, "The file " . htmlspecialchars(basename($_FILES["pdfFileToUpload"]["name"])) . " has been uploaded successfully.");
                    rename($target_dir . $originalName , $target_dir . $modifiedName);
                    shell_exec("java -jar /var/www/qijun0202/out/artifacts/qijun0202_PDFBox_jar/qijun0202-PDFBox.jar");
                    $dwldLink = "/file-converted/converted.txt";
                }
                else
                {
                    array_push($printMsg, "Sorry, there was an error uploading your file to the server. #" . $_FILES["pdfFileToUpload"]["error"]);
                }
            }
            
        ?>

        <div class="file-upload">
            <h2>Status message:</h2>
            <br>
            <h4>
                <?php
                    foreach($printMsg as $msg)
                    {
                        echo "$msg <br>";
                    }
                ?>
            </h4>
            <br>
            <h3>Note: If any error message printed above, the download link below will be not functioning.</h3>
            <div class="download-button">
                <a href="<?php echo $dwldLink ?>" download="<?php echo htmlspecialchars(basename($_FILES["pdfFileToUpload"]["name"], ".pdf"))?>">Download</a>
            </div>
        </div>

        <div class="instruction">
            <h2>Instruction to use this tool to convert PDF file to TXT file</h2>
            <br>
            <ol>
                <li>If no error messages printed above, press 'Download' button to download your file</li>
                <li>If you wanna convert more files, please press 'Home' button on the navigation bar above to redirect back to the upload page.</li>
                <li>Select 'Home' button on the page for further conversion process.</li>
            </ol>
            <br>
            <h2>Thank you for using this tool.</h2>
        </div>

        <footer>
            <h4>This web application is created by: </h4>
            <br>
            <h4>Koh Zhi Hong</h4>
            <h4>Lim Qi Jun</h4>
            <h4>Seow Ding Han</h4>
            <h4>Yeow Kok Guan</h4>
            <br>
            <h5>Disclaimer: This page is created for assignment purpose only and all external images are credited to their copyright owner.</h5>
        </footer>
    </body>
</html>
