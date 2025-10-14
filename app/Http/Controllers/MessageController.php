<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function index()
    {

        $messages = Message::with('user')
            ->latest()
            ->take(3)
            ->get();

        return view('home', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',

        ]);

        Message::create([
            'message' => $validated['message'],
        ]);

        return redirect('/')->with('success', 'Message created!');
    }


    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',

        ]);

        $message->update($validated);

        return redirect('/')->with('success', 'Message updated!');
    }

    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect('/')->with('success', 'Message deleted!');

    }
}
