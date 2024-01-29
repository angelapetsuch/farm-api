<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'available_stock', 'personnel_id'
    ];

    /**
     * The tools that are used to create the product.
     */
    public function tools()
    {
        return $this->belongsToMany(Tool::class);
    }

    /**
     * Get the personnel in charge of given product.
     */
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
