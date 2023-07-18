<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// objeto do tipo Evento
class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array',
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    public function user() {
        // pertence a um
        return $this->belongsTo('App\Models\User');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
