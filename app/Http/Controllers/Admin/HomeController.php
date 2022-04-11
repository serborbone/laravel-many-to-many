<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

      // mi ritorna i dati dell'user loggato
      $user = Auth::user();

      // mi ritorna l'ID dell'user loggato
      $id = Auth::id();

      return view('admin.home', compact('user'));
    }
}
