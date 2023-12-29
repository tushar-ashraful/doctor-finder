<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 527 ; $i++) { 
           Order::updateOrCreate( [
            'sku' => Order::newSku(),
            'university_id' => 1,
            'title' =>  'demon Project Title',
            'description' => 'Maiores laboriosam earum nostrum qui ea voluptate. Enim tenetur quidem tempora iure dolor deleniti. Facere dolor laboriosam autem. Iste ut et consequatur voluptatem qui provident non.',
            'supervisor' => 'Demo supervisor Name',
            'supervisor_phone' => '01886180101',
            'name' => 'Demo Biller Name',
            'phone' => '01886180101',
            'members' => [
                [
                    'member_id' => null,
                    'member_name' => null,
                    'member_phone' => null,]
                ],
                'delivery' => now(),
                'delivery_at' => now(),
                'status' => Order::DELIVERED,
            ] );
       }
       for ($i=528; $i <= 636; $i++) { 
           Order::updateOrCreate( [
            'sku' => Order::newSku(),
            'university_id' => 1,
            'title' =>  'demon Project Title',
            'description' => 'Maiores laboriosam earum nostrum qui ea voluptate. Enim tenetur quidem tempora iure dolor deleniti. Facere dolor laboriosam autem. Iste ut et consequatur voluptatem qui provident non.',
            'supervisor' => 'Demo supervisor Name',
            'supervisor_phone' => '01886180101',
            'name' => 'Demo Biller Name',
            'phone' => '01886180101',
            'members' => [
                [
                    'member_id' => null,
                    'member_name' => null,
                    'member_phone' => null,]
                ],
                'delivery' => now(),
                'delivery_at' => now(),
                'status' => Order::REVIEW,
            ] );
       }
   }
}
