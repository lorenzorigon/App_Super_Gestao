<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //tela de login
    public function index(Request $request){
        
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha não existe';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a página.';
        }

        return view('site.login',['titulo' => 'Login', 'erro' => $erro]);
    }

    //autenticação
    public function autenticar(Request $request){
        //regras de validação
        $regras =[
            'usuario' => 'email',
            'senha' => 'required'   
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'Digite um email válido!',
            'usuario.senha' => 'Senha obrigatória!'
        ];

        $request->validate($regras, $feedback);

        //recuperar parametros do formulário
        $email= $request->get('usuario');
        $password = $request->get('senha');


        //inciar o model User
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('cliente.index');
        }else{
            return redirect()->route('site.login',['erro' => 1]);
        }
        
    }

    public function sair(){
        session_destroy();
        return redirect('/');
    }
}
