<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ResearchFieldsSeeder::class);
        $this->call(SocioEconomicSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(RegistrasiTokensSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(LembagaSeeder::class);
        $this->call(KlasifikasiBidangIlmuSeeder::class);
    }
}
