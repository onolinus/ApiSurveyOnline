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
            [
                'code' => '03.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Animal Production and Animal Primary Products',
                'group' => 'Livestock'
            ],
            [
                'code' => '03.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Animal Production and Animal Primary Products',
                'group' => 'Pasture, browse and folder crops'
            ],
            [
                'code' => '03.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Animal Production and Animal Primary Products',
                'group' => 'Fisheries products'
            ],
            [
                'code' => '03.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Animal Production and Animal Primary Products',
                'group' => 'Primary & by-products from animals'
            ],
            [
                'code' => '03.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Animal Production and Animal Primary Products',
                'group' => 'Other animal production and animal primary products not elsewhere classified'
            ], 
            [
                'code' => '04.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Mineral resources (excluding energy)',
                'group' => 'Exploration'
            ], 
            [
                'code' => '04.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Mineral resources (excluding energy)',
                'group' => 'Primary mining and extraction processes'
            ], 
            [
                'code' => '04.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Mineral resources (excluding energy)',
                'group' => 'First stage treatment of ores and minerals'
            ], 
            [
                'code' => '04.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Mineral resources (excluding energy)',
                'group' => 'Prevention and Treatment of Pollution'
            ], 
            [
                'code' => '04.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Mineral resources (excluding energy)',
                'group' => 'Other mineral resources(excluding energy) not elsewhere classified'
            ],
            [
                'code' => '05.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy resources',
                'group' => 'Exploration'
            ], 
            [
                'code' => '05.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy resources',
                'group' => 'Exploration'
            ], 
            [
                'code' => '05.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy resources',
                'group' => 'Mining and extraction'
            ], 
            [
                'code' => '05.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy resources',
                'group' => 'Preparation and supply of energy source materials'
            ], 
            [
                'code' => '05.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy resources',
                'group' => 'Non-conventional energy resources'
            ], 
            [
                'code' => '05.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy resources',
                'group' => 'Nuclear Energy'
            ], 
            [
                'code' => '05.06',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy resources',
                'group' => 'Other energy resources not elsewhere classified'
            ],  
            [
                'code' => '06.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy supply',
                'group' => 'Energy transformation'
            ], 
            [
                'code' => '06.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy supply',
                'group' => 'Renewable energy'
            ], 
            [
                'code' => '06.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy supply',
                'group' => 'Energy distribution'
            ], 
            [
                'code' => '06.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy supply',
                'group' => 'Energy Conservation and efficiency'
            ], 
            [
                'code' => '06.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy supply',
                'group' => 'Energy issues'
            ],
            [
                'code' => '06.06',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Energy supply',
                'group' => 'Other energy supply not elsewhere classified'
            ], 
            [
                'code' => '07.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Processed food products and beverages'
            ], 
            [
                'code' => '07.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Fibre processing and textiles, footwear and leather products'
            ], 
            [
                'code' => '07.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Wood, wood products and paper'
            ], 
            [
                'code' => '07.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Human pharmaceutical products'
            ], 
            [
                'code' => '07.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Veterinary pharmaceutical products'
            ], 
            [
                'code' => '07.06',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Agricultural chemicals'
            ], 
            [
                'code' => '07.07',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Industrial chemicals and related products'
            ], 
            [
                'code' => '07.08',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Basic metal products (including smelting)'
            ], 
            [
                'code' => '07.09',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Industrial mineral products'
            ], 
            [
                'code' => '07.10',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Fabricated metal products'
            ], 
            [
                'code' => '07.11',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Transport equipment'
            ], 
            [
                'code' => '07.12',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Computer hardware and electronic equipment'
            ], [
                'code' => '07.13',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Communication equipment'
            ], 
            [
                'code' => '07.14',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Instrumentation'
            ], 
            [
                'code' => '07.15',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Machinery and equipment'
            ], 
            [
                'code' => '07.16',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Latex product industry'
            ], 
            [
                'code' => '07.17',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Standard supporting technologies'
            ], 
            [
                'code' => '07.18',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Materials performance and processes/analysis'
            ],
            [
                'code' => '07.19',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Milling and process materials'
            ],
            [
                'code' => '07.20',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Synthesis and design of fine and speciality chemicals'
            ],
            [
                'code' => '07.21',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Consumer Products'
            ],
            [
                'code' => '07.22',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Manufacturing',
                'group' => 'Other manufactured products not elsewhere classified'
            ], 
            [
                'code' => '08.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Construction',
                'group' => 'Planning'
            ],
            [
                'code' => '08.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Construction',
                'group' => 'Design'
            ],
            [
                'code' => '08.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Construction',
                'group' => 'Construction processes'
            ],
            [
                'code' => '08.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Construction',
                'group' => 'Building management and services'
            ],
            [
                'code' => '08.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Construction',
                'group' => 'Other construction not elsewhere classified'
            ], 
            [
                'code' => '09.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Transport',
                'group' => 'Ground transport'
            ], 
            [
                'code' => '09.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Transport',
                'group' => 'Water transport'
            ], 
            [
                'code' => '09.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Transport',
                'group' => 'Air & space transport'
            ], 
            [
                'code' => '09.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Transport',
                'group' => 'Other transport not elsewhere classified'
            ],
            [
                'code' => '10.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Information and Communication services',
                'group' => 'Computer software and services'
            ],
            [
                'code' => '10.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Information and Communication services',
                'group' => 'Information services (including library)'
            ],
            [
                'code' => '10.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Information and Communication services',
                'group' => 'Communication services'
            ],
            [
                'code' => '10.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Information and Communication services',
                'group' => 'Geoinformation Services'
            ],
            [
                'code' => '10.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Information and Communication services',
                'group' => 'Other information and communication not elsewhere classified'
            ], 
            [
                'code' => '11.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Commercial Services',
                'group' => 'Electricity, gas and water services and utilities'
            ],
            [
                'code' => '11.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Commercial Services',
                'group' => 'Waste management and recycling'
            ],
            [
                'code' => '11.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Commercial Services',
                'group' => 'Wholesale and retail trade'
            ],
            [
                'code' => '11.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Commercial Services',
                'group' => 'Finance, property and business services'
            ],
            [
                'code' => '11.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Commercial Services',
                'group' => 'Tourism'
            ],
            [
                'code' => '11.06',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Commercial Services',
                'group' => 'Other commercial services not elsewhere classified'
            ],
            [
                'code' => '12.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Macroeconomics issues'
            ],
            [
                'code' => '12.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Microeconomics issues'
            ],
            [
                'code' => '12.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'International trade issues'
            ],
            [
                'code' => '12.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Management and productivity issues'
            ],
            [
                'code' => '12.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Measurement standards and calibration services'
            ],
            [
                'code' => '12.06',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Commercialisation'
            ],
            [
                'code' => '12.07',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Socio-economic development'
            ],
            [
                'code' => '12.08',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Economic development and environment'
            ],
            [
                'code' => '12.09',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Human resource management'
            ],
            [
                'code' => '12.10',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Economic Framework',
                'group' => 'Other economic issues not elsewhere classified'
            ], 
            [
                'code' => '13.01',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Natural resources',
                'group' => 'Soil resources'
            ], 
            [
                'code' => '13.02',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Natural resources',
                'group' => 'Water resources'
            ], 
            [
                'code' => '13.03',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Natural resources',
                'group' => 'Biodiversity'
            ], 
            [
                'code' => '13.04',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Natural resources',
                'group' => 'Bioactive product'
            ], 
            [
                'code' => '13.05',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Natural resources',
                'group' => 'Industrial raw materials'
            ], 
            [
                'code' => '13.06',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Natural resources',
                'group' => 'Mineral resource'
            ], 
            [
                'code' => '13.07',
                'division' => 'ECONOMIC DEVELOPMENT',
                'division_number' => '2',
                'category' => 'Natural resources',
                'group' => 'Other natural resources not elsewhere classified'
            ],
            [
                'code' => '14.01',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Health',
                'group' => 'Clinical(organs, diseases and conditions)'
            ],
            [
                'code' => '14.02',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Health',
                'group' => 'Public health'
            ],
            [
                'code' => '14.03',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Health',
                'group' => 'Health and support services'
            ],
            [
                'code' => '14.04',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Health',
                'group' => 'Other health not elsewhere classified'
            ], 
            [
                'code' => '15.01',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Early childhood and primary education'
            ], 
            [
                'code' => '15.02',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Secondary education'
            ], 
            [
                'code' => '15.03',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Tertiary education'
            ], 
            [
                'code' => '15.04',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Technical and further education'
            ], 
            [
                'code' => '15.05',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Special education'
            ], 
            [
                'code' => '15.06',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Computer base teaching and learning'
            ], 
            [
                'code' => '15.07',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Education policy'
            ], 
            [
                'code' => '15.08',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Teaching'
            ], 
            [
                'code' => '15.09',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Educational administration'
            ],
            [
                'code' => '15.10',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Education and training',
                'group' => 'Other education and training not elsewhere classified'
            ], 
            [
                'code' => '16.01',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'Community services'
            ],
            [
                'code' => '16.02',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'Public services'
            ],
            [
                'code' => '16.03',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'Art, sport and recreation'
            ],
            [
                'code' => '16.04',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'International relations'
            ],
            [
                'code' => '16.05',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'Ethical issues'
            ],
            [
                'code' => '16.06',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'Nation building'
            ],
            [
                'code' => '16.07',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'Urban issues'
            ],
            [
                'code' => '16.08',
                'division' => 'SOCIETY',
                'division_number' => '3',
                'category' => 'Social development and Community services',
                'group' => 'Other social development and community services not elsewhere classified'
            ],
            [
                'code' => '17.01',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental Knowledge',
                'group' => 'Climate and atmosphere'
            ],
            [
                'code' => '17.02',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental Knowledge',
                'group' => 'Ocean'
            ],
            [
                'code' => '17.03',
                'division' => 'ENVIRONMENT',
                'division_number' => '3',
                'category' => 'Environmental Knowledge',
                'group' => 'Water'
            ],
            [
                'code' => '17.04',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental Knowledge',
                'group' => 'Land'
            ],
            [
                'code' => '17.05',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental Knowledge',
                'group' => 'Nature conservation'
            ],
            [
                'code' => '17.06',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental Knowledge',
                'group' => 'Social environment'
            ],
            [
                'code' => '17.07',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental Knowledge',
                'group' => 'River and Lake'
            ],
            [
                'code' => '17.08',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental Knowledge',
                'group' => 'Other environmental knowledge not elsewhere classified'
            ], 
            [
                'code' => '18.01',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Plant production and plant primary products (including forestry)'
            ],
            [
                'code' => '18.02',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Animal production and animal primary products (including fishing)'
            ],
            [
                'code' => '18.03',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Mineral resources (excluding energy)'
            ],
            [
                'code' => '18.04',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Energy resources'
            ],
            [
                'code' => '18.05',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Energy supply'
            ],
            [
                'code' => '18.06',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Manufacturing'
            ],
            [
                'code' => '18.07',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Construction'
            ],
            [
                'code' => '18.08',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Transport'
            ],
            [
                'code' => '18.09',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Information and communication services'
            ],
            [
                'code' => '18.10',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Commercial services'
            ],
            [
                'code' => '18.11',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Environmental economic framework'
            ],
            [
                'code' => '18.12',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental aspects of development',
                'group' => 'Other environmental of development not elsewhere classified'
            ],
            [
                'code' => '19.01',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Environmental management'
            ], 
            [
                'code' => '19.02',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Waste management and recycling'
            ], 
            [
                'code' => '19.03',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Climate and Weather'
            ], 
            [
                'code' => '19.04',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Atmosphere (Excl. Climate and Weather)'
            ], 
            [
                'code' => '19.05',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Marine and Coastal Environment'
            ], 
            [
                'code' => '19.06',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Fresh water and Estuarine Environment'
            ], 
            [
                'code' => '19.07',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Urban and Industrial Environment'
            ], 
            [
                'code' => '19.08',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Forest and Wooded Lands'
            ], 
            [
                'code' => '19.09',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Mining Environment'
            ], 
            [
                'code' => '19.10',
                'division' => 'ENVIRONMENT',
                'division_number' => '4',
                'category' => 'Environmental management &other aspects',
                'group' => 'Other environmental aspects  not elsewhere classified'
            ],
            [
                'code' => '20.01',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Mathematical science'
            ], 
            [
                'code' => '20.02',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Physical sciences'
            ], 
            [
                'code' => '20.03',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Chemical sciences'
            ], 
            [
                'code' => '20.04',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Earth sciences'
            ], 
            [
                'code' => '20.05',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Information,computer and communication technologies'
            ], 
            [
                'code' => '20.06',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Applied sciences and technologies'
            ], 
            [
                'code' => '20.07',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Engineering sciences'
            ], 
            [
                'code' => '20.08',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Biological sciences'
            ], 
            [
                'code' => '20.09',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Agricultural sciences'
            ], 
            [
                'code' => '20.10',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Medical and health sciences'
            ], 
            [
                'code' => '20.11',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Multimedia'
            ], 
            [
                'code' => '20.12',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Natural sciences, technology, and engineering',
                'group' => 'Other Natural sciences, technology, and engineering not elsewhere classified'
            ], 
            [
                'code' => '21.01',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Social sciences and humanities',
                'group' => 'Social sciences'
            ], 
            [
                'code' => '21.02',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Social sciences and humanities',
                'group' => 'Humanities'
            ], 
            [
                'code' => '21.03',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Social sciences and humanities',
                'group' => 'Cyber law'
            ], 
            [
                'code' => '21.04',
                'division' => 'ADVANCEMENT OF KNOWLEDGE',
                'division_number' => '5',
                'category' => 'Advancement of Social sciences and humanities',
                'group' => 'Other Social sciences and humanities not elsewhere classified'
            ],
        ]);
    }
}
