<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();

        $this->pdf->SetFillColor(240, 240, 240);
        $this->pdf->Rect(0, 0, 210, 297, 'F');

        $this->pdf->SetFont('Arial', 'B', 20);
        $this->pdf->SetTextColor(34, 34, 34);
        $this->pdf->Cell(0, 10, 'Profile of ' . $profile->getName(), 0, 1, 'C');

        $this->pdf->SetDrawColor(34, 34, 34);
        $this->pdf->Line(10, 30, 200, 30);

        $imageUrl = 'https://www.auf.edu.ph/home/images/articles/bya.jpg'; 
        $imageWidth = 60;
        $this->pdf->Image($imageUrl, (210 - $imageWidth) / 2, 35, $imageWidth);

        $this->pdf->Ln(100);

        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0, 10, 'About:', 0, 1, 'L');

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetTextColor(51, 51, 51);
        $this->pdf->MultiCell(0, 10, $profile->getStory(), 0, 'L');

        $this->pdf->SetY(-15);
        $this->pdf->SetFont('Arial', 'I', 10);
        $this->pdf->Cell(0, 10, 'Page ' . $this->pdf->PageNo(), 0, 0, 'C');
    }

    public function render()
    {
        return $this->pdf->Output();
    }
}
