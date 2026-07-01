<?php

namespace App\Http\Controllers;
use App\Models\Produk;


class KontrolHome extends Controller
{
    public function home()
    {
        return view('web.home');
    }

    public function produk()
    {
        $produk = Produk::all();

    return view('web.produk', compact('produk'));
    }

    public function order()
    {
        return view('web.order');
    }

    public function about()
    {
        return view('web.about');
    }

    public function kontak()
    {
        return view('web.kontak');
    }

    public function login()
    {
        return view('web.login');
    }


