<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('active')->default(1);
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->dateTime('data_ora_ricezione')->nullable();
            $table->string('contratto')->nullable();
            $table->string('id_richiesta')->nullable();
            $table->string('tipo_trasporto')->nullable();
            $table->string('categoria_prodotto')->nullable();
            $table->string('natura_bene')->nullable();
            $table->string('cdc_richiedente')->nullable();
            $table->string('recapito_richiedente')->nullable();
            $table->string('codice_localita_carico')->nullable();
            $table->string('localita_carico', 80)->nullable();
            $table->string('indirizzo_carico', 160)->nullable();
            $table->string('codice_cdc_carico')->nullable();
            $table->mediumText('descrizione_cdc_carico')->nullable();
            $table->string('localita_scarico', 80)->nullable();
            $table->string('indirizzo_scarico', 160)->nullable();
            $table->string('codice_cdc_scarico')->nullable();
            $table->mediumText('descrizione_cdc_scarico')->nullable();
            $table->string('adr', 2)->nullable();
            $table->dateTime('richiesta_differita')->nullable();
            $table->string('vincolo_di_temperatura')->nullable();
            $table->string('confezionato', 2)->nullable();
            $table->integer('numero_colli')->nullable();
            $table->mediumText('note')->nullable();
            $table->string('utente_richiedente')->nullable();
            $table->dateTime('data_ora_invio_richiesta')->nullable();
            $table->time('ora_attivazione_telefonica')->nullable();
            $table->dateTime('data_ora_viaggio_dal')->nullable();
            $table->dateTime('data_ora_viaggio_al')->nullable();
            $table->string('validatore')->nullable();
            $table->binary('data_ora_validazione')->nullable();
            $table->unsignedBigInteger('planCustomId')->nullable();
            $table->enum('stato_richiesta', ['I', 'C', 'R', 'A', 'V', 'P'])->nullable();
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
        Schema::dropIfExists('travel_requests');
    }
}
