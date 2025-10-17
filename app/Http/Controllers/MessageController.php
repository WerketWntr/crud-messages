<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    use AuthorizesRequests;
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

        auth()->user()->messages()->create($validated);


        return redirect('/')->with('success', 'Message created!');
    }


    public function update(Request $request, Message $message)
    {
        $this->authorize('update', $message);

        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',

        ]);

        $message->update($validated);

        return redirect('/')->with('success', 'Message updated!');
    }

    public function edit(Message $message)
    {
        $this->authorize('update', $message);

        return view('messages.edit', compact('message'));
    }

    public function destroy(Message $message)
    {

        $this->authorize('delete', $message);
        $message->delete();
        return redirect('/')->with('success', 'Message deleted!');

    }

}
