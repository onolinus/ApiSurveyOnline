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
                'subject' => 'Physical Chemistry',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '03.01',
                'subject' => 'Other Physical Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '03.02',
                'subject' => 'Inorganic Chemistry',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '03.03',
                'subject' => 'Organic Chemistry',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '03.04',
                'subject' => 'Analytical Chemistry',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '03.05',
                'subject' => 'Macromolecular Chemistry',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '03.06',
                'subject' => 'Theoretical and Computational Chemistry',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '03.07',
                'subject' => 'Other Chemical Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Chemical Sciences'
            ],
            [
                'code' => '04.01',
                'subject' => 'Geology',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Earth Sciences'
            ],
            [
                'code' => '04.02',
                'subject' => 'Geophysics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Earth Sciences'
            ],
            [
                'code' => '04.03',
                'subject' => 'Geochemistry',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Earth Sciences'
            ],
            [
                'code' => '04.04',
                'subject' => 'Oceanography',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Earth Sciences'
            ],
            [
                'code' => '04.05',
                'subject' => 'Hydrology',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Earth Sciences'
            ],
            [
                'code' => '04.06',
                'subject' => 'Atmospheric Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Earth Sciences'
            ],
            [
                'code' => '04.07',
                'subject' => 'Other Chemical Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Earth Sciences'
            ],
            [
                'code' => '05.01',
                'subject' => 'Biochemistry and Cell Biology',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.02',
                'subject' => 'Genetics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.03',
                'subject' => 'Microbiology',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.04',
                'subject' => 'Botany',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.05',
                'subject' => 'Zoology',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.06',
                'subject' => 'Physiology',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.07',
                'subject' => 'Ecology and Evolution',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.08',
                'subject' => 'Biotechnology',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.09',
                'subject' => 'Biodiversity and Conservation',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '05.10',
                'subject' => 'Other Biological Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Biological Sciences'
            ],
            [
                'code' => '06.01',
                'subject' => 'Astronomy and Astrophysics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Space Sciences'
            ],
            [
                'code' => '06.02',
                'subject' => 'Solar Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Space Sciences'
            ],
            [
                'code' => '06.03',
                'subject' => 'Space Environment Physics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Space Sciences'
            ],
            [
                'code' => '06.04',
                'subject' => 'Space Dynamics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Space Sciences'
            ],
            [
                'code' => '06.05',
                'subject' => 'Geomagnetic Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Space Sciences'
            ],
            [
                'code' => '06.06',
                'subject' => 'Ionospheric Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Space Sciences'
            ],
            [
                'code' => '06.07',
                'subject' => 'Other Space Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Space Sciences'
            ],
            [
                'code' => '07.01',
                'subject' => 'Information Systems',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Information, Computing, and Communication Sciences'
            ],
            [
                'code' => '07.02',
                'subject' => 'Artificial Intellegence and Signal and Image Processing',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Information, Computing, and Communication Sciences'
            ],
            [
                'code' => '07.03',
                'subject' => 'Computer Software',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Information, Computing, and Communication Sciences'
            ],
            [
                'code' => '07.04',
                'subject' => 'Computation Theory and Mathematics',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Information, Computing, and Communication Sciences'
            ],
            [
                'code' => '07.05',
                'subject' => 'Data Format',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Information, Computing, and Communication Sciences'
            ],
            [
                'code' => '07.06',
                'subject' => 'Other Information, Computing, and Communication Sciences',
                'area' => 'NATURAL SCIENCES',
                'sub_area' => 'Information, Computing, and Communication Sciences'
            ],
            [
                'code' => '08.01',
                'subject' => 'Industrial Biotechnology and Food Sciences',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.02',
                'subject' => 'Aerospace Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.03',
                'subject' => 'Manufacturing Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.04',
                'subject' => 'Automotive Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.05',
                'subject' => 'Mechanical and Industrial Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.06',
                'subject' => 'Chemical Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.07',
                'subject' => 'Resources Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.08',
                'subject' => 'Civil Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.09',
                'subject' => 'Electrical and Electonic Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.10',
                'subject' => 'Geomatic Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.11',
                'subject' => 'Environmental Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.12',
                'subject' => 'Maritime Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.13',
                'subject' => 'Metallurgy ',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.14',
                'subject' => 'Materials Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.15',
                'subject' => 'Biomedical Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.16',
                'subject' => 'Computer Hardware',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.17',
                'subject' => 'Communications Technologies',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.18',
                'subject' => 'Interdisciplinary Engineering',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '08.19',
                'subject' => 'Other Engineering and Technology',
                'area' => 'ENGINEERING AND TECHNOLOGY',
                'sub_area' => 'Engineering and Technology'
            ],
            [
                'code' => '09.01',
                'subject' => 'Soil and Water Sciences',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.02',
                'subject' => 'Crop and Pasture Production',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.03',
                'subject' => 'Horticulture',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.04',
                'subject' => 'Animal Production',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.05',
                'subject' => 'Veterinary Sciences',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.06',
                'subject' => 'Forestry Sciences',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.07',
                'subject' => 'Fisheries Sciences',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.08',
                'subject' => 'Pest and Disease Management',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.09',
                'subject' => 'Food Science and Nutrition',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '09.10',
                'subject' => 'Other Agricultural and Veterinary Sciences',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Agricultural and Veterinary Sciences'
            ],
            [
                'code' => '10.01',
                'subject' => 'Environmental, Wildlife, Natural Resource Management',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Environmental Sciences'
            ],
            [
                'code' => '10.02',
                'subject' => 'Conservation',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Environmental Sciences'
            ],
            [
                'code' => '10.03',
                'subject' => 'Land, Parks, and Agricultural Management',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Environmental Sciences'
            ],
            [
                'code' => '10.04',
                'subject' => 'Other Environmental Sciences',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Environmental Sciences'
            ],
            [
                'code' => '11.01',
                'subject' => 'Architecture and Urban Environment',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Architecture, Urban Environment and Building'
            ], 
            [
                'code' => '11.02',
                'subject' => 'Building',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Architecture, Urban Environment and Building'
            ], 
            [
                'code' => '11.03',
                'subject' => 'Other Architecture, Urban Environment and Building',
                'area' => 'AGRICULTURAL AND ENVIRONMENTAL SCIENCES',
                'sub_area' => 'Architecture, Urban Environment and Building'
            ],
            [
                'code' => '12.01',
                'subject' => 'Medicine – general',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.02',
                'subject' => 'Immunology',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.03',
                'subject' => 'Medical Biochemistry and Clinical Chemistry',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.04',
                'subject' => 'Medical Microbiology',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.05',
                'subject' => 'Pharmacology and Pharmeceutical Sciences',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.06',
                'subject' => 'Medical Physiology',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.07',
                'subject' => 'Neurosciences',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],[
                'code' => '12.08',
                'subject' => 'Dentistry',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.09',
                'subject' => 'Optometry',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.10',
                'subject' => 'Clinical Sciences',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.11',
                'subject' => 'Nursing',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.12',
                'subject' => 'Public Health and Services',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.13',
                'subject' => 'Alternative Medicine',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.14',
                'subject' => 'Human Movement and Sports Science',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '12.15',
                'subject' => 'Other Medical and Health Sciences',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Medical and Health Sciences'
            ],
            [
                'code' => '13.01',
                'subject' => 'Education Studies',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Education'
            ],
            [
                'code' => '13.02',
                'subject' => 'Curriculum Studies',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Education'
            ],
            [
                'code' => '13.03',
                'subject' => 'Professional Development of Teachers',
                'area' => 'MEDICAL SCIENCES',
                'sub_area' => 'Education'
            ],
            [
                'code' => '13.04',
                'subject' => 'Other Education',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Education'
            ],
            [
                'code' => '14.01',
                'subject' => 'Economic Theory',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Economics'
            ], 
            [
                'code' => '14.02',
                'subject' => 'Applied Economics',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Economics'
            ], 
            [
                'code' => '14.03',
                'subject' => 'Economics History and History of Economic Thought',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Economics'
            ], 
            [
                'code' => '14.04',
                'subject' => 'Econometrics',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Economics'
            ], 
            [
                'code' => '14.05',
                'subject' => 'Other Economics',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Economics'
            ], 
            [
                'code' => '15.01',
                'subject' => 'Accounting, Auditing, and Accountability',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Commerce, Management, Tourism and Services'
            ],
            [
                'code' => '15.02',
                'subject' => 'Business and Management',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Commerce, Management, Tourism and Services'
            ],
            [
                'code' => '15.03',
                'subject' => 'Banking, Finance, and Investment',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Commerce, Management, Tourism and Services'
            ],
            [
                'code' => '15.04',
                'subject' => 'Transportation',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Commerce, Management, Tourism and Services'
            ],
            [
                'code' => '15.05',
                'subject' => 'Tourism',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Commerce, Management, Tourism and Services'
            ],
            [
                'code' => '15.06',
                'subject' => 'Services',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Commerce, Management, Tourism and Services'
            ], 
            [
                'code' => '15.07',
                'subject' => 'Other Commerce, Management, Tourism and Services',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Commerce, Management, Tourism and Services'
            ],
            [
                'code' => '16.01',
                'subject' => 'Political Sciences',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Policy and Political Sciences'
            ],
            [
                'code' => '16.02',
                'subject' => 'Policy and Administration',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Policy and Political Sciences'
            ],
            [
                'code' => '16.03',
                'subject' => 'Other Policy and Political Sciences',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Policy and Political Sciences'
            ],
            [
                'code' => '17.01',
                'subject' => 'Sociology',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Studies in Human Society'
            ], 
            [
                'code' => '17.02',
                'subject' => 'Social Work',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Studies in Human Society'
            ], 
            [
                'code' => '17.03',
                'subject' => 'Anthropology',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Studies in Human Society'
            ], 
            [
                'code' => '17.04',
                'subject' => 'Human Geography',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Studies in Human Society'
            ], 
            [
                'code' => '17.05',
                'subject' => 'Demography',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Studies in Human Society'
            ], 
            [
                'code' => '17.06',
                'subject' => 'History and Philosophy of Science and Medicine',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Studies in Human Society'
            ], 
            [
                'code' => '17.07',
                'subject' => 'Other Studies in Human Society',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Studies in Human Society'
            ],
            [
                'code' => '18.01',
                'subject' => 'Psychology',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Behavioural and Cognitive Sciences'
            ],
            [
                'code' => '18.02',
                'subject' => 'Linguistics',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Behavioural and Cognitive Sciences'
            ],
            [
                'code' => '18.03',
                'subject' => 'Cognitive Science',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Behavioural and Cognitive Sciences'
            ],
            [
                'code' => '18.04',
                'subject' => 'Other Behavioural and Cognitive Sciences',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Behavioural and Cognitive Sciences'
            ], 
            [
                'code' => '19.01',
                'subject' => 'Law',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Law, Justice, and Law Enforcement'
            ],
            [
                'code' => '19.02',
                'subject' => 'Professional Development of Law Practitioners',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Law, Justice, and Law Enforcement'
            ],
            [
                'code' => '19.03',
                'subject' => 'Justice and Legal Studies',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Law, Justice, and Law Enforcement'
            ],
            [
                'code' => '19.04',
                'subject' => 'Law Enforcement',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Law, Justice, and Law Enforcement'
            ],
            [
                'code' => '19.05',
                'subject' => 'Other Law, Justice, and Law Enforcement',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Law, Justice, and Law Enforcement'
            ],
            [
                'code' => '20.01',
                'subject' => 'Journalism, Communication and Media',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Journalism, Librarianship and Curatorial Studies'
            ],
            [
                'code' => '20.02',
                'subject' => 'Curatorial Studies',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Journalism, Librarianship and Curatorial Studies'
            ],
            [
                'code' => '20.03',
                'subject' => 'Other Journalism, Librarianship and Curatorial Studies',
                'area' => 'SOCIAL SCIENCES',
                'sub_area' => 'Journalism, Librarianship and Curatorial Studies'
            ],
            [
                'code' => '21.01',
                'subject' => 'Performing Arts',
                'area' => 'HUMANITIES ',
                'sub_area' => 'The Arts'
            ], 
            [
                'code' => '21.02',
                'subject' => 'Visual Arts and Culture',
                'area' => 'HUMANITIES ',
                'sub_area' => 'The Arts'
            ], 
            [
                'code' => '21.03',
                'subject' => 'Cinema, Electronic Arts, and Media',
                'area' => 'HUMANITIES ',
                'sub_area' => 'The Arts'
            ], 
            [
                'code' => '21.04',
                'subject' => 'Design Studies',
                'area' => 'HUMANITIES ',
                'sub_area' => 'The Arts'
            ], 
            [
                'code' => '21.05',
                'subject' => 'Other Arts',
                'area' => 'HUMANITIES ',
                'sub_area' => 'The Arts'
            ],
            [
                'code' => '22.01',
                'subject' => 'Language Studies',
                'area' => 'HUMANITIES ',
                'sub_area' => 'Language and Culture'
            ], 
            [
                'code' => '22.02',
                'subject' => 'Literature Studies',
                'area' => 'HUMANITIES ',
                'sub_area' => 'Language and Culture'
            ], 
            [
                'code' => '22.03',
                'subject' => 'Cultural Studies',
                'area' => 'HUMANITIES ',
                'sub_area' => 'Language and Culture'
            ], 
            [
                'code' => '22.04',
                'subject' => 'Other Language and Culture',
                'area' => 'HUMANITIES ',
                'sub_area' => 'Language and Culture'
            ], 
            [
                'code' => '23.01',
                'subject' => 'Historical Studies',
                'area' => 'HUMANITIES ',
                'sub_area' => 'History and Archaeology'
            ],
            [
                'code' => '23.02',
                'subject' => 'Archaeology and Prehistory',
                'area' => 'HUMANITIES ',
                'sub_area' => 'History and Archaeology'
            ],
            [
                'code' => '23.03',
                'subject' => 'Other History and Archaeology',
                'area' => 'HUMANITIES ',
                'sub_area' => 'History and Archaeology'
            ], 
            [
                'code' => '24.01',
                'subject' => 'Philosophy',
                'area' => 'HUMANITIES ',
                'sub_area' => 'Philosophy and Religion'
            ],
            [
                'code' => '24.02',
                'subject' => 'Religion and Religious Traditions',
                'area' => 'HUMANITIES ',
                'sub_area' => 'Philosophy and Religion'
            ],
            [
                'code' => '24.03',
                'subject' => 'Other Philosophy and Religion',
                'area' => 'HUMANITIES ',
                'sub_area' => 'Philosophy and Religion'
            ],

        ]);
    }
}
