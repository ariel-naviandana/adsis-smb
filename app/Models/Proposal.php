<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'pdf_content',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
