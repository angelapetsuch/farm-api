<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $table = 'personnel';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id'
    ];

    /**
     * Get the product the personnel is in charge of.
     */
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
