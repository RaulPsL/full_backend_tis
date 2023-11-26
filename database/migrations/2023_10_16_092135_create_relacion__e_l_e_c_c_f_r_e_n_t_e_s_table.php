<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionELECCFRENTESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_eleccfrente', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_ELECCION');
            $table->integer('ID_FRENTE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relacion__e_l_e_c_c_f_r_e_n_t_e_s');
    }
}
