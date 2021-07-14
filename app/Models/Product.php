<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property mixed taxes
 * @property mixed price
 * @property bool active
 * @property mixed|string photo
 * @property string description
 * @property string name
 * @property string sku
 * @method static active()
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'description',
        'photo',
        'price',
        'taxes',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    protected $appends = ['url_photo'];

    public function ScopeActive($query)
    {
        return $query->where('active', true);
    }

    public function getUrlPhotoAttribute()
    {
        return Str::contains($this->photo, 'images/') ? $this->attributes['photo'] : "images/{$this->attributes['photo']}";
    }

    public function saleDetails(): HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }
}
