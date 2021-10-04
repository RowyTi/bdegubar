<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('branch_category', function (Blueprint $table) {
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_category');
    }
}
