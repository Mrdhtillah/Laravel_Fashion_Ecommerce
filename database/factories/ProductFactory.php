<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'id' => $this->faker->integer,
            'product_name' => $this->faker->name,
            // 'slug' => Str::slug($this->faker->name),
            'description' => $this->faker->text,
            'price' => $this->faker->integer,
            'quantity' => $this->faker->integer,
            'image' => $this->faker->text,

            // 'name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'role' => 'customer',
            // 'status' => '1',
            // 'remember_token' => Str::random(10),

        ];
    }
}
