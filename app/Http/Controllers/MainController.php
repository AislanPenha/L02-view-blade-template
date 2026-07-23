<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function showView(): View
    {
        // método 1
        /*
        $data = [
            'name'  => 'Aislan Penha',
            'email' => 'aislan.penha@gmail.com',
            'phone' => '98988404291'
        ];
        return view('admin.newPage3', $data);
        */

        // método 2
        /*
        return view('admin.newPage3',[
            'name'  => 'Aislan Penha',
            'email' => 'aislan.penha@gmail.com',
            'phone' => '98988404291'
        ]);
        */

        // método 3
        /*
        return view('admin.newPage3')
                ->with('name', 'Aislan Penha')
                ->with('email', 'aislan.penha@gmail.com')
                ->with('phone', '98988404291');
        */

        // método 4
        $name = 'Aislan Penha';
        $email = 'aislan.penha@gmail.com';
        $phone = '98988404291';
        return view('admin.newPage3', compact('name', 'email', 'phone'));
    }

    public function diretivas(): View 
    {
        $data = [
            'value' => 100,
            'cities' => ['Maranhão', 'São Paulo', 'Rio de Janeiro', 'Ceara'],
            'letters' => ['a', 'b', 'c', 'd', 'e']
        ];
        return view('diretivas', $data);
    }

    public function index(): View
    {
        return view('welcome');
    }

    public function submitForm(Request $request): void
    {
        $request->validate(
            [
            'username' => 'required|min:3',
            'senha' => 'required|min:6',
            ],
            [
                'username.required' => 'O username é obrigatório',
                'username.min' => 'O username deve ter pelo menos :min caracteres',
                'senha.required' => 'O password é obrigatório',
                'senha.min' => 'O password deve ter pelo menos :min caracteres',
            ]
            );

        echo 'Formulário submetido com sucesso.';
    }

    public function setSession(): View
    {
        session(['name' => 'Aislan Penha']);
        return view('welcome');
    }

    public function clearSession(): View
    {
        session()->forget('name');
        return view('welcome');
    }
}
