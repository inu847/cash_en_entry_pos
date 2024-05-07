<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHoliday extends Model
{
    use HasFactory;
    protected $table = 'master_holidays';
    protected $guarded =[];

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id');
    }

}