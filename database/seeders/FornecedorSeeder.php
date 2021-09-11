<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();
        //método create da classe (se atentar no fillable)
        Fornecedor::create(['nome'=> 'Fornecedor 200', 'site' => 'fornecedor200.com.br', 'uf' => 'CE', 'email' => 'contato@fornecedor200.com.br']);
        //método insert
        DB::table('fornecedors')->insert(['nome'=> 'Fornecedor 300', 'site' => 'fornecedor300.com.br', 'uf' => 'CE', 'email' => 'contato@fornecedor300.com.br']);
    }
}
