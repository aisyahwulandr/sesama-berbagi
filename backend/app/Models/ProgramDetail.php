<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'title',
        'description',
        'fundraiser_name',
        'fundraiser_organization',
        'status',
        'status_details',
    ];

    protected $casts = [
        'status_details' => 'array',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function donorMessages()
    {
        return $this->hasMany(DonateMessage::class);
    }
}
