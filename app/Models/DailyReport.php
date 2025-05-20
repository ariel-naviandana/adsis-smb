<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $fillable = [
        'user_id',
        'report_date',
        'title',
        'pdf_content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
