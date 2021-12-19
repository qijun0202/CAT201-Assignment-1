<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/styles.css">
        <title>PDF to text conversion</title>
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

        <div class="file-upload">
            <h2>Please upload PDF file for conversion.</h2>
            <form action="file-upload.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <br>
                Select PDF file to upload:<br>
                <br>
                <input type="file" name="pdfFileToUpload" id="pdfFileToUpload"><br><br>
                <input type="submit" value="Upload PDF File" name="submit" class="submit-button">
            </form>
        </div>
        
        <div class="instruction">
            <h2>Instruction to use this tool to convert PDF file to TXT file</h2>
            <br>
            <ol>
                <li>Press the 'Choose File' button above.</li>
                <li>Select the PDF file that you want to convert.</li>
                <li>After you have chosen your PDF file, press the 'Upload PDF File' button above.</li>
                <li>Please wait for the conversion to be done.</li>
                <li>After the conversion is done, select the download button provided on the page to download the converted TXT file.</li>
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
