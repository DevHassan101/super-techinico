@forelse ($conversations as $conversation)
    <div class="chat-user-item active" data-conversation-id="{{ $conversation->id }}">
        {{-- @if ($conversation->user->image) --}}
        <img src="{{ asset($conversation->user->image ?? 'worker/assets/images/person.png') }}" alt="Lisa Roy"
            class="chat-user-avatar">
        {{-- @else
            <div class="chat-user-avatar flex justify-center items-center text-white bg-slate-300">
                {{ $conversation->user->name[0] }}
            </div>
        @endif --}}
        <div class="chat-user-info">
            <h3 class="chat-user-name">{{ $conversation->user->name }}</h3>
            <p class="chat-user-message">{{ $conversation->last_message()->message ?? 'Start conversation' }}</p>
        </div>
        <div class="flex flex-col items-end">
            <span
                class="chat-user-time">{{ $conversation->last_message() ? date('h:i A', strtotime($conversation->last_message()->created_at)) : '' }}</span>
            <div class="message-indicator">
                @if ($conversation->unreadMessagesCount())
                    <div
                        class="bg-[#FF71A6] text-white h-5 w-5 flex items-center justify-center rounded-full text-sm message-icon-{{ $conversation->id }}">
                        {{ $conversation->unreadMessagesCount() ?? '' }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@empty
@endforelse

<script>
    $('.chat-user-item').click(function(e) {
        e.preventDefault();
        // alert(0)
        conversationId = $(this).data('conversation-id');
        getChats();
        console.warn(conversationId);

    });
</script>
