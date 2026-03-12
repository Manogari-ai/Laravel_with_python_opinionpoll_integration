<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PollController extends Controller
{

    // Show Questions
    public function index()
    {

        if(!Session::has('user_id'))
        {
            return redirect('/login');
        }

        $response = Http::get('http://127.0.0.1:8001/api/questions/');

        $questions = $response->json();

        return view('poll.index', compact('questions'));
    }


    // Submit Vote
    public function vote(Request $request)
    {

        $request->validate([
            'choice_id' => 'required'
        ]);

        $response = Http::post('http://127.0.0.1:8001/api/vote/', [

            'choice_id' => $request->choice_id,
            'user_id' => Session::get('user_id')

        ]);

        $data = $response->json();

        if(isset($data['error']))
        {
            return back()->with('error',$data['error']);
        }

        if(isset($data['message']))
        {
            return back()->with('message',$data['message']);
        }

        return back()->with('error','Something went wrong');
    }

}