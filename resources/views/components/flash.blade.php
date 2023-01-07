    {{-- Success Alert --}}
    @if(session('success'))
    <x-alert type="success" msg="{{session('success')}}" />
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
    <x-alert type="danger" msg="{{session('error')}}" />
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade mt-2">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
