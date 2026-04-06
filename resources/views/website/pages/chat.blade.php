@extends('website.layouts.app')
@section('title', 'Chat')
@section('content')
    <style>
        /* Platform Hairline */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Hairline.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Hairline.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Hairline.ttf') }}") format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-HairlineItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-HairlineItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-HairlineItalic.ttf') }}") format('truetype');
            font-weight: 100;
            font-style: italic;
        }

        /* Platform Light */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Light.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Light.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Light.ttf') }}") format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-LightItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-LightItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-LightItalic.ttf') }}") format('truetype');
            font-weight: 300;
            font-style: italic;
        }

        /* Platform Regular */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Regular.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Regular.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Regular.ttf') }}") format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-RegularItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-RegularItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-RegularItalic.ttf') }}") format('truetype');
            font-weight: 400;
            font-style: italic;
        }

        /* Platform Medium */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Medium.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Medium.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Medium.ttf') }}") format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-MediumItalic.woff2') }}")
        }
        }

        ") format('woff2'),
     url("{{ asset('assets/fonts/Platform-MediumItalic.woff') }}")
        }
        }

        ") format('woff'),
     url("{{ asset('assets/fonts/Platform-MediumItalic.ttf') }}")
        }
        }

        ") format('truetype');
     font-weight: 500;
        font-style: italic;
        }

        /* Platform Bold */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Bold.woff2') }}")
        }
        }

        ") format('woff2'),
     url("{{ asset('assets/fonts/Platform-Bold.woff') }}")
        }
        }

        ") format('woff'),
     url("{{ asset('assets/fonts/Platform-Bold.ttf') }}")
        }
        }

        ") format('truetype');
     font-weight: 700;
        font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-BoldItalic.woff2') }}")
        }
        }

        ") format('woff2'),
     url("{{ asset('assets/fonts/Platform-BoldItalic.woff') }}")
        }
        }

        ") format('woff'),
     url("{{ asset('assets/fonts/Platform-BoldItalic.ttf') }}")
        }
        }

        ") format('truetype');
     font-weight: 700;
        font-style: italic;
        }


        * {
            font-family: 'Platform', sans-serif;
        }
    </style>

    <style>
        p.chat-user-message {
            font-size: 13px;
            line-height: 14px;
        }

        .chat-user-item:hover,
        .chat-user-item.active {
            background-color: #DDE2FF;
            border-left: 5px solid #329A93;
        }

        .chat-user-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .chat-user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .chat-user-info {
            flex: 1;
        }

        .chat-user-time {
            font-size: 12px;
            color: #FF71A6;
            margin-right: 5px;
            white-space: nowrap;
        }

        .client-chat:before {
            content: "";
            height: 10px;
            width: 10px;
            position: absolute;
            bottom: -10px;
            left: 0;
            border-radius: 0px 0px 500px 0px;
            background: url("{{ asset('assets/images/client.png') }}");
            background-repeat: no-repeat;
            background-size: contain;
        }

        .client-chat {
            position: relative;
            width: 100%;
            max-width: 300px;
        }

        .user-chat:before {
            content: "";
            background: #F6339A;
            height: 12px;
            width: 10px;
            position: absolute;
            bottom: -10px;
            right: 5px;
            border-radius: 0px 0px 0px 99px;
            background: url("{{ asset('assets/images/user.png') }}");
            background-repeat: no-repeat;
            background-size: contain;
        }

        .user-chat {
            position: relative;
            width: 100%;
            max-width: 300px;
        }



        .loader {
            height: 80px;
            aspect-ratio: 1;
            padding: 10px;
            border-radius: 50%;
            box-sizing: border-box;
            position: relative;
            mask: conic-gradient(#000 0 0) content-box exclude, conic-gradient(#000 0 0);
            filter: blur(12px);
        }

        .loader:before {
            content: "";
            position: absolute;
            inset: 0;
            background: repeating-conic-gradient(#0000 0 5%, #C02942, #0000 20% 50%);
            animation: l2 1.5s linear infinite;
        }

        @keyframes l2 {
            to {
                rotate: 1turn
            }
        }


        /* HTML: <div class="loader"></div> */
        .chat-loader {
            width: 50px;
            aspect-ratio: 1;
            display: grid;
            border: 4px solid #0000;
            border-radius: 50%;
            border-color: #ccc #0000;
            animation: l16 1s infinite linear;
        }

        .chat-loader::before,
        .chat-loader::after {
            content: "";
            grid-area: 1/1;
            margin: 2px;
            border: inherit;
            border-radius: 50%;
        }

        .chat-loader::before {
            border-color: #f03355 #0000;
            animation: inherit;
            animation-duration: .5s;
            animation-direction: reverse;
        }

        .chat-loader::after {
            margin: 8px;
        }

        @keyframes l16 {
            100% {
                transform: rotate(1turn)
            }
        }
    </style>



    <div class="flex flex-col md:flex-row gap-[20px] md:h-screen mx-[5%] mb-[50px]">

        <!-- LEFT SIDEBAR -->
        <aside class="w-full lg:w-1/4 md:w-1/2 border rounded-md border-gray-200 flex flex-col md:h-[auto] h-[350px]">
            <!-- Profile Header -->
            <div class="flex items-center gap-3 p-4">
                <img src="{{ asset(Auth::user()->image ?? 'worker/assets/images/person.png') }}"
                    class="w-10 h-10 rounded-full" />
                <h2 class="font-bold text-lg">{{ Auth::user()->name }}</h2>
            </div>

            <!-- Messages Label -->
            <div class="px-4 pt-3 text-sm font-bold">Messages</div>

            <!-- Search -->
            <div class="px-4 py-2">
                <div class="relative">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M16.5 10.5a6 6 0 11-12 0 6 6 0 0112 0z" />
                        </svg>
                    </span>
                    <input type="text" placeholder="Search chats" id="search-chat"
                        class="w-full pl-10 pr-3 py-3 rounded-[20px] text-sm bg-[#EDEDED] focus:outline-none" />
                </div>
            </div>

            <!-- Chat List -->
            <div class="overflow-y-auto flex-1 space-y-2 pr-2 pb-4" id="conversation-list">


                <div class="flex justify-center items-center h-full" id="loader">
                    <div class="loader"></div>
                </div>
            </div>
        </aside>

        <!-- RIGHT CHAT WINDOW -->
        <section class="w-full md:flex-1 flex flex-col" style="display: none" id="chat-box">

            <!-- Chat Header -->
            <div class="flex justify-between items-center bg-black text-white px-4 py-3 rounded-[10px]">
                <div class="flex items-center gap-3">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" id="worker-image"
                        class="w-10 h-10 rounded-full" />
                    <h2 class="text-sm font-semibold" id="worker-name">Sarah Johnson</h2>
                </div>
                <div class="flex gap-[50px] items-center">
                    <!--<img class="cursor-pointer" src="{{ url('assets/images/video-icon.png') }}" alt=""-->
                    <!--    style="height: 100%;">-->

                    <button id="openAppointmentModal"
                        class="bg-[#000] border-[1px] text-[#fff] text-xs px-4 py-2 rounded hover:bg-[#fff] hover:text-[#000] cursor-pointer">
                        Book An appointment
                    </button>
                </div>
            </div>

            <!-- Chat Body -->
            <div class="flex-1 overflow-y-auto px-4 py-3 space-y-4 bg-white" id="chat-list">

                <div class="flex justify-center items-center h-full" id="chat-loader">
                    <div class="chat-loader"></div>
                </div>
            </div>



            <!-- Message Input -->
            <div id="file-preview" class="mt-2 hidden">
                <div class="flex items-center justify-between gap-2 bg-slate-200 p-2 rounded-full mb-2">
                    <span id="file-name" class="text-sm text-gray-700"></span>
                    <button id="remove-file" class="text-red-500 text-xs cursor-pointer" type="button">Remove</button>
                </div>
            </div>
            <div class="px-4 py-3 flex items-center gap-3 rounded-[10px]"
                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <label for="file-upload" class="cursor-pointer inline-block">
                    <img class="h-[25px] w-[25px] " src="{{ url('assets/images/file-upload.png') }}" alt="Upload"
                        style="height: 100%; object-fit:contain;" />
                </label>
                <input type="file" id="file-upload"  accept="image/jpg, image/png, image/jpeg" class="hidden" />

                <input type="text" placeholder="Type a message" id="message"
                    class="flex-1 px-4 py-2 rounded-full border-gray-300 text-sm focus:outline-none" />

                <button href="" class="h-[30px] w-[30px]"><img src="{{ url('assets/images/send.png') }}"
                        alt="" style="height: 100%" id="send-message"></button>
            </div>

        </section>

    </div>


    @include('website.components.appointment-modal')
    {{-- @include('website.components.paymentmodal') --}}

    @push('script')
        <script>
            document.getElementById('search-chat').addEventListener('input', function() {
                let searchTerm = this.value.toLowerCase();
                let chatItems = document.querySelectorAll('.chat-user-item');
                console.log(searchTerm);
                
                chatItems.forEach(function(chatItem) {
                    let messageText = chatItem.innerText.toLowerCase();
                    if (messageText.includes(searchTerm)) {
                        chatItem.style.display = '';
                    } else {
                        chatItem.style.display = 'none';
                    }
                });
            });
            document.getElementById('file-upload').addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file) {
                    document.getElementById('file-name').textContent = file.name;
                    document.getElementById('file-preview').classList.remove('hidden');
                    document.getElementById('remove-file').onclick = function() {
                        document.getElementById('file-upload').value = '';
                        document.getElementById('file-preview').classList.add('hidden');
                    };
                }
            });
        </script>
        <script>
            var workerId = null;
            var conversationId = null;
            var assetPath = "{{ asset('/') }}";
            const inputField = document.getElementById('message');
            const button = document.getElementById('send-message');
            inputField.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    button.click();
                }
            });
            $('#worker_id').val(workerId);

            function getConversations() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('conversations') }}",
                    beforeSend: function() {
                        $('#conversation-list').empty();
                        // $('#loader').removeClass('hidden');
                    },
                    success: function(response) {
                        if (response.error) {
                            $('#conversation-list').empty();
                            return;
                        }
                        $('#conversation-list').html(response.html);
                        removeConversationCount(conversationId)

                        // $('#loader').addClass('hidden');
                    }
                });
            }
            getConversations();
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const workerParam = urlParams.get('worker');

            // console.log(workerParam); // Should output: "worker"
            function getChats(worker = null) {
                if (worker == null) {
                    worker = workerParam;
                }
                $.ajax({
                    type: "GET",
                    url: "{{ route('get.chats') }}",
                    data: {
                        worker: worker
                    },
                    beforeSend: function() {
                        $('#chat-list').empty();
                        // $('#chat-loader').removeClass('hidden');
                    },
                    success: function(response) {
                        if (response.error) {
                            $('#chat-list').empty();
                            return;
                        }
                        console.log(response);
                        let image = assetPath + response.worker.image;
                        $('#chat-list').html(response.html);
                        $('#worker-image').attr('src', image);
                        $('#worker-name').html(response.worker.name);
                        workerId = response.worker.id
                        $('#worker_id').val(workerId);
                        conversationId = response.conversation.id;
                        subscribe();
                        scrollToBottom();
                        removeConversationCount(conversationId);

                        // $('#loader').addClass('hidden');
                    }
                });
            }
            getChats();

            $('#send-message').click(function(e) {
                e.preventDefault();
                let msg = $('#message').val();
                let file = $('#file-upload')[0].files[0];
                if (!msg && !file) {
                    $('#message').addClass('border-red-500');
                    return;
                }
                $('#message').removeClass('border-red-500');
                $('#no-msg-found').remove();
                let formData = new FormData();
                formData.append('worker', workerId);
                formData.append('message', msg);
                formData.append('conversationId', conversationId);
                if (file) {
                    formData.append('file', file);
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('send.message') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'x-csrf-token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.error) {
                            console.error(response.message);
                            return;
                        }
                        $('#message').val(null);
                        console.log(response);
                        document.getElementById('file-upload').value = '';
                        document.getElementById('file-preview').classList.add('hidden');
                        createMessageElement(response.data);

                    }
                });
            });

            function createMessageElement(data) {
                console.warn(data);
                const date = new Date(data.created_at);
                const formattedTime = date.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });

                let div = ` <div class="flex items-end justify-end gap-2">
                                <div class="${data.file ? 'bg-slate-200 p-2 rounded' : ''}">
                                    ${data.file ? getFilePreview(data.file) : ''}
                                    ${data.message ? getMessagePreview2(data.message) : ''}
                                    <div class="text-xs text-gray-400 mt-1 text-left ml-[20px]">${formattedTime}</div>
                                </div>
                                <img src="{{ asset(Auth::user()->image ?? 'worker/assets/images/person.png') }}" class="w-8 h-8 rounded-full" />
                            </div>`;

                $('#chat-list').append(div);
                scrollToBottom();
            }

            function createReplyElement(message, conversationId) {
                console.warn(message);
                let myId = "{{ Auth::id() }}";
                if (message.sender_id == myId) {
                    return;
                }
                const date = new Date(message.created_at);
                const formattedTime = date.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });
                let image = assetPath + message.sender.image;
                let div = ` <div class="flex items-end gap-2">
                                <img src="${ image }" class="w-8 h-8 rounded-full" />
                                <div class="${message.file ? 'bg-slate-200 p-2 rounded' : ''}">
                                    ${message.file ? getFilePreview(message.file) : ''}
                                    ${message.message ? getMessagePreview(message.message) : ''}
                                    
                                    <div class="text-xs text-gray-400 mt-1">${ formattedTime }</div>
                                </div>
                            </div>`;

                $('#chat-list').append(div);
                scrollToBottom();
            }

            function getMessagePreview(message) {
                return `<div class="bg-[#DEE3FF] px-4 py-2 rounded-tl-[10px] rounded-tr-[10px] rounded-bl-[0px] rounded-br-[10px] text-sm text-gray-800 client-chat">
                            ${message}
                        </div>`;
            }
            function getMessagePreview2(message) {
                return `<div class="bg-[#FF70A6] text-white px-4 py-2 rounded-tl-[10px] rounded-tr-[10px] rounded-bl-[10px] rounded-br-[10px] text-sm user-chat">
                            ${message}
                        </div>`;
            }

            function getFilePreview(file) {
                const fileExtension = file.split('.').pop().toLowerCase();
                let previewHTML = '';

                if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'].includes(fileExtension)) {
                    // Image Preview
                    previewHTML = `
                                    <div class="mb-2">
                                        <a href="${assetPath + file}" target="_blank">
                                            <img src="${assetPath + file}" alt="image attachment" class="max-w-[200px] rounded-lg">
                                        </a>
                                    </div>
                                `;
                } else if (['pdf', 'docx', 'txt'].includes(fileExtension)) {
                    // Document Preview
                    previewHTML = `
                                    <div class="mb-2">
                                        <a href="${assetPath + file}" target="_blank" class="text-blue-500 text-sm">View Document</a>
                                    </div>
                                `;
                } else if (['mp4', 'avi', 'mov'].includes(fileExtension)) {
                    // Video Preview
                    previewHTML = `
                                    <div class="mb-2">
                                        <a href="${assetPath + file}" target="_blank">
                                            <video width="200" controls>
                                                <source src="${assetPath + file}" type="video/mp4">
                                            </video>
                                        </a>
                                    </div>
                                `;
                } else {
                    // Other file type (download link)
                    previewHTML = `
                                    <div class="mb-2">
                                        <a href="${assetPath + file}" target="_blank" class="text-blue-500 text-sm">Download File</a>
                                    </div>
                                `;
                }

                return previewHTML;
            }

            function createSystemElement(data) {
                console.error(data);

                let appointmentUrl = "{{url('/')}}" + `/appointments/${data.appointment_id}/show`;

                let div = `
                <div class="flex justify-center">
                    <div class="bg-slate-200 rounded-full font-semibold p-2 px-4">
                        ${data.message}
                        <a href="${appointmentUrl}" class="text-sm underline" target="_blank">View appointment</a>
                    </div>
                </div>
            `;

                $('#chat-list').append(div);
                scrollToBottom();
            }
            setTimeout(() => {
                document.getElementById('chat-box').style.display = 'flex'
                scrollToBottom();
            }, 1000);

            function scrollToBottom() {
                const chats = document.getElementById('chat-list');
                chats.scrollTo({
                    top: chats.scrollHeight,
                    behavior: 'smooth'
                });
            }

            function removeConversationCount(conversationId) {
                console.log('.message-icon-' + conversationId);

                $('.message-icon-' + conversationId).remove();
            }

            // setInterval(() => {
            //     getChats();
            // }, 10000);


            Pusher.logToConsole = true;

            var pusher = new Pusher('7719147038c1c6bb3e96', {
                cluster: 'ap2'
            });

            function subscribe() {
                var channel = pusher.subscribe('chat-' + conversationId);
                channel.bind('my-event', function(data) {
                    console.log("============================================");
                    console.log(data);
                    if (data.message.is_system_message) {
                        createSystemElement(data.message);
                    } else {
                        createReplyElement(data.message, data.conversationId);
                    }
                    // alert(JSON.stringify(data));
                });
            }
            let myId = "{{ Auth::id() }}"
            var conversationChannel = pusher.subscribe('conversation-' + myId);
            conversationChannel.bind('my-event', function(data) {
                console.log(data);
                getConversations();
                removeConversationCount(conversationId);
                // createReplyElement(data.message, data.conversationId);
                // alert(JSON.stringify(data));
            });
        </script>
    @endpush
    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    @endpush
@endsection
