<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    public function last_message()
    {
        return $this->chats()->whereNotNull('message')->latest()->first() ?? null;
    }
    public function unreadMessages() {
        return $this->chats()->where('receiver_id', Auth::id())->where('status', '!=', 'seen');        
    }
    public function unreadMessagesCount() {
        return $this->unreadMessages()->count();        
    }
}
