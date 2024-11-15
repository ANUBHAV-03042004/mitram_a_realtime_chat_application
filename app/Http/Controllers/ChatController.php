<?php
namespace App\Http\Controllers;

use App\Services\SimpleGemini;
use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Models\Conversation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    protected $gemini;

    public function __construct(SimpleGemini $gemini)
    {
        $this->gemini = $gemini;
        $this->middleware('auth');
    }

    public function index()
    {
        $conversations = Conversation::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
      
        $currentConversation = $conversations->first();
        $messages = $currentConversation ? $currentConversation->messages : collect();
        return view('chat', compact('conversations', 'currentConversation', 'messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'conversation_id' => 'required|exists:conversations,id',
        ]);

      
        $conversation = Conversation::where('user_id', Auth::id())
        ->findOrFail($request->conversation_id);
        // Save user message
        ChatMessage::create([
            'sender' => 'You',
            'message' => $request->message,
            'conversation_id' => $conversation->id,
        ]);

        $result = $this->gemini->chat($request->message);

        if ($result['success']) {
            // Save Gemini's response
            ChatMessage::create([
                'sender' => 'Mitr.Ai',
                'message' => $result['response'],
                'conversation_id' => $conversation->id,
            ]);
        }

        return response()->json($result);
    }

    public function newConversation()
    {
        $conversation = Conversation::create([
            'title' => 'New Conversation',
            'user_id' => Auth::id()  // Associate with current user
        ]);
        return redirect()->route('chat.show', $conversation);
    }

    public function showConversation(Conversation $conversation)
    {
        if ($conversation->user_id !== Auth::id()) {
            abort(403);
        }
        $conversations = Conversation::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $messages = $conversation->messages;
        $currentConversation = $conversation;
        return view('chat', compact('conversations', 'currentConversation', 'messages'));
    }
    public function deleteConversation(Conversation $conversation)
    {
           if ($conversation->user_id !== Auth::id()) {
            abort(403);
        }

        $conversation->delete();
        return response()->json(['success' => true]);
    }

    
}