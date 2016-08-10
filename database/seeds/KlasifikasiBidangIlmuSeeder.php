<?php

use Illuminate\Database\Seeder;

class KlasifikasiBidangIlmuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klasifikasi_bidang_ilmu')->insert([
             [
                'code' => '1101',
                'bidang_ilmu' => 'Logic',
                'kelompok' => 'Application of logic',
            ],
            [
                'code' => '1102',
                'bidang_ilmu' => 'Logic',
                'kelompok' => 'Deductive logic',
            ],
            [
                'code' => '1103',
                'bidang_ilmu' => 'Logic',
                'kelompok' => 'General logic',
            ],
            [
                'code' => '1104',
                'bidang_ilmu' => 'Logic',
                'kelompok' => 'Inductive logic',
            ],
            [
                'code' => '1105',
                'bidang_ilmu' => 'Logic',
                'kelompok' => 'Methodology',
            ],
            [
                'code' => '1199',
                'bidang_ilmu' => 'Logic',
                'kelompok' => 'Other specialities relating to logic',
            ],
            [
                'code' => '1201',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Algebra',
            ],
            [
                'code' => '1202',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Analysis and functional analysis',
            ],
            [
                'code' => '1203',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Computer sciences',
            ],
            [
                'code' => '1204',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Geometry',
            ],
            [
                'code' => '1205',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Number theory',
            ],
            [
                'code' => '1206',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Numerical analysis',
            ],
            [
                'code' => '1207',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Operations research',
            ],
            [
                'code' => '1208',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Probability',
            ],
            [
                'code' => '1209',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Statistics',
            ],
            [
                'code' => '1210',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Topology',
            ],
            [
                'code' => '1299',
                'bidang_ilmu' => 'Mathematics',
                'kelompok' => 'Other mathematical specialities',
            ],
            [
                'code' => '2101',
                'bidang_ilmu' => 'Astronomy and Astrophysics',
                'kelompok' => 'Cosmology and cosmogony',
            ],
            [
                'code' => '2102',
                'bidang_ilmu' => 'Astronomy and Astrophysics',
                'kelompok' => 'Interplanetary medium',
            ],
            [
                'code' => '2103',
                'bidang_ilmu' => 'Astronomy and Astrophysics',
                'kelompok' => 'Optical astronomy',
            ],
            [
                'code' => '2104',
                'bidang_ilmu' => 'Astronomy and Astrophysics',
                'kelompok' => 'Planetology',
            ],
            [
                'code' => '2105',
                'bidang_ilmu' => 'Astronomy and Astrophysics',
                'kelompok' => 'Radio-astronomy',
            ],
            [
                'code' => '2106',
                'bidang_ilmu' => 'Astronomy and Astrophysics',
                'kelompok' => 'Solar system',
            ],
            [
                'code' => '2199',
                'bidang_ilmu' => 'Astronomy and Astrophysics',
                'kelompok' => 'Other astronomical specialities',
            ],
            [
                'code' => '2201',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Acoustics',
            ], 
            [
                'code' => '2202',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Electro-magnetism',
            ], 
            [
                'code' => '2203',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Electronics',
            ], 
            [
                'code' => '2204',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Fluid',
            ], 
            [
                'code' => '2205',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'AcouMechanics',
            ], 
            [
                'code' => '2206',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Molecular physics',
            ], 
            [
                'code' => '2207',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Nuclear physics',
            ], 
            [
                'code' => '2208',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Nucleonics',
            ], 
            [
                'code' => '2209',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Optics',
            ], 
            [
                'code' => '2210',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Physical chemistry',
            ], 
            [
                'code' => '2211',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Solid state physics',
            ], 
            [
                'code' => '2212',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Theoretical physics',
            ], 
            [
                'code' => '2213',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Thermodynamics',
            ], 
            [
                'code' => '2214',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Units and constants',
            ],
            [
                'code' => '2299',
                'bidang_ilmu' => 'Physics',
                'kelompok' => 'Other physical specialities',
            ],
            [
                'code' => '2301',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Analytical chemistry',
            ],
            [
                'code' => '2302',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Biochemistry',
            ],
            [
                'code' => '2303',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Inorganic chemistry',
            ],
            [
                'code' => '2304',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Macromolecular chemistry',
            ],

                'code' => '2305',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Nuclear chemistry',
            ],
            [
                'code' => '2306',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Organic chemistry',
            ],
            [
                'code' => '2307',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Physical chemistry',
            ],
            [
                'code' => '2399',
                'bidang_ilmu' => 'Chemistry',
                'kelompok' => 'Other chemical specialities',
            ],
            [
                'code' => '2401',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Animal biology (zoology)',
            ],
            [
                'code' => '2402',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Anthropology (physical)',
            ],
            [
                'code' => '2403',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Biochemistry',
            ],
            [
                'code' => '2404',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Biomathematics',
            ],
            [
                'code' => '2405',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'ABiometrics',
            ],
            [
                'code' => '2406',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Biophysics',
            ],
            [
                'code' => '2407',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Cell biology',
            ],
            [
                'code' => '2408',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Ethology',
            ],
            [
                'code' => '2409',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Genetics',
            ],
            [
                'code' => '2410',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Human biology',
            ],
            [
                'code' => '2411',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Human physicology',
            ],
            [
                'code' => '2412',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Immunology',
            ],
            [
                'code' => '2413',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Insect biology (entomology)',
            ],
            [
                'code' => '2414',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Microbiology',
            ],
            [
                'code' => '2415',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Molecular biology',
            ],
            [
                'code' => '2416',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Palaeontology',
            ],
            [
                'code' => '2417',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Plant biology (botany)',
            ],
            [
                'code' => '2418',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Radiobiology',
            ],
            [
                'code' => '2419',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Symbiosis',
            ],
            [
                'code' => '2420',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Virology',
            ],
            [
                'code' => '2499',
                'bidang_ilmu' => 'Life Sciences',
                'kelompok' => 'Other biological specialities',
            ], 
            [
                'code' => '2501',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Atmospheric sciences',
            ],
            [
                'code' => '2502',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Climatology',
            ],
            [
                'code' => '2503',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Geochemistry',
            ],
            [
                'code' => '2504',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Geodesy',
            ],
            [
                'code' => '2505',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Geography',
            ],
            [
                'code' => '2506',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Geology',
            ],
            [
                'code' => '2507',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Geophysics',
            ],
            [
                'code' => '2508',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Hydrology',
            ],
            [
                'code' => '2509',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Meteorology',
            ],
            [
                'code' => '2510',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Oceanography',
            ],
            [
                'code' => '2511',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Soil science',
            ],
            [
                'code' => '2512',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Space sciences',
            ],
            [
                'code' => '2599',
                'bidang_ilmu' => 'Earth and Space Sciences',
                'kelompok' => 'Other earth, space, or environmental specialities',
            ],
            [
                'code' => '3101',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Agricultural chemistry',
            ], 
            [
                'code' => '3102',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Agricultural engineering',
            ], 
            [
                'code' => '3103',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Agronomy',
            ], 
            [
                'code' => '3104',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Animal husbandry',
            ], 
            [
                'code' => '3105',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Fish and wildlife',
            ], 
            [
                'code' => '3106',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Forestry',
            ], 
            [
                'code' => '3107',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Horticulture',
            ], 
            [
                'code' => '3108',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Phytopathology',
            ], 
            [
                'code' => '3109',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Veterinary sciences',
            ], 
            [
                'code' => '3199',
                'bidang_ilmu' => 'Agricultural sciences',
                'kelompok' => 'Other agricultural specialities',
            ],  
            [
                'code' => '3201',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Clinical sciences',
            ], 
            [
                'code' => '3202',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Epidemology',
            ], 
            [
                'code' => '3203',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Forensic medicine',
            ], 
            [
                'code' => '3204',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Occupational medicine',
            ], 
            [
                'code' => '3205',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Internal medicine',
            ], 
            [
                'code' => '3206',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Nutrition sciences',
            ], 
            [
                'code' => '3207',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Pathology',
            ], 
            [
                'code' => '3208',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Pharmacodynamics',
            ], 

                'code' => '3209',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Pharmacology',
            ], 
            [
                'code' => '3210',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Preventive medicine',
            ], 
            [
                'code' => '3211',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Pschiatry',
            ], 
            [
                'code' => '3212',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Public health',
            ], 
            [
                'code' => '3213',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Surgery',
            ], 

                'code' => '3214',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Toxicology',
            ], 
            [
                'code' => '3299',
                'bidang_ilmu' => 'Medical Sciences',
                'kelompok' => 'Other medical specialities',
            ],  
            [
                'code' => '3301',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Aeronautical technology and engineering',
            ],  
            [
                'code' => '3302',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Biochemical technology',
            ], 
            [
                'code' => '3303',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Chemical technology and engineering',
            ], 
            [
                'code' => '3304',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Computer technology',
            ], 
            [
                'code' => '3305',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Construction technology',
            ], 
            [
                'code' => '3306',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Electrical technology and engineering',
            ], 
            [
                'code' => '3307',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Electronic technology',
            ], 
            [
                'code' => '3308',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Environmental technology and engineering',
            ], 
            [
                'code' => '3309',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Food technology',
            ], 
            [
                'code' => '3310',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Industrial technology',
            ], 
            [
                'code' => '3311',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Instrumentation technology',
            ], 
            [
                'code' => '3312',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Materials technology',
            ], 
            [
                'code' => '3313',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Mechanical engineering and tenchnology',
            ], 
            [
                'code' => '3314',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Medical technology',
            ], 
            [
                'code' => '3315',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Metallurgical technology',
            ], 
            [
                'code' => '3316',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Metal products technology',
            ], 
            [
                'code' => '3317',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Motor vehicle technology',
            ], 
            [
                'code' => '3318',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Mining technology',
            ], 
            [
                'code' => '3319',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Neval technology',
            ], 
            [
                'code' => '3320',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Nuclear technology',
            ], 
            [
                'code' => '3321',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Petroleum and coal technology',
            ], 
            [
                'code' => '3322',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Power technology',
            ], 
            [
                'code' => '3323',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Railway technology',
            ], 
            [
                'code' => '3324',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Space technology',
            ], 
            [
                'code' => '3325',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Telecommunications technology',
            ], 
            [
                'code' => '3326',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Textile technology',
            ], 
            [
                'code' => '3327',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Transportation systems technology',
            ], 
            [
                'code' => '3328',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Unit operations technology',
            ], 
            [
                'code' => '3329',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Urban planning',
            ], 
            [
                'code' => '3399',
                'bidang_ilmu' => 'Technological Sciences',
                'kelompok' => 'Other technological specialities',
            ],  
            [
                'code' => '5101',
                'bidang_ilmu' => 'Anthropology',
                'kelompok' => 'Cultural anthropology',
            ],  
            [
                'code' => '5102',
                'bidang_ilmu' => 'Anthropology',
                'kelompok' => 'Ethnography and ethnoogy',
            ],  
            [
                'code' => '5103',
                'bidang_ilmu' => 'Anthropology',
                'kelompok' => 'Socia anthropology',
            ],  
            [
                'code' => '5199',
                'bidang_ilmu' => 'Anthropology',
                'kelompok' => 'Other anthropological specialities',
            ],   
            [
                'code' => '5201',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'Fertility',
            ], 
            [
                'code' => '5202',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'General demography',
            ], 
            [
                'code' => '5203',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'Geographical demography',
            ], 
            [
                'code' => '5204',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'Historical demography',
            ], 
            [
                'code' => '5205',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'Mortality',
            ], 
            [
                'code' => '5206',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'Population characteristic',
            ], 
            [
                'code' => '5207',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'Population size and demographic evolution',
            ], 
            [
                'code' => '5299',
                'bidang_ilmu' => 'Demography',
                'kelompok' => 'Other demographic specialities',
            ], 
            [
                'code' => '5301',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Domestic fiscal policy and public finance',
            ],   
            [
                'code' => '5302',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Econometrics',
            ], 
            [
                'code' => '5303',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Economic accounting',
            ], 
            [
                'code' => '5304',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Economic activity',
            ], 
            [
                'code' => '5305',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Economic systems',
            ], 
            [
                'code' => '5306',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Economic of technological change',
            ], 
            [
                'code' => '5307',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Economic theory',
            ], 
            [
                'code' => '5308',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'General economics',
            ], 
            [
                'code' => '5309',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Industrial organization and public policy',
            ], 
            [
                'code' => '5310',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'International economics',
            ], 
            [
                'code' => '5311',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Organization and management of enterprises',
            ], 
            [
                'code' => '5312',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Sectorial economics',
            ], 
            [
                'code' => '5399',
                'bidang_ilmu' => 'Economic sciences',
                'kelompok' => 'Other economic specialities',
            ], 
            [
                'code' => '5401',
                'bidang_ilmu' => 'Geography',
                'kelompok' => 'Economic geography',
            ], 
            [
                'code' => '5402',
                'bidang_ilmu' => 'Geography',
                'kelompok' => 'Historical geography',
            ],  
            [
                'code' => '5403',
                'bidang_ilmu' => 'Geography',
                'kelompok' => 'Human geography',
            ],  
            [
                'code' => '5404',
                'bidang_ilmu' => 'Geography',
                'kelompok' => 'Regional geography',
            ],  
            [
                'code' => '5499',
                'bidang_ilmu' => 'Geography',
                'kelompok' => 'Other geographical specialities',
            ],  
            [
                'code' => '5501',
                'bidang_ilmu' => 'History',
                'kelompok' => 'Biographics',
            ], 
            [
                'code' => '5502',
                'bidang_ilmu' => 'History',
                'kelompok' => 'General history',
            ], 
            [
                'code' => '5503',
                'bidang_ilmu' => 'History',
                'kelompok' => 'History of countries',
            ], 
            [
                'code' => '5504',
                'bidang_ilmu' => 'History',
                'kelompok' => 'History by epochs',
            ], 
            [
                'code' => '5505',
                'bidang_ilmu' => 'History',
                'kelompok' => 'Sciences auxiliary to history',
            ], 
            [
                'code' => '5506',
                'bidang_ilmu' => 'History',
                'kelompok' => 'Specialized histories',
            ], 
            [
                'code' => '5599',
                'bidang_ilmu' => 'History',
                'kelompok' => 'Other historical specialities',
            ],  
            [
                'code' => '5601',
                'bidang_ilmu' => 'Juridical Sciences & Law',
                'kelompok' => 'Canon law',
            ], 
            [
                'code' => '5602',
                'bidang_ilmu' => 'Juridical Sciences & Law',
                'kelompok' => 'General theory and methods',
            ], 
            [
                'code' => '5603',
                'bidang_ilmu' => 'Juridical Sciences & Law',
                'kelompok' => 'International law',
            ], 
            [
                'code' => '5604',
                'bidang_ilmu' => 'Juridical Sciences & Law',
                'kelompok' => 'Legal organization',
            ], 
            [
                'code' => '5605',
                'bidang_ilmu' => 'Juridical Sciences & Law',
                'kelompok' => 'National law and legislation',
            ], 
            [
                'code' => '5699',
                'bidang_ilmu' => 'Juridical Sciences & Law',
                'kelompok' => 'Other juridical specialities',
            ],   
            [
                'code' => '5701',
                'bidang_ilmu' => 'Linguistics',
                'kelompok' => 'Applied linguistics',
            ],  
            [
                'code' => '5702',
                'bidang_ilmu' => 'Linguistics',
                'kelompok' => 'Diachronis linguistics',
            ],  
            [
                'code' => '5703',
                'bidang_ilmu' => 'Linguistics',
                'kelompok' => 'Linguistic geography',
            ],  
            [
                'code' => '5704',
                'bidang_ilmu' => 'Linguistics',
                'kelompok' => 'Linguistic theory',
            ],  
            [
                'code' => '5705',
                'bidang_ilmu' => 'Linguistics',
                'kelompok' => 'Synchronic linguistics',
            ],  
            [
                'code' => '5799',
                'bidang_ilmu' => 'Linguistics',
                'kelompok' => 'Other linguistic specialities',
            ],  
            [
                'code' => '5801',
                'bidang_ilmu' => 'Pedagogy',
                'kelompok' => 'Educational theory',
            ], 
            [
                'code' => '5802',
                'bidang_ilmu' => 'Pedagogy',
                'kelompok' => 'Organization and planning of education',
            ], 
            [
                'code' => '5803',
                'bidang_ilmu' => 'Pedagogy',
                'kelompok' => 'Teacher training and employment',
            ], 
            [
                'code' => '5899',
                'bidang_ilmu' => 'Pedagogy',
                'kelompok' => 'Other specialities',
            ],  
            [
                'code' => '5901',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'International relations',
            ], 
            [
                'code' => '5902',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Policy sciences',
            ], 
            [
                'code' => '5903',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Political ideologies',
            ], 
            [
                'code' => '5904',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Political institution',
            ], 
            [
                'code' => '5905',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Political life',
            ], 
            [
                'code' => '5906',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Political sociology',
            ], 
            [
                'code' => '5907',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Political systems',
            ], 
            [
                'code' => '5908',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Political theory',
            ], 
            [
                'code' => '5909',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Public administration',
            ], 
            [
                'code' => '5910',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Public opinion',
            ],  
            [
                'code' => '5999',
                'bidang_ilmu' => 'Political Science',
                'kelompok' => 'Other political science specialities',
            ],  
            [
                'code' => '6101',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Abnormal psychology',
            ], 
            [
                'code' => '6102',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Adolescent and child psychology',
            ], 
            [
                'code' => '6103',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Counselling and guidance',
            ], 
            [
                'code' => '6104',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Educational psychology',
            ], 
            [
                'code' => '6105',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Evaluation and measurement in psychology',
            ], 
            [
                'code' => '6106',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Experimental psychology',
            ], 
            [
                'code' => '6107',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'General psychology',
            ], 
            [
                'code' => '6108',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Geriatric psychology',
            ], 
            [
                'code' => '6109',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Occupational and personnel psychology',
            ], 
            [
                'code' => '6110',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Parapsychology',
            ], 
            [
                'code' => '6111',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Personality',
            ], 
            [
                'code' => '6112',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Psychological study of social issue',
            ], 
            [
                'code' => '6113',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Psychopharmacology',
            ], 
            [
                'code' => '6114',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Social psychology',
            ], 
            [
                'code' => '6199',
                'bidang_ilmu' => 'Psychology',
                'kelompok' => 'Other psychological specialities',
            ],  
            [
                'code' => '6201',
                'bidang_ilmu' => 'Sciences of Art & Letter',
                'kelompok' => 'Architecture',
            ],  
            [
                'code' => '6202',
                'bidang_ilmu' => 'Sciences of Art & Letter',
                'kelompok' => 'Literary theory, analysis and criticism',
            ],  
            [
                'code' => '6203',
                'bidang_ilmu' => 'Sciences of Art & Letter',
                'kelompok' => 'Fine arts theory, analysis and criticism',
            ],  
            [
                'code' => '6299',
                'bidang_ilmu' => 'Sciences of Art & Letter',
                'kelompok' => 'Other artistical specialities',
            ],  
            [
                'code' => '6301',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Cultural sociology',
            ], 
            [
                'code' => '6302',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Experimental sociology',
            ], 
            [
                'code' => '6303',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'General sociology',
            ], 
            [
                'code' => '6304',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'International disorganization',
            ], 
            [
                'code' => '6305',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Mathematical sociology',
            ], 
            [
                'code' => '6306',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Occupational sociology',
            ], 
            [
                'code' => '6307',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Social change and development',
            ], 
            [
                'code' => '6308',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Social communications',
            ], 
            [
                'code' => '6309',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Social groups',
            ], 
            [
                'code' => '6310',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Social problems – Social organizations',
            ], 
            [
                'code' => '6311',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Sociology of human settlements',
            ], 
            [
                'code' => '6399',
                'bidang_ilmu' => 'Sociology',
                'kelompok' => 'Other sociological specialities',
            ],  
            [
                'code' => '7101',
                'bidang_ilmu' => 'Ethics',
                'kelompok' => 'Classical ethics',
            ], 
            [
                'code' => '7102',
                'bidang_ilmu' => 'Ethics',
                'kelompok' => 'Ethics of individu',
            ], 
            [
                'code' => '7103',
                'bidang_ilmu' => 'Ethics',
                'kelompok' => 'Group ethics',
            ], 
            [
                'code' => '7104',
                'bidang_ilmu' => 'Ethics',
                'kelompok' => 'Prospective ethics',
            ], 
            [
                'code' => '7199',
                'bidang_ilmu' => 'Ethics',
                'kelompok' => 'Other sociological specialities',
            ], 
            [
                'code' => '7201',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Philosophy of knowledge',
            ], 
            [
                'code' => '7202',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Philosophical anthropology',
            ], 
            [
                'code' => '7203',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'General philosophy',
            ], 
            [
                'code' => '7204',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Philosophical systems',
            ], 
            [
                'code' => '7205',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Philosophy of science',
            ], 
            [
                'code' => '7206',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Philosophy of nature',
            ], 
            [
                'code' => '7207',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Social philosophy',
            ], 
            [
                'code' => '7208',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Philosophical doctrines',
            ], 
            [
                'code' => '7299',
                'bidang_ilmu' => 'Philosophy',
                'kelompok' => 'Other philosophical specialities',
            ], 
           
        ]);
    }
}
