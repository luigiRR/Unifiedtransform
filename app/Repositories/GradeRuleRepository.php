<?php

namespace App\Repositories;

use App\Models\GradeRule;

class GradeRuleRepository {
    public function store($request) {
        try {
            GradeRule::create($request);
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException('Failed to create grading system rule. '.$e->getMessage());
        }
    }

    public function delete($id) {
        try {
            GradeRule::destroy($id);
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException('Failed to delete grading system rule. '.$e->getMessage());
        }
    }

    public function getAll($session_id, $grading_system_id) {
        return GradeRule::with('gradingSystem')->where('grading_system_id', $grading_system_id)
                    ->where('session_id', $session_id)
                    ->get();
    }
}