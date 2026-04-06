@forelse ($chats as $chat)
    @if ($chat->is_system_message)
        <div class="flex justify-center">
            <div class="bg-slate-200 rounded-full font-semibold p-2 px-4">
                {{ $chat->message }}
                <a href="{{ route('worker.appointment.show', ['appointment' => $chat->appointment_id ?? 1]) }}"
                    class="text-sm underline" target="_blank">View appointment</a>
            </div>
        </div>
    @else
        @if (Auth::id() == $chat->sender_id)
            <div class="flex items-end justify-end gap-2">
                <div class="{{$chat->file ? 'bg-slate-200 p-2 rounded' : ''}}">

                    <!-- Display file attachment if exists -->
                    @if ($chat->file)
                        <div class="mb-2">
                            @php
                                $fileExtension = pathinfo($chat->file, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                <!-- Image Preview -->
                                <a href="{{ asset($chat->file) }}" target="_blank">
                                    <img src="{{ asset($chat->file) }}" alt="image attachment"
                                        class="max-w-[200px] rounded-lg">
                                </a>
                            @elseif (in_array($fileExtension, ['pdf', 'docx', 'txt']))
                                <!-- Document Preview -->
                                <a href="{{ asset($chat->file) }}" target="_blank" class="text-blue-500 text-sm">
                                    View Document
                                </a>
                            @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                <!-- Video Preview -->
                                <a href="{{ asset($chat->file) }}" target="_blank">
                                    <video width="200" controls>
                                        <source src="{{ asset($chat->file) }}" type="video/mp4">
                                    </video>
                                </a>
                            @else
                                <!-- Other file type -->
                                <a href="{{ asset($chat->file) }}" target="_blank" class="text-blue-500 text-sm">
                                    Download File
                                </a>
                            @endif
                        </div>
                    @endif
                    @if ($chat->message)
                        <div
                            class="bg-[#FF70A6] text-white px-4 py-2 rounded-tl-[10px] rounded-tr-[10px] rounded-bl-[10px] rounded-br-[10px] text-sm user-chat">
                            {{ $chat->message }}
                        </div>
                    @endif

                    <div class="text-xs text-gray-400 mt-1 text-left ml-[20px]">
                        {{ date('h:i A', strtotime($chat->created_at)) }}
                    </div>
                </div>
                <img src="{{ asset($chat->sender->image ?? 'worker/assets/images/person.png') }}"
                    class="w-8 h-8 rounded-full">
            </div>
        @else
            <div class="flex items-end gap-2">
                <img src="{{ asset($chat->sender->image ?? 'worker/assets/images/person.png') }}"
                    class="w-8 h-8 rounded-full">
                <div class="{{$chat->file ? 'bg-slate-200 p-2 rounded' : ''}}">
                    @if ($chat->file)
                        <div class="mb-2">
                            @php
                                $fileExtension = pathinfo($chat->file, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                <a href="{{ asset($chat->file) }}" target="_blank">
                                    <img src="{{ asset($chat->file) }}" alt="image attachment"
                                        class="max-w-[200px] rounded-lg">
                                </a>
                            @elseif (in_array($fileExtension, ['pdf', 'docx', 'txt']))
                                <a href="{{ asset($chat->file) }}" target="_blank" class="text-blue-500 text-sm">
                                    View Document
                                </a>
                            @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                <a href="{{ asset($chat->file) }}" target="_blank">
                                    <video width="200" controls>
                                        <source src="{{ asset($chat->file) }}" type="video/mp4">
                                    </video>
                                </a>
                            @else
                                <a href="{{ asset($chat->file) }}" target="_blank" class="text-blue-500 text-sm">
                                    Download File
                                </a>
                            @endif
                        </div>
                    @endif
                    @if ($chat->message != null)
                        <div
                            class="bg-[#DEE3FF] px-4 py-2 rounded-tl-[10px] rounded-tr-[10px] rounded-bl-[0px] rounded-br-[10px] text-sm text-gray-800 client-chat">
                            {{ $chat->message }}
                        </div>
                    @endif

                    <div class="text-xs text-gray-400 mt-1">{{ date('h:i A', strtotime($chat->created_at)) }}</div>
                </div>
            </div>
        @endif
    @endif
@empty
@endforelse
