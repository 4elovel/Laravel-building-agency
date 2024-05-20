<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Complex;
class ComplexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('complexes')->delete();
        Complex::create(['name' => 'Residential complex "Sunny"']);
        Complex::create(['name' => 'Residential complex "Lunar"']);
        Complex::create(['name' => 'Residential complex "Stellar"']);
    }
}
