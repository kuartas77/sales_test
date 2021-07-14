<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method create(array $array)
 * @property string client
 * @property string phone
 * @property string email
 * @property float|int subtotal
 * @property float|int total_taxes
 * @property float|int total
 */
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'phone',
        'email',
        'subtotal',
        'total_taxes',
        'total',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }

}
