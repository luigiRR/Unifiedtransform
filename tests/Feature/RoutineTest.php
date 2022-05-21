<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Routine;

class RoutineTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $routine = Routine::factory()->count(2)->make();

        $hasRoutine = $routine ? true : false;

        $this->assertTrue($hasRoutine);

    }
}
