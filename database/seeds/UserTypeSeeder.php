<?php

use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypes = [
            [
                'type_code' => 1,
                'type_name' => 'Root admin'
            ],
            [
                'type_code' => 2,
                'type_name' => 'Admin'
            ],
            [
                'type_code' => 3,
                'type_name' => 'News manager'
            ],
            [
                'type_code' => 4,
                'type_name' => 'Customer manager'
            ],
            [
                'type_code' => 99,
                'type_name' => 'Customer'
            ],
        ];
        foreach ($userTypes as $userType){
            UserType::create(
                $userType
            );
        }
    }
}
