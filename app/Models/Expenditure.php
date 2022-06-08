<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    protected $table = 'expenditures';

    protected $fillable = [
        'amount',
        'date',
        'for',
        'proof',
        'user_id',
        'debt_id',
    ];

    public function debt()
    {
        return $this->belongsTo(Expenditure::class, 'id', 'debt_id');
    }
}
