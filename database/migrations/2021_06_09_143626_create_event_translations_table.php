<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_translations', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('short_description');

            $table->string('locale')->index();

            $table->foreignIdFor(Event::class)->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['event_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_translations');
    }
}
