<?php

namespace Database\Factories;

use App\Models\DemoList;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemoListFactory extends Factory
{
    protected $model = DemoList::class;

    public function definition()
    {
        return [
            'TaskName' => $this->faker->word, // Örneğin bir isim
            'TaskAbout' => $this->faker->sentence, // Bir açıklama
            'TaskStatus' => $this->faker->boolean, // true veya false döner
            'TaskDelete' => $this->faker->boolean, // true veya false döner
        ];
    }
}
