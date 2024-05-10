<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    protected $table = 'katalogs';
    protected $guarded =[];
    
    public function katalogDetail()
    {
        return $this->hasMany(KatalogDetail::class);
    }
}
