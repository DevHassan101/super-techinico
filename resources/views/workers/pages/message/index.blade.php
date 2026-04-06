@extends('workers.layouts.app')
@section('title', 'Messages')
@section('page-title', 'Messages')
@section('content')
    <!-- Chat Interface -->
    <div class="chat-container">
        <!-- Chat User List -->
        <div class="chat-list">


            <!-- User to chat with highlight -->
            <div class="flex items-center p-3 bg-pink-50 rounded-lg mx-3 mb-3">
                <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full mr-3">
                <span class="text-pink-500 font-medium">{{ Auth::user()->name }}</span>
            </div>

            <!-- Search Bar -->
            <div class="chat-search">
                <div class="relative">
                    <input type="text" placeholder="Search Here..." class="search-input" id="search-chat">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>

            <!-- Chat Users List -->
            <div class="chat-user-list" id="conversation-list">
            </div>
        </div>

        <!-- Chat Content -->
        <div class="chat-content hidden" id="chat-box">
            <div class="bg-[#F7F8FA] w-[100%] rounded-tr-[20px]">
                <div class="flex justify-between items-center bg-[#F7F8FA] text-white px-4 py-3 rounded-[10px]">
                    <div class="flex items-center gap-3">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" id="user-image"
                            class="w-10 h-10 rounded-full">
                        <h2 class="text-sm font-semibold text-[#FF71A6]" id="user-name">Sarah Johnson</h2>
                    </div>
                    <div class="flex gap-[50px] items-center">
                        <!--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"-->
                        <!--    fill="none">-->
                        <!--    <path-->
                        <!--        d="M7 12H9V9H12V7H9V4H7V7H4V9H7V12ZM2 16C1.45 16 0.979333 15.8043 0.588 15.413C0.196667 15.0217 0.000666667 14.5507 0 14V2C0 1.45 0.196 0.979333 0.588 0.588C0.98 0.196666 1.45067 0.000666667 2 0H14C14.55 0 15.021 0.196 15.413 0.588C15.805 0.98 16.0007 1.45067 16 2V6.5L20 2.5V13.5L16 9.5V14C16 14.55 15.8043 15.021 15.413 15.413C15.0217 15.805 14.5507 16.0007 14 16H2Z"-->
                        <!--        fill="black" />-->
                        <!--</svg>-->
                        {{-- <button id="openModal" href=""
                            class="w-[120px] bg-[#FF71A6] border-[1px] text-[#fff] text-xs px-4 py-2 rounded hover:bg-[#fff] hover:text-[#000] cursor-pointer">Accept</button> --}}
                    </div>
                </div>
            </div>
            <!-- Chat Messages -->
            <div class="chat-messages" id="chat-list">
            </div>

            <!-- Chat Input -->
            <div id="file-preview" class="mt-2 hidden">
                <div class="flex items-center justify-between gap-2 bg-slate-200 p-2 rounded-full mb-2">
                    <span id="file-name" class="text-sm text-gray-700"></span>
                    <button id="remove-file" class="text-red-500 text-xs">Remove</button>
                </div>
            </div>
            {{-- <video id="video" width="200" height="200" autoplay></video> --}}
            {{-- <button id="capture-button" class="bg-pink-500 text-white px-4 py-2 rounded mt-2">Capture Image</button> --}}

            <div id="image-preview" class="mt-2 hidden">
                <img id="captured-image" src="" alt="Captured Image" class="max-w-[200px] rounded-lg">
            </div>
            <div class="px-4 py-5 flex items-center gap-3 rounded-[10px] justify-between bg-[#DCE8FF]"
                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                <div class="flex items-center w-[95%] gap-[20px] bg-[#fff] pr-[10px] rounded-[20px]">
                    <input type="text" placeholder="Type a message" id="message"
                        class="w-[100%] px-4 py-2 rounded-full border-gray-300 text-sm focus:outline-none">
                    <label for="file-upload" class="cursor-pointer inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 27 32"
                            fill="none">
                            <path
                                d="M18.8349 10.6536L16.9711 8.69856L7.65227 18.4816C7.28526 18.8671 6.99415 19.3247 6.79557 19.8283C6.59699 20.3319 6.49483 20.8717 6.49492 21.4168C6.495 21.9619 6.59733 22.5016 6.79607 23.0051C6.99481 23.5087 7.28605 23.9662 7.65318 24.3516C8.02031 24.7369 8.45614 25.0426 8.93577 25.2511C9.41541 25.4596 9.92945 25.5669 10.4486 25.5668C10.9677 25.5667 11.4817 25.4593 11.9613 25.2506C12.4408 25.0419 12.8766 24.7361 13.2436 24.3506L24.4262 12.6106C25.6617 11.313 26.3557 9.55327 26.3555 7.71842C26.3554 5.88357 25.661 4.12394 24.4253 2.82663C23.1895 1.52932 21.5136 0.8006 19.7661 0.800781C18.0187 0.800962 16.3429 1.53003 15.1073 2.82759L3.36651 15.1537L3.34081 15.1788C-0.249018 18.9482 -0.249018 25.0563 3.34081 28.8237C6.93063 32.5912 12.7478 32.5912 16.3376 28.8237L16.3615 28.7967L16.3633 28.7987L24.3785 20.3846L22.5147 18.4295L14.4996 26.8417L14.4757 26.8667C13.2457 28.1557 11.5788 28.8797 9.84105 28.8797C8.10325 28.8797 6.43643 28.1557 5.20641 26.8667C4.59671 26.2251 4.11362 25.4635 3.78483 24.6255C3.45604 23.7874 3.28803 22.8895 3.29042 21.9831C3.2928 21.0768 3.46555 20.1798 3.79875 19.3437C4.13195 18.5076 4.61905 17.7488 5.23212 17.1107L5.23028 17.1088L16.973 4.78265C18.5135 3.16308 21.0218 3.16308 22.5643 4.78265C24.1067 6.40223 24.1049 9.03404 22.5643 10.6517L11.3816 22.3917C11.1314 22.6334 10.8019 22.7642 10.4619 22.7569C10.122 22.7495 9.79785 22.6045 9.5573 22.3522C9.31674 22.0999 9.17834 21.7597 9.17099 21.4027C9.16364 21.0458 9.28792 20.6996 9.51787 20.4366L18.8367 10.6517L18.8349 10.6536Z"
                                fill="#FF71A6" />
                        </svg>
                    </label>
                    <input type="file" accept="image/jpg, image/png, image/jpeg" id="file-upload" class="hidden">

                    <label for="camera-open" id="camera-open" class="cursor-pointer inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 46 35"
                            fill="none">
                            <path
                                d="M44.0682 34.4838H1.78262C1.35128 34.4838 0.937605 34.3203 0.632602 34.0291C0.327599 33.738 0.15625 33.3431 0.15625 32.9314V6.53985C0.15625 6.12811 0.327599 5.73324 0.632602 5.44211C0.937605 5.15097 1.35128 4.98741 1.78262 4.98741H12.289L15.07 1.02868C15.2174 0.815122 15.4177 0.63961 15.6532 0.517737C15.8887 0.395863 16.1521 0.331401 16.4199 0.330078H29.4309C29.6988 0.331401 29.9621 0.395863 30.1976 0.517737C30.4331 0.63961 30.6334 0.815122 30.7808 1.02868L33.5619 4.98741H44.0682C44.4995 4.98741 44.9132 5.15097 45.2182 5.44211C45.5232 5.73324 45.6946 6.12811 45.6946 6.53985V32.9314C45.6946 33.3431 45.5232 33.738 45.2182 34.0291C44.9132 34.3203 44.4995 34.4838 44.0682 34.4838ZM3.40899 31.3789H42.4418V8.09229H32.6836C32.4157 8.09097 32.1524 8.02651 31.9169 7.90463C31.6814 7.78276 31.4811 7.60725 31.3337 7.39369L28.5526 3.43496H17.2982L14.5171 7.39369C14.3698 7.60725 14.1694 7.78276 13.9339 7.90463C13.6985 8.02651 13.4351 8.09097 13.1672 8.09229H3.40899V31.3789Z"
                                fill="#FF71A6" />
                            <path
                                d="M22.9223 28.2738C20.9923 28.2738 19.1056 27.7275 17.5009 26.704C15.8962 25.6805 14.6454 24.2258 13.9069 22.5238C13.1683 20.8217 12.975 18.9489 13.3516 17.142C13.7281 15.3351 14.6575 13.6754 16.0222 12.3727C17.3869 11.0701 19.1256 10.1829 21.0185 9.82351C22.9115 9.46411 24.8735 9.64857 26.6566 10.3536C28.4397 11.0586 29.9637 12.2525 31.0359 13.7842C32.1082 15.316 32.6805 17.1169 32.6805 18.9592C32.6805 21.4296 31.6524 23.7988 29.8224 25.5456C27.9924 27.2925 25.5103 28.2738 22.9223 28.2738ZM22.9223 12.7494C21.6356 12.7494 20.3778 13.1136 19.308 13.796C18.2382 14.4783 17.4044 15.4481 16.912 16.5828C16.4196 17.7175 16.2908 18.9661 16.5418 20.1707C16.7928 21.3752 17.4124 22.4817 18.3222 23.3502C19.232 24.2186 20.3912 24.81 21.6531 25.0496C22.9151 25.2892 24.2231 25.1663 25.4118 24.6963C26.6005 24.2263 27.6165 23.4303 28.3314 22.4092C29.0462 21.388 29.4277 20.1874 29.4277 18.9592C29.4277 17.3123 28.7424 15.7328 27.5223 14.5682C26.3023 13.4037 24.6476 12.7494 22.9223 12.7494Z"
                                fill="#FF71A6" />
                        </svg>
                    </label>

                </div>

                <button class="h-[30px] w-[30px]" id="send-message">
                    <img src="https://sty1.devmail-sty.online/super-tec/public/assets/images/send.png" alt=""
                        style="height: 100%">
                </button>
            </div>
        </div>
        <div class="chat-content flex justify-center items-center" id="start-chat">
            <svg width="250px" height="250px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7"
                    stroke="#FF71A6" stroke-width="1.5" stroke-linecap="round" />
                <path d="M8 12H8.009M11.991 12H12M15.991 12H16" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <h1 class="text-2xl text-[#FF71A6]">
                Start Chat
            </h1>
        </div>
    </div>

    <div id="camera-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg relative w-[300px] h-[400px]">
            <div class="absolute top-0 right-0 p-2 cursor-pointer" id="close-modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M12 10.5857L16.7071 5.87868C17.0976 5.48816 17.0976 4.85471 16.7071 4.46419C16.3166 4.07367 15.6831 4.07367 15.2925 4.46419L12 7.75736L8.70711 4.46419C8.31658 4.07367 7.68307 4.07367 7.29255 4.46419C6.90202 4.85471 6.90202 5.48816 7.29255 5.87868L12 10.5857L7.29255 15.2929C6.90202 15.6834 6.90202 16.3168 7.29255 16.7073C7.68307 17.0978 8.31658 17.0978 8.70711 16.7073L12 12.4142L15.2925 16.7073C15.6831 17.0978 16.3166 17.0978 16.7071 16.7073C17.0976 16.3168 17.0976 15.6834 16.7071 15.2929L12 10.5857Z"
                        fill="#FF71A6" />
                </svg>
            </div>
            <video id="video" width="100%" height="200" autoplay></video>
            <button id="capture-button" style="background-color: pink"
                class="bg-pink-500 text-white px-4 py-2 rounded mt-4 w-full">Capture
                Image</button>
        </div>
    </div>
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
            document.getElementById('camera-open').addEventListener('click', function() {
                document.getElementById('camera-modal').classList.remove('hidden');

                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(stream => {
                        document.getElementById('video').srcObject = stream;
                    })
                    .catch(error => {
                        console.error('Error accessing the camera: ', error);
                    });
            });


            document.getElementById('close-modal').addEventListener('click', function() {
                document.getElementById('camera-modal').classList.add('hidden');
                stopCamera();
            });

            document.getElementById('capture-button').addEventListener('click', function() {
                const video = document.getElementById('video');
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                const imageDataUrl = canvas.toDataURL('image/png');
                document.getElementById('captured-image').src = imageDataUrl;
                document.getElementById('image-preview').classList.remove('hidden');
                stopCamera();
                document.getElementById('camera-modal').classList.add('hidden');
            });

            function stopCamera() {
                const stream = document.getElementById('video').srcObject;
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
                document.getElementById('video').srcObject = null;
            }
        </script>
        <script>
            document.getElementById('file-upload').addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file) {
                    document.getElementById('file-name').textContent = file.name;
                    document.getElementById('file-preview').classList.remove('hidden');
                    document.getElementById('remove-file').onclick = function() {
                        document.getElementById('file-upload').value = ''; // Clear file input
                        document.getElementById('file-preview').classList.add('hidden'); // Hide preview
                    };
                }
            });
            var userId = null;
            var conversationId = null;
            var assetPath = "{{ asset('/') }}";
            const inputField = document.getElementById('message');
            const button = document.getElementById('send-message');
            inputField.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    button.click();
                }
            });

            function getConversations() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('worker.conversations') }}",
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
            function getChats() {
                if (!conversationId) {
                    return
                }
                $('#chat-box').removeClass('hidden');
                $('#start-chat').addClass('hidden');
                $.ajax({
                    type: "GET",
                    url: "{{ route('worker.get.chats') }}",
                    data: {
                        conversation_id: conversationId
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
                        if (response.user.image) {
                            var image = assetPath + response.user.image;
                        } else {
                            var image = "{{ asset('/worker/assets/images/person.png') }}";
                        }
                        $('#chat-list').html(response.html);
                        $('#user-image').attr('src', image);
                        $('#user-name').html(response.user.name);
                        userId = response.user.id
                        conversationId = response.conversation.id;
                        subscribe();
                        scrollToBottom();
                        removeConversationCount(conversationId)

                        // $('#loader').addClass('hidden');
                    }
                });
            }
            getChats();

            $('#send-message').click(function(e) {
                e.preventDefault();
                let msg = $('#message').val();
                let file = $('#file-upload')[0].files[0];
                let capturedImage = document.getElementById('captured-image').src;
                if (capturedImage == 'https://sty1.devmail-sty.online/super-techinico/public/workers/messages') {
                    capturedImage = null
                }
                console.log(capturedImage);

                if (!msg && !file && !capturedImage) {
                    $('#message').addClass('border-red-500');
                    return;
                }
                $('#message').removeClass('border-red-500');
                let formData = new FormData();
                formData.append('receiver', userId);
                formData.append('message', msg);
                formData.append('conversationId', conversationId);
                if (capturedImage && capturedImage != "http://127.0.0.1:1234/workers/messages") {
                    console.warn(capturedImage)
                    const imageBlob = dataURLToBlob(capturedImage);
                    formData.append('file', imageBlob, 'captured-image.png');
                } else if (file) {
                    formData.append('file', file);
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('worker.send.message') }}",
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
                        document.getElementById('file-upload').value = '';
                        document.getElementById('file-preview').classList.add('hidden');
                        document.getElementById('captured-image').src = '';
                        document.getElementById('image-preview').classList.add('hidden');
                        createMessageElement(response.data);
                    }
                });
            });

            function dataURLToBlob(dataURL) {
                const byteString = atob(dataURL.split(',')[1]);
                const arrayBuffer = new ArrayBuffer(byteString.length);
                const uintArray = new Uint8Array(arrayBuffer);
                for (let i = 0; i < byteString.length; i++) {
                    uintArray[i] = byteString.charCodeAt(i);
                }
                return new Blob([uintArray], {
                    type: 'image/png'
                });
            }


            function createMessageElement(data) {
                // console.warn(data);
                const date = new Date(data.created_at);
                const formattedTime = date.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });
                let image = assetPath + data.sender.image
                let div = ` <div class="flex items-end justify-end gap-2">
                                <div class="${data.file ? 'bg-slate-200 p-2 rounded' : ''}">
                                    ${data.file ? getFilePreview(data.file) : ''}
                                    ${data.message ? getMessagePreview(data.message) : ''}
                                    
                                    <div class="text-xs text-gray-400 mt-1 text-left ml-[20px]">${formattedTime}</div>
                                </div>
                                <img src="${image}" class="w-8 h-8 rounded-full" />
                            </div>`;

                $('#chat-list').append(div);
                scrollToBottom();
            }

            function getMessagePreview(message) {
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

            function createReplyElement(data) {
                // console.warn(data);
                let myId = "{{ Auth::id() }}";
                if (data.sender_id == myId) {
                    return;
                }
                const date = new Date(data.created_at);
                const formattedTime = date.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });
                if (data.sender.image) {
                    var image = assetPath + data.sender.image
                } else {
                    var image = "{{ asset('worker/assets/images/person.png') }}"
                }
                let div = `<div class="flex items-end gap-2">
                               <img src="${image}" class="w-8 h-8 rounded-full" /> 
                                <div class="${data.file ? 'bg-slate-200 p-2 rounded' : ''}">
                                    ${data.file ? getFilePreview(data.file) : ''}
                                    <div class="${data.message ? '' : 'hidden'} bg-[#DEE3FF] px-4 py-2 rounded-tl-[10px] rounded-tr-[10px] rounded-bl-[0px] rounded-br-[10px] text-sm text-gray-800 client-chat">
                                        ${data.message}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-1">${formattedTime}</div>
                                </div>
                            </div>`;

                $('#chat-list').append(div);
                scrollToBottom();
            }

            function createSystemElement(data) {
                let appointmentUrl = "{{url('/')}}" + `/workers/appointments/${data.appointment_id}/show`;

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



            $('.chat-user-item').click(function(e) {
                e.preventDefault();
                alert(0)
                conversationId = $('conversation-id').data(key);
                getChats();
                console.warn(conversationId);

            });
            setTimeout(() => {
                scrollToBottom();
            }, 1000);

            function scrollToBottom() {
                const chats = document.getElementById('chat-list');
                chats.scrollTo({
                    top: chats.scrollHeight,
                    behavior: 'smooth'
                });
                // alert(chats.scrollHeight)
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
