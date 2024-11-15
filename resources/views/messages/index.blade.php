<div class="message-wrapper">
    <ul class="messages">  
        @foreach($messages as $message) 
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <h4> <a href="/ShowMassage/{{$message->id}}" style="color: black;"> {{$group->name}} </a> </h4>
                    <p>Name: {{ $message->name }}</p>
                    <p>Message: {{ $message->message }}</p>
                   
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>
            </li>
        @endforeach
    </ul>  
</div>
  <!-- this is for add new message -->
  <div class="input-container">
  <input type="text" name="message" id="message" class="submit" placeholder="Type a message...">
  <input type="hidden" name="id" id="id" value="{{$group->id}}">
  <div class="options-menu">
    <button class="options-button">⋮</button>
    <div class="dropdown">
      @if ($group->admin_id == auth()->user()->id)
        <a href="/group/edit/{{$group->id}}" class="dropdown-item">Edit</a>
        <form action="/group/delete/{{$group->id}}" method="POST" class="dropdown-item">
          @csrf
          @method('Delete')
          <button type="submit" onclick="return confirm('Are you sure?')">Delete Group</button>
        </form>
        <a href="/group/members_list/{{$group->id}}" class="dropdown-item">Remove Users</a>
      @else
        <form action="/unFollow/{{$group->id}}" method="POST" class="dropdown-item">
          @csrf
          @method('Delete')
          <button type="submit" onclick="return confirm('Are you sure?')">Unfollow</button>
        </form>
      @endif
    </div>
  </div>
</div>

<style>
  .message-wrapper {
    height: 80vh;
    overflow-y: auto;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    background: black;
  }

  .messages {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .message {
    margin-bottom: 20px;
    clear: both;
    width: 100%;
    word-wrap: break-word;
  }

  .sent {
    max-height: 100%;
    border-bottom: 2px solid black;
  }

  .recieved {
    display: flex;
    border-bottom: 2px solid black;
  }

  .date {
    font-size: 0.8em;
    color: green;
  }

  .input-container {
    display: flex;
    align-items: center;
    max-width: 800px;
    margin: 20px auto;
  }

  .submit {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
  }
/* Dropdown menu */
.options-menu {
  position: relative;
  display: inline-block; /* Added this */
}

.options-button {
  background: none;
  border: none;
  font-size: 20px;
  color: white;
  cursor: pointer;
}

.dropdown {
  display: none;
  position: absolute;
  background-color: #333;
  min-width: 120px;
  border-radius: 5px;
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 999; /* Increased z-index */
  bottom: 100%;
  right: 0;
  margin-bottom: 5px;
}

/* Changed the display property back to block for better compatibility */
.options-menu.active .dropdown {
  display: block;
}

.dropdown-item {
  color: white;
  padding: 10px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-item:hover {
  background-color: #555;
  color: orange;
}

button.dropdown-item {
  background: none;
  border: none;
  color: white;
  width: 100%;
  text-align: left;
  cursor: pointer;
}

button.dropdown-item:hover {
  background-color: #555;
}
</style>
<script>
    const optionsButton = document.querySelector('.options-button');
const optionsMenu = document.querySelector('.options-menu');

optionsButton.addEventListener('click', () => {
  optionsMenu.classList.toggle('active');
});


document.addEventListener('click', (event) => {
  if (!optionsMenu.contains(event.target) && event.target !== optionsButton) {
    optionsMenu.classList.remove('active');
  }
} 
);
</script>