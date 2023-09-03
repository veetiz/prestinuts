<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Schema::dropAllTables();

        Schema::create('utenti', function (Blueprint $table) {
            $table->id('ID');
            $table->string('nome', 20);
            $table->string('cognome', 20)->nullable();
            $table->string('email', 255)->unique();
            $table->string('username', 30)->unique();
            $table->string('password', 255);
            $table->date('data_di_nascita');
            $table->tinyInteger('tipo');
        });
        DB::statement('ALTER TABLE utenti ADD `partita_iva` INTEGER(12) NULL');

        Schema::create('categorie', function(Blueprint $table){
            $table->id('ID');
            $table->string('nome', 15);
        });

        Schema::create('prodotti', function(Blueprint $table){
            $table->id('ID');
            $table->string('nome', 35);
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_utente');
            $table->double('prezzo');
            $table->text('descrizione');
            $table->integer('stock')->default(1);

            $table->foreign('id_utente')
                ->references('ID')
                ->on('utenti')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_categoria')
                ->references('ID')
                ->on('categorie')
                ->onDelete('cascade');
        });

        Schema::create('carrelli_utente', function(Blueprint $table){
            $table->id('ID');
            $table->unsignedBigInteger('id_prodotto');
            $table->unsignedBigInteger('id_utente');

            $table->foreign('id_prodotto')
                ->references('ID')
                ->on('prodotti')
                ->onDelete('cascade');

            $table->foreign('id_utente')
                ->references('ID')
                ->on('utenti')
                ->onDelete('cascade');
        });

        Schema::create('prodotti_acquistati', function(Blueprint $table){
            $table->id('ID');
            $table->unsignedBigInteger('id_prodotto');
            $table->unsignedBigInteger('id_utente');
            $table->dateTime('data_di_acquisto')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('id_prodotto')
                ->references('ID')
                ->on('prodotti')
                ->onDelete('cascade');

            $table->foreign('id_utente')
                ->references('ID')
                ->on('utenti')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
