@if (session('status'))
    <div class="alert alert-{{ session('status')['type'] }}">
        {{ session('status')['message'] }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
