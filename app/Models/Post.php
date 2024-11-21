<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'is_active',
    ];
    
    protected $guarded = [
        'is_active',
    ];

    /* Mutadores y accesores */
    protected function title():Attribute{
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => Str::title($value),
        );
    }

    protected function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d-m-Y');
    }

    protected function getUpdatedAtAttribute($date){
        return Carbon::parse($date)->format('d-m-Y');
    }

    /* Casting */
    protected function casts(){
        return [
            'title' => 'string',
            'description' => 'string',
            'category' => 'string',
            'created_at' => 'date',
            'updated_at' => 'date',
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
