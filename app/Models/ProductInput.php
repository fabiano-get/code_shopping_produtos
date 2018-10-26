<?php

namespace CodeShopping\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInput extends Model
{
    protected $fillable = ['amount', 'product_id'];

    //many-to-one
    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
}
//select * from product_inputs
//cada vez que acesso o relacionamento -> consulta o banco de dados
