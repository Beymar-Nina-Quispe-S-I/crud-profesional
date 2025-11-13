<x-layout>
    <div class="row m-4">
        <div class="col-12">
            @if(session('message'))
                <div class="alert alert-secondary my-2">{{ session('message') }}</div>
            @endif

            <a href="{{ route('posts.create') }}" class="btn btn-primary">Nuevo Post</a>
        </div>

        <div class="col-12 mt-4">
            <ul>
                @foreach($posts as $post)
                    <li class="mb-2">
                        <strong>{{ $post->title }}</strong> ({{ $post->status }})
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Editar</a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            {{ $posts->links() }}
        </div>
    </div>
</x-layout>