<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iletisim extends Model
{

    protected  $table = "iletisim";

    protected $fillable = [
        'id','isim', 'mail', 'konu', 'mesaj',
    ];


    protected $hidden = [

    ];
}