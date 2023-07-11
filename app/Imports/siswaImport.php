<?php

namespace App\Imports;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class siswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nim'     => $row[0],
            'nama'    => $row[1],
            'univ'    => $row[2],
            'jurusan'    => $row[3],
            'jenis_kelamin'    => $row[4],
            'alamat'    => $row[5]
        ]);
    }
}
