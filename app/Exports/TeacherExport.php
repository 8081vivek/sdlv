<?php

namespace App\Exports;

use App\Models\teacher_panel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeacherExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return teacher_panel::all();
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->dob,
            $row->gender,
            $row->email,
            $row->password,
            $row->phone,
            $row->nationality,
            $row->gid,
            $row->address,
            $row->city,
            $row->state,
            $row->pincode,
            $row->hqualification,
            $row->ssubjects,
            $row->bed,
            $row->experience,
            $row->subjects,
            $row->classes,
            $row->resume,
            $row->certificates,
            $row->idproof,
            $row->photo,
            $row->type,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Date of Birth',
            'Gender',
            'Email',
            'Password',
            'Phone',
            'Nationality',
            'GID',
            'Address',
            'City',
            'State',
            'Pincode',
            'Highest Qualification',
            'Special Subjects',
            'B.Ed',
            'Experience',
            'Subjects',
            'Classes',
            'Resume',
            'Certificates',
            'ID Proof',
            'Photo',
            'Type',
        ];
    }
}
