<?php

namespace App\Repositories;

use App\Models\StudentAcademicInfo;

class StudentAcademicInfoRepository {
    public function store($request, $student_id) {
        try {
            StudentAcademicInfo::create([
                'student_id'        => $student_id,
                'board_reg_no'      => $request['board_reg_no'],
            ]);
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException('Failed to create Student academic information. '.$e->getMessage());
        }
    }
}