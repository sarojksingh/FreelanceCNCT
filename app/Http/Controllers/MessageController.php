<?php



namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        // Retrieve messages for the logged-in user
        $messages = Message::with(['sender', 'receiver'])
            ->where('receiver_id', auth()->id()) // Get messages received by the user
            ->get();

        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:255',
            'receiver_id' => 'required|exists:users,id',
        ]);

        // Create a new message
        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
        ]);

        return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
    }
}
