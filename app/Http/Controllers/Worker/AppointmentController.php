<?php

namespace App\Http\Controllers\Worker;

use App\Events\ChatEvent;
use App\Events\ConversationEvent;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Chat;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::where('worker_id', Auth::id())->paginate(10);
        return view('workers.pages.appointments.index', compact('appointments'));
    }

    public function show(Appointment $appointment) {
        if ($appointment->worker_id != Auth::id()) {
            abort(403);
        }
        return view('workers.pages.appointments.show', compact('appointment'));
    }

    public function status(Appointment $appointment, $status) {
        if ($appointment->worker_id != Auth::id()) {
            abort(403);
        }
        $appointment->update([
            'status' => $status
        ]);
        $message = $appointment->worker->name . " " . $status . " this appointment" ;
        $this->createSystemMessage($appointment->worker_id, $appointment->user_id, $message, $appointment->id);
        return redirect()->back()->with('success','Status updated successully');
    }
    public function createSystemMessage($workerId, $userId, $message, $appointmentId)
    {
        try {
            $conversation = Conversation::where('worker_id', $workerId)->where('user_id', $userId)->first();
            if (!$conversation) {
                $conversation = Conversation::create([
                    'user_id' => $userId,
                    'worker_id' => $workerId
                ]);
            }

            $data = Chat::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $userId,
                'receiver_id' => $workerId,
                'message' => $message,
                'is_system_message' => 1,
                'appointment_id' => $appointmentId
            ]);
            $data = Chat::with('sender')->find($data->id);
            // Log::info($data);
            try {
                event(new ChatEvent($data, $conversation->id));
            } catch (\Throwable $th) {
                Log::error("Error: " .  $th->getMessage());
            }
            try {
                $conversation = Conversation::find($conversation->id);
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
}
