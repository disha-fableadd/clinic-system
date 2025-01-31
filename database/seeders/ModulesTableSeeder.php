<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            'User', 'Medicines', 'Patients', 'Appointments', 'Treatments', 
            'Services', 'Calender', 'Discharge', 'Inventory', 'Supplier', 
            'Medical Report', 'Chart'
        ];

        foreach ($modules as $module) {
            DB::table('modules')->insert([
                'name' => $module,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
