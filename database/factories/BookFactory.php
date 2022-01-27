<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'fecha_publicacion' => $this->faker->date(),
            'autor' => $this->faker->name(),
            'link_descarga' => $this->faker->url
        ];
    }
}
