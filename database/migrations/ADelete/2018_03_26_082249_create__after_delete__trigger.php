<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfterDeleteTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER AfterDelete AFTER DELETE ON flowers FOR EACH ROW
        BEGIN
        INSERT INTO flowers_updated(nume, status) VALUES(OLD.nume,"DELETED");
        END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS AfterDelete');
    }
}
