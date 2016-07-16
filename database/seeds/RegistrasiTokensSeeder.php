<?php

use Illuminate\Database\Seeder;

class RegistrasiTokensSeeder extends Seeder
{

	CONST TOKEN_PREFIX = 'survey-online-litbang-2016';

	CONST TOKEN_SALT = 'PLAKman8*753l;&kasldmanhJyaAKAALlldsj!manHJh2JM2jksl@ksksKJ';

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
			// set data di sini setiap looping
			$data[$i] = [
                'token' => $this->generateToken($i),
                'user_id' => 0,
            ];

			$i++;
		}

        DB::table('registrasi_tokens')->insert($data);
    }


	private function generateToken($token_name){
		return substr(strtoupper(md5(sprintf('%s:%s:%s', self::TOKEN_PREFIX, self::TOKEN_SALT, $token_name))),0, 6);
	}
}





