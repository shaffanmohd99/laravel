<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            // 'user_id' => 1,
            'title' => 'factory test',
            'description' => 'testing123 1231 123',
            'priority_level_id'=>1,
            'status_type_id' => 1,
            'category_id' => 1,
        ];
    }
}
