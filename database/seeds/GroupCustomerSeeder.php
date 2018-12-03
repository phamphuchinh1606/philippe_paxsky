<?php

use Illuminate\Database\Seeder;
use App\Models\GroupCustomer;

class GroupCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupCustomers = [
            [
                'group_code' => 'customer_visit',
                'group_name' => 'Visit Customer'
            ],
            [
                'group_code' => 'normal_customers',
                'group_name' => 'Normal Customers'
            ],
            [
                'group_code' => 'average_customer',
                'group_name' => 'Average Customer'
            ],
            [
                'group_code' => 'vip_customer',
                'group_name' => 'Vip Customer'
            ],
        ];
        foreach ($groupCustomers as $groupCustomer){
            GroupCustomer::create(
                $groupCustomer
            );
        }
    }
}
