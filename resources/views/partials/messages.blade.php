@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('attenzione'))
    <div class="alert alert-danger">
        {{ session('attenzione') }}
    </div>
@endif
