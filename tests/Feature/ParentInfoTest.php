<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\StudentParentInfo;

class ParentInfoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $parentinfo = StudentParentInfo::factory()->count(3)->make();

        $hasStudentParentInfo = $parentinfo ? true : false;

        $this->assertTrue($hasStudentParentInfo);

    }
}
