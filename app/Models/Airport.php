<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use function Laravel\Prompts\text;

class Airport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function englishName(): Attribute
    {
        return Attribute::get(fn() => Str::slug($this->name));
    }
}
