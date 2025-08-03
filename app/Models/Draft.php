<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;

    protected $connection = 'dnd_hero';

    protected $table = 'drafts';

    protected $guarded = [];
}
