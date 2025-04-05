<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    // Definimos los campos que queremos aceptar para insercion masiva
    protected $fillable = ['title', 'slug', 'category', 'content'];

    // Excluye los campos que no queremos aceptar para insercion masiva
    // protected $guarded = ['is_active'];

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

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
