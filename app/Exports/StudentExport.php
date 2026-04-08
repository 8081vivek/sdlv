<?php

namespace App\Exports;

use App\Models\student_panel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // 🔹 select() hata diya – direct all()
        return student_panel::all();
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->dob,
            $row->gender,
            $row->email,
            $row->religion,
            $row->phone,
            $row->pschool,
            $row->nationality,
            $row->address,
            $row->city,
            $row->state,
            $row->pincode,
            $row->class,
            $row->lclass,
            $row->stream,
            $row->fname,
            $row->foccupation,
            $row->mname,
            $row->moccupation,
            $row->tc,
            $row->idproof,
            $row->photo,
            $row->fpic,
            $row->status,
            $row->rdate,
            $row->roll_number,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Student Name',
            'Date of Birth',
            'Gender',
            'Email',
            'Religion',
            'Phone',
            'Previous School',
            'Nationality',
            'Address',
            'City',
            'State',
            'Pincode',
            'Class',
            'Last Class',
            'Stream',
            'Father Name',
            'Father Occupation',
            'Mother Name',
            'Mother Occupation',
            'TC',
            'ID Proof',
            'Photo',
            'Father Photo',
            'Status',
            'Registration Date',
            'Roll Number',
        ];
    }
}
