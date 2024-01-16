<?php
namespace App\Http\Controllers;

class PagesController extends Controller {
    public function getIndex() {
        return view('Pages/welcome');
    }

    public function getAbout() {
        return view('Pages/about');
    }

    public function getContact() {
        return view ('Pages/contact');
    }

}