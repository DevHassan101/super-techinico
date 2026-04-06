<?php

namespace App\Jobs;

use App\Events\ChatEvent;
use App\Events\ConversationEvent;
use App\Models\Appointment;
use App\Models\Chat;
use App\Models\Conversation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckAppointmentTime implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        Log::info('i worked');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $appointments = Appointment::where('status','confirmed')
        ->where('notification_sent', 0)
        ->where('booking_time', '<=', now()->subHour())
        ->get(); 
        Log::info($appointments);
        Log::info(now()->subHour());
        foreach ($appointments as $appointment) {
            try {
                $message = "Is your work done?";
                $this->createSystemMessage($appointment->worker_id, $appointment->user_id, $message, $appointment->id);
                $appointment->update([
                    'notification_sent' => 1
                ]);
            } catch (\Throwable $th) {
                Log::info("Error while creating system notification in checkappointmenttime job:");
                Log::error($th->getMessage());
            }
            // Mail::to($appointment->user->email)->send(new \App\Mail\AppointmentReminderMail($appointment));
        
            // $appointment->user->notify(new AppointmentReminder($appointment));
            // $appointment->update(['notification_sent' => 1]);
        }
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
