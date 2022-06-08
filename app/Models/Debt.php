<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $table = 'debts';

    protected $fillable = [
        'amount',
        'date',
        'to_whom',
        'email',
        'with',
        'reminder_amount',
        'status',
        'user_id',
    ];

    public function expenditures()
    {
        return $this->hasMany(Debt::class, 'id', 'debt_id');
    }
}
