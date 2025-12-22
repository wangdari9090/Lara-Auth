<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Student::select('student_code', 'student_name', 'course', 'branch_name', 'status', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'Student Code',
            'Student Name',
            'Course',
            'Branch Name',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
