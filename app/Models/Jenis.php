<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'jenis_id', 'id');
    }
}
