<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->uuid('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('description', 120);
            $table->decimal('value', 8, 2);
            $table->dateTime('due_date');
            $table->dateTime('pay_day')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id', 'movements_users_fk')
                ->references('id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('category_id', 'movements_categories_fk')
                ->references('id')
                ->on('categories')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('type_id', 'movements_types_fk')
                ->references('id')
                ->on('types')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('payment_method_id', 'movements_payment_method_fk')
                ->references('id')
                ->on('payment_methods')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
};
