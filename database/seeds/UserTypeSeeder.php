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
                'type_name' => 'Root admin'
            ],
            [
                'type_name' => 'Admin'
            ],
            [
                'type_name' => 'News manager'
            ],
            [
                'type_name' => 'Customer manager'
            ],
        ];
        foreach ($userTypes as $userType){
            UserType::create(
                $userType
            );
        }
    }
}
