import java.io.File;
import java.io.IOException;

import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;

public class ExtractText
{
    public static void main(String[] args) throws IOException
    {
        //Load pdf file uploaded by user through form
        File originalPDF = new File("D:/USM & PTPTN/Sem 3 Materials/CAT201 Integrated Software Development Workshop/Assignment/CAT201_2021-assignment1.pdf");
        PDDocument PDFdocument = PDDocument.load(originalPDF);

        //Instantiate PDFTextStripper class
        PDFTextStripper extractText = new PDFTextStripper();

        //Extract text from uploaded PDF document
        String text = extractText.getText(PDFdocument);
        System.out.println(text);

        //Closing the document
        PDFdocument.close();
    }
}