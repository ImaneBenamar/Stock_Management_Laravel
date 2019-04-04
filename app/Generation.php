<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    //

    protected $fillable = [
        'mode',
        'type_id',
        'date',
        'numero_facture',
        'quantite',
        'prix_unitaire',
        'fournisseur'
    ];

    public function type(){
        return $this->belongsTo('App\Type');
    }

}
