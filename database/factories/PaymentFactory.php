<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        $number = $this->faker->numberBetween(1, 100000);
        return [
            'user_id' => 1, // Admin User
            'title' => 'Payment: ' . $number,
            'description' => 'Payment for item: ' . $number,
            'amount' => $this->faker->numberBetween(100, 100000),
            'payment_date' => $this->faker->date
        ];
    }
}
