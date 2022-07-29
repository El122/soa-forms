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
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->enum("type", ["input", "select", "textarea"]);
            $table->enum("inputType", ["text", "tel", "email", "number")->nullable();
            $table->boolean("multiSelect")->nullable();
            $table->json("selectOptions")->nullable();
            $table->text("description")->nullable();

            $table->unsignedBigInteger("form_id");
            $table->index("form_id", "fields_form_idx");
            $table->foreign("form_id", "fields_form_user_fk")->on("forms")->references("id")->onDelete('cascade');

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
        Schema::dropIfExists('form_fields');
    }
};
