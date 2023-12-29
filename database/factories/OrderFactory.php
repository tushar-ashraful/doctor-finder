<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => Order::newSku(),
            'university_id' => 1,
            'title' =>  $this->faker->title(),
            'description' => $this->faker->text(),
            'supervisor' => 'Demo supervisor Name',
            'supervisor_phone' => '01886180101',
            'name' => 'Demo Biller Name',
            'phone' => '01886180101',
            'members' => '[{"member_id": null,"member_name": null,"member_phone": null, }]',
            'delivery' => now(),
            'delivery_at' => now(),
            'status' => Order::DELIVERED,
        ];
    }
}
