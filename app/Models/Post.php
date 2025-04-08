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

    // Relacion uno a muchos
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relacion muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);

        // Si no se sigue la convencion de poner los nombres
        // de las tablas alfabeticamente se pasa como segundo
        // paramtero el nombre de la tabla intermedia.
        // return $this->belongsToMany(Tag::class, 'tabla_intermedia', 'key1', 'key2');
    }
}
