import java.io.File;
import java.io.PrintWriter;
import java.io.IOException;

import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;

public class ExtractText
{
    public static void main(String[] args) throws IOException
    {
        // Load pdf file uploaded by user through form
        File originalPDF = new File("/var/www/qijun0202/file-upload/original.pdf");
        PDDocument PDFdocument = PDDocument.load(originalPDF);

        // Create new text file to store the converted text in txt file
        File convertTxt = new File("/var/www/qijun0202/file-converted/converted.txt");

        /* Check whether the file existed or not
        if(!convertTxt.exists())
        {
            convertTxt.createNewFile();
        }*/

        // Instantiate PrintWriter class
        PrintWriter pw = new PrintWriter(convertTxt);

        // Instantiate PDFTextStripper class
        PDFTextStripper extractText = new PDFTextStripper();

        // Extract text from uploaded PDF document
        String text = extractText.getText(PDFdocument);

        // Print text into text file;
        pw.print(text);

        // Closing the document
        PDFdocument.close();
        pw.close();
    }
}
