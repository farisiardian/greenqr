@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="container">
            <div class="alert alert-warning" role="alert">
                <strong>{{ $error }}!</strong>
            </div>
        </div>

    @endforeach
@endif
