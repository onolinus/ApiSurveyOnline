<?php

use Illuminate\Database\Seeder;

class RegistrasiTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [];
		$i = 1;

		while($i <= 300) {
			$i++;

			// set data di sini setiap looping
			$data[$i] = [
                'token' => str_random(10),
                'used' => 0,
            ];
		}

        DB::table('registrasi_tokens')->insert($data);
    }
}





