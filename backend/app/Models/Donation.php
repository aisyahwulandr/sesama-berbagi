<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'donor_name',
        'amount',
        'donated_at',
    ];

    public function program()
    {
        return $this->belongsTo(ProgramDetail::class);
    }
}

