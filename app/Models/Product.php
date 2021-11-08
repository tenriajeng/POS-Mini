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
        'supplier_id',
        'name',
        'image',
        'price',
        'stock',
        'description',
        'status',
    ];

    protected $hidden = array('supplier_id');

    protected $appends = array('suppliers', 'categories');

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function getSuppliersAttribute($value)
    {
        $value = $this->attributes['supplier_id'];
        return $this->attributes['supplier'] = Supplier::find($value)->name;
    }

    public  function getCategoriesAttribute()
    {
        $value = ProductCategory::where('product_id', $this->attributes['id'])->get();

        $result = collect($value)->map(
            function ($item, $key) {
                return Category::find($item['category_id']);
            }
        );

        return $this->attributes['categories'] = $result;
    }
}
