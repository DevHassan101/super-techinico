<?php

namespace App\Http\Controllers\website;

use App\Events\ChatEvent;
use App\Events\ConversationEvent;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Conversation;
use App\Models\Location;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use App\Events\MyEvent;

class WebController extends Controller
{
    public function pusher1()
    {
        try {
            event(new MyEvent('hello world'));
            return 1;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function pusher()
    {
        try {
            event(new ChatEvent("helow rold", 1));
            return 1;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function index()
    {
        $locations = Location::get();
        $positions = Position::get();

        $workers = User::role('worker')->get();
        return view('website.index', compact('locations', 'positions', 'workers'));
    }
    public function workers(Request $request)
    {
        $positions = Position::get();
        $locations = Location::get();
        return view('website.pages.workers', compact('positions', 'locations'));
    }
    public function getWorkers(Request $request)
    {
        try {
            $query = User::role('worker')->where('status', 'accepted');
            if ($request->keyword) {
                $query->where('name', 'LIKE', "%$request->keyword%");
            }
            if ($request->position) {
                $query->where('position_id', 'LIKE', "%$request->position%");
            }
            if ($request->location) {
                $query->where('location_id', 'LIKE', "%$request->location%");
            }
            if ($request->minPrice) {
                $query->where('price', '>=', $request->minPrice);
            }
            if ($request->maxPrice) {
                $query->where('price', '<=', "$request->maxPrice");
            }
            $workers = $query->get();
            return response()->json([
                'error' => false,
                'html' => view('website.pages.partials.worker-cards', compact('workers'))->render(),
                'request' => $request->all()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ]);
        }
    }
    public function workersProfile($worker)
    {
        $name = str_replace('-', ' ', $worker);
        $worker = User::role('worker')->where('name', $name)->firstOrFail();
        $otherWorkers = User::role('worker')->whereNot('id', $worker->id)->where(function ($query) use ($worker) {
            $query->where('location_id', $worker->location_id)->orWhere('position_id', $worker->position_id);
        })->get();
        return view('website.pages.workers-profile', compact('worker','otherWorkers'));
    }
    public function chat()
    {
        return view('website.pages.chat');
    }
    public function getConversations()
    {
        try {
            // sleep(500);
            $conversations = Conversation::where('user_id', Auth::id())->get();
            return response()->json([
                'error' => false,
                'html' => view('website.components.conversations', compact('conversations'))->render()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function getChats(Request $request)
    {
        try {
            $worker = User::where('name', $request->worker)->first();

            $conversation = Conversation::where('user_id', Auth::id())->where('worker_id', $worker->id)->first();

            if (!$conversation) {
                $conversation = Conversation::create([
                    'user_id' => Auth::id(),
                    'worker_id' => $worker->id
                ]);
            }
            Chat::where('conversation_id', $conversation->id)->where('receiver_id', Auth::id())->update([
                'status' => 'seen'
            ]);
            $chats = Chat::where('conversation_id', $conversation->id)->get();

            return response()->json([
                'error' => false,
                'html' => view('website.components.chats', compact('chats'))->render(),
                'worker' => $worker,
                'conversation' => $conversation
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function sendMessage(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'worker' => 'required',
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
            // $workerId = User::where('name', $request->name)->first()->id;
            $data = Chat::create([
                'conversation_id' => $request->conversationId,
                'sender_id' => Auth::id(),
                'receiver_id' => $request->worker,
                'message' => $request->message,
                'file' => $filePath ?? ''
            ]);
            $data = Chat::with('sender')->find($data->id);
            // Log::info($data);
            try {
                event(new ChatEvent($data, $request->conversationId));
                event(new NotificationEvent($data, $request->conversationId));
            } catch (\Throwable $th) {
                Log::error("Error: " .  $th->getMessage());
            }
            try {
                $conversation = Conversation::find($request->conversationId);
                event(new ConversationEvent($conversation, $conversation->worker_id));
            } catch (\Throwable $th) {
                Log::error("Error: " .  $th->getMessage());
            }
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
    public function sendMessageAll(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'position' => 'required',
                'location' => 'nullable',
                'message' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->getMessageBag()
                ], 410);
            }
            $workers = User::role('worker')
                ->where('position_id', $request->position)
                ->where('location_id', $request->location)
                ->get();
            foreach ($workers as $worker) {
                $conversation = Conversation::create([
                    'worker_id' => $worker->id,
                    'user_id' => Auth::id(),
                ]);
                $data = Chat::create([
                    'conversation_id' => $conversation->id,
                    'sender_id' => Auth::id(),
                    'receiver_id' => $worker->id,
                    'message' => $request->message
                ]);
                $data = Chat::with('sender')->find($data->id);
                try {
                    event(new ChatEvent($data, $conversation->id));
                    event(new NotificationEvent($data, $conversation->id));
                } catch (\Throwable $th) {
                    Log::error("Error: " .  $th->getMessage());
                }
                try {
                    $conversation = Conversation::find($conversation->id);
                    event(new ConversationEvent($conversation, $conversation->worker_id));
                } catch (\Throwable $th) {
                    Log::error("Error: " .  $th->getMessage());
                }
            }
            return response()->json([
                'error' => false,
                'message' => 'Message send successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function registration()
    {
        return view('website.admin.pages.registration.registration');
    }
    public function privacyPolicy() {
        return view('website.pages.privacy-policy');
    }
    public function termsAndConditions() {
        return view('website.pages.terms-and-conditions');
    }
    public function aboutUs() {
        return view('website.pages.about-us');
    }
}
