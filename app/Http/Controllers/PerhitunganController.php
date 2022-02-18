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
        if (count($data[0]) == 0 || count($data[1]) == 0) {
            return redirect()->back()->with('status', 'warning')->with('pesan', "Tidak dapat melihat data Perhitungan jika seluruh data masih kosong!");
        } else {
            return view('perhitungan.index', ['result' => $data[0], 'kriteria_' => $data[1],]);
        }
    }

    public function cetak()
    {
        $data = $this->data();

        $kriteria_ =  $data[1];
        $values = collect([]);
        foreach ($kriteria_ as $kriteria) {
            $value = round(($kriteria->bobot / $kriteria_->pluck('bobot')->sum()), 2);
            $values[] = $value;
        }

        $result_colection = $data[0];
        $nilai = collect([]);
        foreach ($result_colection->groupBy('nama_alternatif') as $keys => $value) {
            foreach ($value as $key => $item) {
                $total = $item->bobot_parameter * ($values ?? collect())->toArray()[$key];
                $total_[$key] = $total;
            }
            $nilai[] = [
                'nama_alternatif' => $keys,
                'nilai_parameter' => $total_,
                'total' => array_sum($total_),
            ];
        }
        if (count($data[0]) == 0 || count($data[1]) == 0) {
            return redirect()->back()->with('status', 'warning')->with('pesan', "Tidak dapat mencetak data Perhitungan jika seluruh data masih kosong!");
        } else {
            $inst_pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', [10, 5, 10, 0]);
            $inst_pdf->pdf->SetTitle('Cetak Data Perhitungan');
            // $inst_pdf->previewHTML(view('perhitungan.cetak', ['result' => $data[0], 'kriteria_' => $data[1], 'nilai' => $nilai]));
            $inst_pdf->writeHTML(view('perhitungan.cetak', ['result' => $data[0], 'kriteria_' => $data[1], 'nilai' => $nilai]));
            $inst_pdf->output("perhitungan.pdf");
        }
    }
}
