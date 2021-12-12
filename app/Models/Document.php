<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Document extends Model
{
    use HasFactory, Uuid, Notifiable;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = ['status', 'payload'];

    protected $casts = [
        'payload' => 'object',
    ];
}
