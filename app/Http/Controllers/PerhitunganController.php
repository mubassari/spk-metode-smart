<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Nilai;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class PerhitunganController extends Controller
{
    private function data()
    {
        $result = Nilai::select(
            "kriteria.nama as nama_kriteria",
            "alternatif.id as id_alternatif",
            "alternatif.nama as nama_alternatif",
            "parameter.bobot as bobot_parameter"
        )
            ->join("kriteria", "kriteria.id", "=", "nilai.id_kriteria")
            ->join("parameter", "parameter.id", "=", "nilai.id_parameter")
            ->join("alternatif", "alternatif.id", "=", "nilai.id_alternatif")
            ->get();
        $kriteria = Kriteria::all();

        return array($result, $kriteria);
    }

    public function tampil()
    {
        $data = $this->data();

        return view('perhitungan.index', ['result' => $data[0], 'kriteria_' => $data[1],]);
    }

    public function cetak()
    {
        $data = $this->data();
        $content = view('perhitungan.cetak', ['result' => $data[0], 'kriteria_' => $data[1]]);

        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'en');
            $html2pdf->pdf->setDisplayMode('fullpage');
            // $html2pdf->setDefaultFont('Serif');
            $html2pdf->writeHTML($content);
            $html2pdf->output('example01.pdf');
        } catch (Html2PdfException $th) {
            $formatter = new ExceptionFormatter($th);
            echo $formatter->getHtmlMessage();
        }
        
        // return $content;
    }
}
