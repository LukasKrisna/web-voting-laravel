<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportPemilih implements ToModel, WithHeadingRow
{
    use HasFactory;

    public function model(array $row)
    {
        return new User([
            'nama' => $row['nama'],
            'username' => $row['username'],
            'password' => $row['password'],
        ]);
    }
}
