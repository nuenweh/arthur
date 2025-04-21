<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->dateTime('date');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps(); // Adds created_at and updated_at
        });

        Schema::create('event_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('key');
            $table->text('value')->nullable();
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unique(['event_id', 'key']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_attributes');
        Schema::dropIfExists('events');
    }
}
?>
