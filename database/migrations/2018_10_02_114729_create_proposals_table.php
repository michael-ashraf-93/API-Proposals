<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('proposal_type');
            $table->string('technical_approval');
            $table->string('proposal_number');
            $table->string('client_source');
            $table->string('sales_agent');
            $table->string('client_name');
            $table->string('proposal_date');
            $table->string('proposal_value');
            $table->string('proposal_code');
            $table->timestamps();
        });
//        DB::statement('ALTER TABLE proposals CHANGE proposal_number proposal_number INT(5) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
