<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    // Eloquent obtiene todo los campos como strings
    // en esta funcion se transforman a al tipo necesario
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            set: function($value) {
                return strtolower($value);
            },
            get: function($value) {
                return ucfirst($value);
            }
        );
    }
}
