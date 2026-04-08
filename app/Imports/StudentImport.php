<?php

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Student([
            'name'   => $row['name'],
            'email'  => $row['email'],
            'mobile' => $row['mobile'],
            'address'=> $row['address'],
            'course' => $row['course'],
            
        ]);
    }
}

?>