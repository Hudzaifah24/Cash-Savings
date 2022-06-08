<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes';

    protected $fillable = [
        'amount',
        'date',
        'from',
        'saving_id',
    ];

    public function savings()
    {
        return $this->belongsTo(Saving::class, 'id', 'saving_id');
    }
}
