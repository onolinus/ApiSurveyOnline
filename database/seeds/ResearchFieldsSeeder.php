<?php

use Illuminate\Database\Seeder;

class ResearchFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('research_fields')->insert([
            [
                'code' => '01.01',
                'subject' => 'Mathematics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Mathematical Sciences'
            ],
            [
                'code' => '01.02',
                'subject' => 'Statistics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Mathematical Sciences'
            ],
            [
                'code' => '02.01',
                'subject' => 'Theoretical and Computational Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
            [
                'code' => '02.02',
                'subject' => 'Atomic and Molecular Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
            [
                'code' => '02.03',
                'subject' => 'Acoustics and Optical Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
            [
                'code' => '02.04',
                'subject' => 'Condensed Matter Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
            [
                'code' => '02.05',
                'subject' => 'Nuclear and Particle Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
            [
                'code' => '02.06',
                'subject' => 'Classical Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
            [
                'code' => '02.07',
                'subject' => 'Fluid and Plasma Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
            [
                'code' => '02.08',
                'subject' => 'Other Physical Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Physical Sciences'
            ],
        ]);
    }
}
