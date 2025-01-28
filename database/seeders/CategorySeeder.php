<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Antibiotic', 'description' => 'Used to treat bacterial infections.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Painkiller', 'description' => 'Used to relieve pain.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vitamin', 'description' => 'Supplements for health and nutrition.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antiseptic', 'description' => 'Prevents infection on wounds.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antifungal', 'description' => 'Used to treat fungal infections.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antiviral', 'description' => 'Used to treat viral infections.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Analgesic', 'description' => 'Medication to relieve pain.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antipyretic', 'description' => 'Used to reduce fever.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antihistamine', 'description' => 'Used to treat allergies.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cough Suppressant', 'description' => 'Used to reduce coughing.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Expectorant', 'description' => 'Helps clear mucus from airways.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laxative', 'description' => 'Used to relieve constipation.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antacid', 'description' => 'Used to neutralize stomach acid.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antidepressant', 'description' => 'Used to treat depression.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sedative', 'description' => 'Used to calm or sedate patients.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
