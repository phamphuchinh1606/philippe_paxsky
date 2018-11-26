<?php

use Illuminate\Database\Seeder;
use App\Models\OfficeStatus;

class OfficeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officeStatus = [
            [
                'code' => 'Empty',
                'status_name' => 'Empty'
            ],
            [
                'code' => 'Placed',
                'status_name' => 'Placed'
            ],
            [
                'code' => 'Hired',
                'status_name' => 'Hired'
            ],
            [
                'code' => 'Fixing',
                'status_name' => 'Fixing'
            ],
        ];
        foreach ($officeStatus as $status){
            OfficeStatus::create(
                $status
            );
        }
    }
}
