<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ebook extends Model
{
    protected $fillable = [
        'category_id','title','slug','author','description','language',
        'price','is_active','published_at','cover_path','file_path','preview_path',
        'pages','isbn'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
