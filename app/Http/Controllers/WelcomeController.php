<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome.index');
    }

    public function booking() {
        return view('welcome.booking')
        ->with('user', Auth::user() ?? null)
        ->with('credit_cards', Auth::user() ? Auth::user()->creditCards()->get() : null)
        ->with('tables', Table::all())
        ->with('menus', Menu::all());
    }

    public function contact() {
        return view('welcome.contact');
    }


    public function login() {
        return view('welcome.login');
    }

    public function message() {
        return view('welcome.message');
    }

    public function rmessage() {
        return view('welcome.rmessage');
    }

}
