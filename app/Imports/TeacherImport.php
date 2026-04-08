<?php

namespace App\Imports;

use App\Models\teacher_panel;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new teacher_panel([
            //
        ]);
    }
}
