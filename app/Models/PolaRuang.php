<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolaRuang extends Model
{
    use HasFactory;
    protected $table = 'polaruang';
    protected $fillable = [
        'parent',
        'nama', 
        'deskripsi', 
        'jsonfile',
        'header',
        'category'
    ];

    // Get parent name from PolaRuang model
    public function parentname()
    {
        return $this->belongsTo(PolaRuang::class, 'parent', 'id');
    }
}
