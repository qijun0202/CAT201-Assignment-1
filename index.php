<!DOCTYPE html>
<html>
    <head>
        <title>PDF to text conversion</title>
    </head>
    
    <body>
        <section class="header">
            <div class="web_title">
                <h1>Welcome! PDF to text conversion</h1>
            </div>
        </section>

        <div class="file-upload">
            <h2>Please upload PDF file for conversion.</h2>
            <form action="file-upload.php" method="post" enctype="multipart/form-data">
                Select PDF file to upload:<br>
                <br>
                <input type="file" name="pdfFileToUpload" id="pdfFileToUpload"><br><br>
                <input type="submit" value="Upload PDF File" name="submit">
            </form>
        </div>
            
        <section class="footer">
            <h5>Disclaimer: This page is created for assignment purpose only and any </h5>
        </section>
    </body>
</html>
