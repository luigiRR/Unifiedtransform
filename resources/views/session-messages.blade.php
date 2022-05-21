@if (session('status'))
    <p class="text-success">
        <em class="bi bi-exclamation-diamond-fill me-2"></em> {{ session('status') }}
    </p>
@endif
@if (session('error'))
    <p class="text-danger">
        <em class="bi bi-exclamation-diamond-fill me-2"></em> {{ session('error') }}
    </p>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">
            <em class="bi bi-exclamation-diamond-fill me-2"></em>
            {{ $error }}
        </p>
    @endforeach
@endif