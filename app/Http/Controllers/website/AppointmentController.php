<?php

namespace App\Http\Controllers\website;

use App\Events\ChatEvent;
use App\Events\ConversationEvent;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Chat;
use App\Models\Conversation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('website.pages.appointments', compact('appointments'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'details' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
            'amount' => 'required',
            'worker_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('failed', 'appointment failed')->withErrors($validator->errors())->withInput($request->all());
        }

        $data = $validator->validated();
        $data['user_id'] = Auth::id();
        $appointment = Appointment::create($data);
        $message = Auth::user()->name . ' created proposal of ' . $request->amount;

        $this->createSystemMessage($request->worker_id, Auth::id(), $message, $appointment->id);
        return redirect()->back()->with('success', 'Appointment booked successfully');
    }

    public function show(Appointment $appointment)
    {
        if ($appointment->user_id != Auth::id()) {
            abort(403);
        }
        return view('website.pages.appointment-details', compact('appointment'));
    }

    public function confirmed(Request $request)
    {
        $appointment = Appointment::find($request->appointment_id);
        $appointment->update([
            'status' => 'confirmed'
        ]);
        $message = "This appointment has been confirmed";
        $this->createSystemMessage($appointment->worker_id, $appointment->user_id, $message, $appointment->id);
        return redirect()->back()->with('success', 'Appointment confirmed successfully');
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

    public function complete(Request $request)
    {
        $appointment = Appointment::find($request->appointment_id);
        Review::create([
            'worker_id' => $appointment->worker_id,
            'user_id' => $appointment->user_id,
            'appointment_id' => $appointment->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'on_time' => $request->on_time == 1 ? 1 : 0,
            'rating' => $request->rating ?? 0,
            'message' => $request->message,
        ]);
        $appointment->update([
            'status' => 'completed'
        ]);
        return redirect()->back()->with('success', 'Appointment completed successfully');
    }

    public function notShowed(Request $request)
    {
        Appointment::find($request->appointment_id)->update([
            'status' => 'not_showed'
        ]);

        return redirect()->back()->with('success', 'Appointment status changed successfully');
    }
}
