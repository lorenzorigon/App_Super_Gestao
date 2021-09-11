<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '432432';
        $contato->email = 'sistema@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Welcomo ao sistema';
        $contato->save();*/

        SiteContato::factory()->count(100)->create();
    }
}
