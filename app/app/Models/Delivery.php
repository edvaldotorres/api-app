<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    /* `` is an array property in the `Delivery` model class that specifies which attributes
    are mass assignable. This means that these attributes can be set in bulk using the `create()` or
    `update()` methods without having to individually set each attribute. In this case, the `title`,
    `description`, `delivery_date`, and `is_delivered` attributes can be mass assigned. */

    protected $fillable = [
        'title',
        'description',
        'delivery_date',
        'is_delivered',
    ];
}
