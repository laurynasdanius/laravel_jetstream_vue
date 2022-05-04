<?php

namespace Database\Factories;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class WorkspaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workspace::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'workspace_name' => $this->faker->unique()->word(),
            'workspace_description' => $this->faker->unique()->sentence($nbWords = 3, $variableNbWords = true),
            'workspace_user_id' => $this->faker->numberBetween(1,1)
        ];
    }
}
