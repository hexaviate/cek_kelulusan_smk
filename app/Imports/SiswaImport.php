<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row[0],
            'nama' => $row[1],
            'kelas' => $row[2],
            'setting_id' => $row[3],
            'bebas_perpus' => $row[4],
            'akademik' => $row[5],
            'administrasi' => $row[6],
            'lap_ta' => $row[7],
            'lap_pkl' => $row[8],
            'keterangan' => $row[9],
            'viewed' => $row[10],
        ]);
    }
}
