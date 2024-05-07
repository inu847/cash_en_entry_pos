<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogDetail extends Model
{
    use HasFactory;
    protected $table = 'katalog_details';
    protected $guarded =[];

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'katalog_id');
    }

}