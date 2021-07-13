<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
