<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BargainService extends Model
{
    use HasFactory;
    protected $fillable = [
        'bargain_id',
        'service_id',
        'price'
    ];
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
