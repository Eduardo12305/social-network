<!-- dropdown.blade.php -->
<div class="dropdown float-right dropdown-menu-right">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton">
        Opções
    </button>
    <div class="dropdown-menu dropdown-menu-right" id="dropdownMenu" style="display: none"> 
        <form action="{{ route('logout') }}" method="get">
            @csrf
            <button class="dropdown-item" type="submit">Logout</button>
        </form>

        <form action="{{route('user.show',[auth()->user()->id])}}">
        @csrf
        <button type="submit">Ver dados</button>
        </form>
       


        <form method="POST" action="{{route('user.destroy', [auth()->user()->id])}}" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
        <button type="submit">deletar</button>
        </form>

        <form method="POST" action="{{route('profileUser',[auth()->user()->id])}}">
            @csrf
            <button type="submit">Perfil</button>
        </form>

        <form method="POST" action="{{route('envImVd',[auth()->user()->id])}}">
            @crsf   
            <input type="file" name="media" accept="image/*, video/*">
            <button type="submit">Postar</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script>
    var dropdownButton = document.getElementById('dropdownMenuButton');
    var dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', function(){
        if(dropdownMenu.style.display == 'none'){
            dropdownMenu.style.display = 'block';
        } else {
            dropdownMenu.style.display = 'none';
        }
    })
  
</script>
