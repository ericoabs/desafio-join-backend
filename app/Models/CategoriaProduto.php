<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Produto;

class CategoriaProduto extends Model
{
    use HasFactory;
    protected $table = 'tb_categoria_produto';
    protected $primaryKey = 'id_categoria_planejamento';

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class,  'id_categoria_produto', 'id_categoria_planejamento');
    }
}
