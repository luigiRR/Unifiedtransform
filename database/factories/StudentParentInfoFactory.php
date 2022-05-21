<?php

namespace Database\Factories;

use App\Models\StudentParentInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentParentInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentParentInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => 1,
            'father_name' => $this->faker->name(),
            'father_phone' => '951852746',
            'mother_name' => $this->faker->name(),
            'mother_phone' => '963148456',
            'parent_address' => $this->faker->address(),
        ];
    }
}
