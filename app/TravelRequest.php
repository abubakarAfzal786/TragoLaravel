<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRequest extends Model
{
    protected $table = 'travelRequests';


    public function planCustom()
    {
        return $this->hasOne('App\PlanHandheld', 'id', 'planCustomId');
    }

    public function transportationType()
    {
        return $this->hasOne('App\TransportationType', 'groupId', 'id');
    }

    public function cdcs()
    {
        return $this->hasOne('App\CDCS', 'id', 'cdc_richiedente');
    }

    public function address()
    {
        return $this->hasOne('App\Address', 'id', 'codice_localita_carico');
    }

    public function contract()
    {
        return $this->hasOne('App\Contract', 'id', 'contracts');
    }


    //protected $fillable = [
      //  'active', 'deleted_at', 'created_by', 'updated_by', 'deleted_by', 'data_ora_ricezione', 'contratto', 'id_richiesta', 'tipo_trasporto', 'categoria_prodotto', 'natura_bene', 'cdc_richiedente', 'recapito_richiedente', 'codice_localita_carico','localita_carico','indirizzo_carico', 'codice_cdc_carico', 'descrizione_cdc_carico','localita_scarico','indirizzo_scarico','codice_cdc_scarico', 'descrizione_cdc_scarico', 'adr', 'richiesta_differita', 'vincolo_di_temperatura', 'confezionato', 'numero_colli', 'note', 'utente_richiedente','data_ora_invio_richiesta', 'ora_attivazione_telefonica','data_ora_viaggio_dal','data_ora_viaggio_al', 'validatore', 'data_ora_validazione', 'planCustomId', 'stato_richiesta'
    //];


    /*public function saveRequest($request)
    {



        $this->create([
            'stato_richiesta'=>$request->stato_richiesta,
            'contratto'=>$request->contratto,
            'tipo_trasporto'=>$request->tipo_trasporto,
            'planCustomId'=>$request->planCustomId,
            'indirizzo_carico'=>$request->indirizzo_carico,
            'descrizione_cdc_carico'=>$request->descrizione_cdc_carico,
            'codice_localita_scarico'=>$request->codice_localita_scarico,
            'codice_cdc_scarico'=>$request->codice_cdc_scarico,
            'indirizzo_scarico'=>$request->indirizzo_scarico,
            'descrizione_cdc_scarico'=>$request->descrizione_cdc_scarico,
            'adr'=>$request->adr,
            'vincolo_di_temperatura'=>$request->vincolo_di_temperatura,
            'confezionato'=>$request->confezionato,
            'numero_colli'=>$request->numero_colli,
            'note'=>$request->note,

        ]);

          return redirect()->back();*/

    }






