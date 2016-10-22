<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewCompareBelanjaEkstramuralIntramural extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `compare_belanja_ekstramural_intramural` AS
        SELECT
        jumlahbelanja() AS `intramural`,
        jumlahbelanja()/(jumlahbelanja() + jumlahbelanja_ekstramural()) * 100 AS `percentage_intramural`,
        jumlahbelanja_ekstramural() AS `ekstramural`,
        jumlahbelanja_ekstramural()/(jumlahbelanja() + jumlahbelanja_ekstramural()) * 100 AS `percentage_ekstramural`,
        jumlahbelanja() + jumlahbelanja_ekstramural() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `compare_belanja_ekstramural_intramural`');
    }
}
