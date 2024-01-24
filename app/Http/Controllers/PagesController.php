<?php
namespace App\Http\Controllers;

class PagesController extends Controller {
    public function getIndex() {
        return view('Pages/welcome');
    }

    public function getAbout() {
        $someVar = "This variable came from the controller";
        $anotherVar = "a different one";
        $dataArray = [];
        $dataArray['name'] = 'someone';
        $dataArray['email'] = 'someone@mail.com';
        $dataArray['age'] = '900';
        return view('Pages/about')->with('someVar', $someVar)
        ->withAnotherVar($anotherVar)->withDataArray($dataArray);
    }

    public function getContact() {
        return view ('Pages/contact');
    }

}