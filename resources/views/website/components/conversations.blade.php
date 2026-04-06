@forelse ($conversations as $conversation)
    <div class="chat-user-item" data-worker="{{ $conversation->worker->name }}">
        <img src="{{ $conversation->worker->image ?? 'https://randomuser.me/api/portraits/women/68.jpg' }}"
            alt="Jamie Taylor" class="chat-user-avatar">
        <div class="chat-user-info">
            <h3 class="chat-user-name text-[#FF71A6] font-bold">{{ $conversation->worker->name ?? '' }}</h3>
            <p class="chat-user-message">{{ $conversation->last_message()->message ?? 'start conversation' }}</p>
        </div>
        <div class="flex flex-col items-end">
            <span
                class="chat-user-time text-[#FF71A6]">{{ $conversation->last_message() ? date('h:i A', strtotime($conversation->last_message()->created_at)) : '' }}</span>
            <div class="message-indicator">
                @if ($conversation->unreadMessagesCount())
                    <div class="bg-[#FF71A6] text-white h-5 w-5 flex items-center justify-center rounded-full text-sm message-icon-{{$conversation->id}}">
                        {{ $conversation->unreadMessagesCount() ?? '' }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@empty
    <div class="chat-user-item">
        <span>
            No Converstion Found
        </span>
    </div>
@endforelse

<script>
    $('.chat-user-item').click(function(e) {
        e.preventDefault();
        // alert(0)
        worker = $(this).data('worker');
        getChats(worker);
        // console.warn(conversationId);

    });
</script>
