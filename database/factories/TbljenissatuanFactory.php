<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tbljenissatuan>
 */
class TbljenissatuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idsatuan' => $this->faker->words(3, true),
            'deskripsi' => $this->faker->paragraph()
        ];
    }
}
