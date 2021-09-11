<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos(){
        //return $this->belongsToMany('App\Models\Produto', 'pedido_produtos');
        return $this->belongsToMany('App\Models\Item', 'pedido_produtos','pedido_id','produto_id')->withPivot('id','created_at','updated_at');
    }
    use HasFactory;
}
