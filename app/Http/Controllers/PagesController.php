<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Mail;

class PagesController extends Controller {
    public function getIndex() {
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        return view('Pages/welcome')->with('posts', $posts);
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

    public function postContact(Request $request) {
        $this->validate($request, [
            'subject' => 'min:3',
            'message' => 'min:3',
            'email' => 'required|email'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('a-m-r-16@hotmail.com');
            $message->subject($data['subject']);
        });

        return redirect()->back()->with('success', 'The email has bee sent!');
    }

}
