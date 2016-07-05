<?php

use Illuminate\Database\Seeder;

class SocioEconomicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socio_economics')->insert([
            [
                'code' => '01.01',
                'division' => 'DEFENCE',
                'division_number' => '1',
                'category' => 'Defence',
                'group' => 'Military and Politics'
            ],
            [
                'code' => '01.02',
                'division' => 'DEFENCE',
                'division_number' => '1',
                'category' => 'Defence',
                'group' => 'Military Technology'
            ],
            [
                'code' => '01.03',
                'division' => 'DEFENCE',
                'division_number' => '1',
                'category' => 'Defence',
                'group' => 'Military doctrine, education, and training'
            ],
            [
                'code' => '01.04',
                'division' => 'DEFENCE',
                'division_number' => '1',
                'category' => 'Defence',
                'group' => 'Military Capabilities'
            ],
            [
                'code' => '01.05',
                'division' => 'DEFENCE',
                'division_number' => '1',
                'category' => 'Defence',
                'group' => 'Police and internal security'
            ],
            [
                'code' => '02.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'Field crops'
            ],
            [
                'code' => '02.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'Plantation crops'
            ],
            [
                'code' => '02.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'Horticultural crops'
            ],
            [
                'code' => '02.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'Forestry'
            ],
            [
                'code' => '02.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'Primary products from plants'
            ],
            [
                'code' => '02.06',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'By-products utilisation'
            ],
            [
                'code' => '02.07',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'Herbs, Spices and Medicinal Plants'
            ],
            [
                'code' => '02.08',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Plant Production and Plant  Primary Products',
                'group' => 'Other plant production and plant primary products not elsewhere classified'
            ],
        ]);
    }
}
