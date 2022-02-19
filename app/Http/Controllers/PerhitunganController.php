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
            "kriteria.id as id_kriteria",
            "alternatif.id as id_alternatif",
            "kriteria.nama as nama_kriteria",
            "alternatif.nama as nama_alternatif",
            "parameter.bobot as bobot_parameter",
        )
            ->join("kriteria", "kriteria.id", "=", "nilai.id_kriteria")
            ->join("parameter", "parameter.id", "=", "nilai.id_parameter")
            ->join("alternatif", "alternatif.id", "=", "nilai.id_alternatif")
            ->get();
        $kriteria_ = Kriteria::select('id', 'nama', 'bobot')->get();

        $kriteria_->map(function ($item) use ($kriteria_) {
            $item['normalisasi'] = ($item['bobot'] / $kriteria_->pluck('bobot')->sum());
            return $item;
        });

        $nilai = collect();
        foreach ($result->groupBy('nama_alternatif') as $keys => $value) {
            $total = collect();
            $bobot = collect();
            foreach ($value as $item) {
                $bobot->push($item->bobot_parameter);
                $total->push($item->bobot_parameter * $kriteria_->firstWhere('id', $item->id_kriteria)->normalisasi);
            }
            $nilai->push([
                'nama_alternatif' => $keys,
                'bobot_parameter' => $bobot,
                'nilai_parameter' => $total,
                'total' => $total->sum(),
            ]);
        }

        return collect(['result' => $result, 'kriteria' => $kriteria_, 'nilai' => $nilai]);
    }

    public function tampil()
    {
        $data = $this->data();
        $data->map(function ($value) {
            if (count($value) == 0) {
                return redirect()->back()->with('status', 'warning')->with('pesan', "Tidak dapat melihat data Perhitungan jika seluruh data masih kosong!");
            }
        });
        if (request('v') == 2) {
            return view('perhitungan.index2', ['kriteria_' => $data['kriteria'], 'nilai' => $data['nilai']]);
        } else {
            return view('perhitungan.index', ['result' => $data['result'], 'kriteria_' => $data['kriteria'], 'nilai' => $data['nilai']]);
        }
    }

    public function cetak()
    {
        $data = $this->data();
        $data->map(function ($value) {
            if (count($value) == 0) {
                return redirect()->back()->with('status', 'warning')->with('pesan', "Tidak dapat mencetak data Perhitungan jika seluruh data masih kosong!");
            }
        });

        $kriteria_ =  $data['kriteria'];
        $values = collect([]);
        foreach ($kriteria_ as $kriteria) {
            $value = round(($kriteria->bobot / $kriteria_->pluck('bobot')->sum()), 2);
            $values[] = $value;
        }

        $result_colection = $data['result'];
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

        $content = view('perhitungan.cetak', ['result' => $data['result'], 'kriteria_' => $data['kriteria'], 'nilai' => $nilai]);
        $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', [10, 5, 10, 0]);
        $html2pdf->pdf->SetTitle('Cetak Data Perhitungan');
        // $html2pdf->previewHTML($content);
        $html2pdf->writeHTML($content);
        $html2pdf->output("perhitungan.pdf");
    }
}
