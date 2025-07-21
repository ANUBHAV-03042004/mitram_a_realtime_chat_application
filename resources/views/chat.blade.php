<!-- resources/views/chat.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mitr.Ai-MitRam</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .conversation-list {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
    </style>
  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navigation')
<div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="flex gap-4">
            <div class="w-1/4"> 
                <div class="custom-bg rounded-lg shadow-lg p-4 mb-4" style="background-color:#114833;">
                    <h2 class="text-xl font-bold mb-2 text-white">Conversations</h2>
                    <a href="{{ route('chat.new') }}" class="block w-full bg-green-500 text-white px-4 py-2 rounded-lg text-center mb-4 hover:bg-green-600">
                        Start New Conversation
                    </a>
                    <ul class="conversation-list">
                        @foreach ($conversations as $conv)
                            <li class="mb-2 flex items-center justify-between text-white">
                                <a href="{{ route('chat.show', $conv) }}" class="block p-2 rounded flex-grow {{ $currentConversation && $currentConversation->id == $conv->id ? 'bg-blue-100 text-black' : 'hover:bg-gray-100 text-black ' }}">
                                    {{ $conv->title }}
                                </a>
                                <button class="delete-conversation text-red-500 hover:text-red-700" data-id="{{ $conv->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
<div class="w-3/4">
        <div class="custom-bg rounded-lg shadow-lg p-6" style="background-color:#114833;">
        <h2 class="text-xl font-bold mb-4 text-white">{{ $currentConversation ? ($currentConversation->title ?: 'Conversation ' . $currentConversation->id) : 'Select or start a new conversation' }}</h2>
            <div id="chat-box" class="h-[400px] overflow-y-auto mb-4 p-4 border rounded-lg">
            @foreach ($messages as $message)
                    <div class="mb-4 {{ $message->sender === 'You' ? 'text-right' : 'text-left' }}">
                        <div class="inline-block max-w-[80%] {{ $message->sender === 'You' ? 'bg-blue-100' : 'bg-gray-100' }} rounded-lg px-4 py-2">
                            <div class="font-bold">{{ $message->sender }}</div>
                            <div>{{ $message->message }}</div>
                        </div>
                    </div>
                @endforeach
            </div>  
            <div class="logo">
                   <img src="{{asset('assets\img\Mitr.AI_logo_with_a_different_style-removebg-preview.png')}}" alt="Circular Image" style="width: 15%; height: 25%; margin-top:0;">
                </div>
                @if ($currentConversation)
            <form id="chat-form" class="flex gap-2">
                @csrf    
                <input type="hidden" id="conversation_id" value="{{ $currentConversation->id }}">
  <input type="text" id="message" class="flex-1 border rounded-lg px-4 py-2" placeholder="Type your message...">
                       
    <button type="submit" class="button-send"> <div class="outline"></div> <div class="state state--default"><div class="icon">
      <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g style="filter: url(#shadow)"><path d="M14.2199 21.63C13.0399 21.63 11.3699 20.8 10.0499 16.83L9.32988 14.67L7.16988 13.95C3.20988 12.63 2.37988 10.96 2.37988 9.78001C2.37988 8.61001 3.20988 6.93001 7.16988 5.60001L15.6599 2.77001C17.7799 2.06001 19.5499 2.27001 20.6399 3.35001C21.7299 4.43001 21.9399 6.21001 21.2299 8.33001L18.3999 16.82C17.0699 20.8 15.3999 21.63 14.2199 21.63ZM7.63988 7.03001C4.85988 7.96001 3.86988 9.06001 3.86988 9.78001C3.86988 10.5 4.85988 11.6 7.63988 12.52L10.1599 13.36C10.3799 13.43 10.5599 13.61 10.6299 13.83L11.4699 16.35C12.3899 19.13 13.4999 20.12 14.2199 20.12C14.9399 20.12 16.0399 19.13 16.9699 16.35L19.7999 7.86001C20.3099 6.32001 20.2199 5.06001 19.5699 4.41001C18.9199 3.76001 17.6599 3.68001 16.1299 4.19001L7.63988 7.03001Z" fill="currentColor"></path>
          <path d="M10.11 14.4C9.92005 14.4 9.73005 14.33 9.58005 14.18C9.29005 13.89 9.29005 13.41 9.58005 13.12L13.16 9.53C13.45 9.24 13.93 9.24 14.22 9.53C14.51 9.82 14.51 10.3 14.22 10.59L10.64 14.18C10.5 14.33 10.3 14.4 10.11 14.4Z" fill="currentColor"></path></g>
        <defs> <filter id="shadow"><fedropshadow  dx="0" dy="1"stdDeviation="0.6"flood-opacity="0.5"></fedropshadow></filter></defs>
      </svg>
    </div>
    <p>
      <span style="--i:0">S</span>
      <span style="--i:1">e</span>
      <span style="--i:2">n</span>
      <span style="--i:3">d</span>
      <span style="--i:4">M</span>
      <span style="--i:5">e</span>
      <span style="--i:6">s</span>
      <span style="--i:7">s</span>
      <span style="--i:8">a</span>
      <span style="--i:9">g</span>
      <span style="--i:10">e</span>
    </p>
  </div>
  <div class="state state--sent">
    <div class="icon">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        height="1em"
        width="1em"
        stroke-width="0.5px"
        stroke="black"
      >
        <g style="filter: url(#shadow)">
          <path
            fill="currentColor"
            d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z"
          ></path>
          <path
            fill="currentColor"
            d="M10.5795 15.5801C10.3795 15.5801 10.1895 15.5001 10.0495 15.3601L7.21945 12.5301C6.92945 12.2401 6.92945 11.7601 7.21945 11.4701C7.50945 11.1801 7.98945 11.1801 8.27945 11.4701L10.5795 13.7701L15.7195 8.6301C16.0095 8.3401 16.4895 8.3401 16.7795 8.6301C17.0695 8.9201 17.0695 9.4001 16.7795 9.6901L11.1095 15.3601C10.9695 15.5001 10.7795 15.5801 10.5795 15.5801Z"
          ></path>
        </g>
      </svg>
    </div>
    <p>
      <span style="--i:5">S</span>
      <span style="--i:6">e</span>
      <span style="--i:7">n</span>
      <span style="--i:8">t</span>
    </p>
  </div>
</button>

        </div> 
      </div>
</div>
            </form>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('chat-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const conversationId = document.getElementById('conversation_id').value;
            const messageInput = document.getElementById('message');
            const message = messageInput.value;
            if (!message.trim()) return;

            // Add user message
            addMessage('You', message);
            messageInput.value = '';

           
                try {
                const response = await fetch('{{ route("chat.send") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ message, conversation_id: conversationId })
                });
                const data = await response.json();
                
                if (data.success) {
                    addMessage('Mitr.Ai', data.response);
                } else {
                    addMessage('Error', data.error);
                }
            } catch (error) {
                addMessage('Error', 'Failed to send message');
            }
        });

        function addMessage(sender, text) {
            const chatBox = document.getElementById('chat-box');
            const messageDiv = document.createElement('div');
            messageDiv.className = `mb-4 ${sender === 'You' ? 'text-right' : 'text-left'}`;
            messageDiv.innerHTML = `
                <div class="inline-block max-w-[80%] ${sender === 'You' ? 'bg-blue-100' : 'bg-gray-100'} rounded-lg px-4 py-2">
                    <div class="font-bold">${sender}</div>
                    <div>${text}</div>
                </div>
            `;
            chatBox.appendChild(messageDiv);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
         // Delete conversation functionality
         document.querySelectorAll('.delete-conversation').forEach(button => {
            button.addEventListener('click', async (e) => {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this conversation?')) {
                    const conversationId = button.dataset.id;
                    try {
                        const response = await fetch(`/chat/${conversationId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                        });
                        const data = await response.json();
                        if (data.success) {
                            button.closest('li').remove();
                        }
                    } catch (error) {
                        console.error('Failed to delete conversation:', error);
                    }
                }
            });
        });
     
    </script>
</body>
@include('includes.dash-style')
</html>