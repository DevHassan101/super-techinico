<?php

namespace App\Http\Controllers\Worker;

use App\Events\ChatEvent;
use App\Events\ConversationEvent;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        return view('workers.pages.message.index');
    }
    public function getConversations()
    {
        try {
            $conversations = Conversation::where('worker_id', Auth::id())->get();
            return response()->json([
                'error' => false,
                'html' => view('workers.components.conversations', compact('conversations'))->render()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function getChats(Request $request)
    {
        try {
            // $worker = User::where('name', $request->worker)->first();

            $conversation = Conversation::find($request->conversation_id);

            // if (!$conversation) {
            //     $conversation = Conversation::create([
            //         'user_id' => ,
            //         'worker_id' => Auth::id()$worker->id
            //     ]);
            // }
            Chat::where('conversation_id', $conversation->id)->where('receiver_id', Auth::id())->update([
                'status' => 'seen'
            ]);
            $chats = Chat::where('conversation_id', $request->conversation_id)->get();
            return response()->json([
                'error' => false,
                'html' => view('workers.components.chats', compact('chats'))->render(),
                'user' => $conversation->user,
                'conversation' => $conversation
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function sendMessage(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'message' => 'nullable',
                'conversationId' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->getMessageBag()
                ], 410);
            }
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/files/', $name_gen);
                $filePath = 'uploads/files/' . $name_gen;
            }
            $data = Chat::create([
                'conversation_id' => $request->conversationId,
                'sender_id' => Auth::id(),
                'receiver_id' => $request->receiver,
                'message' => $request->message,
                'file' => $filePath ?? ''
            ]);
            $data = Chat::with('sender')->find($data->id);
            try {
                event(new ChatEvent($data, $request->conversationId));
                event(new NotificationEvent($data, $request->conversationId));
            } catch (\Throwable $th) {
                Log::error("Error: " .  $th->getMessage());
            }
            try {
                $conversation = Conversation::find($request->conversationId);
                event(new ConversationEvent($conversation, $conversation->user_id));
            } catch (\Throwable $th) {
                Log::error("Error: " .  $th->getMessage());
            }
            // Log::info($data);
            return response()->json([
                'error' => false,
                'message' => 'Message send successfully',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function unreadMessages()
    {
        try {
            $messages = Chat::with('sender')->where('receiver_id', Auth::id())->where('status', '!=', 'seen')->get();
            return response()->json([
                'error' => false,
                'messages' => $messages
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function markAllReadMessages()
    {
        Chat::with('sender')->where('receiver_id', Auth::id())->update(['status' => 'seen']);
        return redirect()->back()->with('success', 'All messages read successfully.');
    }
}
