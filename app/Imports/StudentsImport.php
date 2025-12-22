<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'student_code' => $row[0],
            'student_name' => $row[1],
            'course'       => $row[2],
            'branch_name'  => $row[3],
            'status'       => $row[4] ?? 'active',
        ]);
    }
}
