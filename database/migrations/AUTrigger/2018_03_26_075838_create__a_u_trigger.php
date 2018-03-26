<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAUTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER AUTrigger AFTER UPDATE ON flowers FOR EACH ROW
        BEGIN
        INSERT INTO flowers_updated(nume, status) VALUES(NEW.nume,"UPDATED");
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS AUTrigger');
    }
}
