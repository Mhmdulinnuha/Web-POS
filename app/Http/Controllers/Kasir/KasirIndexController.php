<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- WAJIB ADA INI
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KasirIndexController extends Controller
{
    public function dashboardksr(): View
    {
        return view('kasir.dashboardksr');
    }
}
