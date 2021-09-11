<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = MotivoContato::all();
        return view('site.contato',['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        //validação de dados
        $request->validate(
            [
            'nome' => 'required|min:3|max:25|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ],
        [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome pode ter no máximo 25 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'Por favor informe um email válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ]);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');

    }
}
