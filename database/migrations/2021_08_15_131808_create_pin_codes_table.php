<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pin_codes', function (Blueprint $table) {
            $table->id();
            $table->string('office_name');
            $table->string('pin_code');
            $table->tinyText('office_type');
            $table->tinyText('delivery_status');
            $table->string('division');
            $table->string('region');
            $table->string('circle');
            $table->string('taluk');
            $table->string('district');
            $table->string('state');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index('pin_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pin_codes');

    }
}
