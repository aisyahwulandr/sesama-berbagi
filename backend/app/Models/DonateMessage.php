<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'donor_name',
        'message',
        'sent_at',
    ];

    public function program()
    {
        return $this->belongsTo(ProgramDetail::class);
    }
}
