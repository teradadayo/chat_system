<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                       // Table mei
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // kabusikigaisya SONY
            $table->string('open_years', "4"); // SONY is opendate "1980"
            $table->timestamps(); // created_at updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
