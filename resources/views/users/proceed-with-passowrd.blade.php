<x-body title="Provide Password">

    <form action="{{ $action }}" method="POST" class="form-300">
        <div class="text-center text-muted small">
            Enter your password and confirm it to proceed
        </div>
        @csrf
        @foreach ($requests as $name => $value)
            <input type="hidden" name="{{ $name }}" value="{{ $value }}" />
        @endforeach
        <div class="input-group mt-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Password</div>
            </div>
            <input type="password" class="toggle-password form-control" name="password" />
        </div>
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <div class="input-group-text">Verify Password</div>
            </div>
            <input type="password" class="toggle-password form-control" name="password_confirmation" />
        </div>
        </div>
        <div class="input-group mt-3">
            <input type="submit" value="{{ $btn ?? 'Continue' }}" class="btn btn-primary form-control" />
        </div>

    </form>

</x-body>
