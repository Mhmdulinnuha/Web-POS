<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminIndexController extends Controller
{
    /**
     * Menampilkan Halaman Produk
     */
    public function produk(): View
    {
        return view('admin.produk');
    }

    /**
     * Menampilkan Halaman Kasir (Daftar User/Staf)
     */
    public function kasir(): View
    {
        return view('admin.kasir');
    }

    /**
     * Menampilkan Halaman Laporan
     */
    public function laporan(): View
    {
        return view('admin.laporan');
    }

    /**
     * Menampilkan Halaman Setting Toko
     */
    public function setting(): View
    {
        return view('admin.setting');
    }
}