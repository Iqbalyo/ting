<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [

        //
        'owner_id',
        'name',
        'description',
        'city',
        'address',
        'latitude',
        'longtitude', //tpi belom di fresh migrate
        'check_in_time',
        'check_out_time',
    ];

    public function owner(): BelongsTo  //ini lebih baik,karena lebih jelas 
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
