<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'available_stock'
    ];

    /**
     * The products that use the tool.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
