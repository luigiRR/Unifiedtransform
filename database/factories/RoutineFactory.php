<?php

namespace Database\Factories;

use App\Models\Routine;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoutineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Routine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start' => '08:00 am',
            'end' => '10:00 pm',
            'weekday' => 'Monday',
            'class_id' => 'clase 2',
            'section_id' => 'seccion 2',
            'course_id' => 'matematica',
            'session_id' => 'sesion 2'
        ];
    }
}
