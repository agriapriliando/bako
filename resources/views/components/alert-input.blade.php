@props(['messages'])
@if ($messages)
    <div>
        @foreach ((array) $messages as $message)
            <span {{ $attributes->merge(['class' => 'badge rounded-pill']) }}>
                <strong>{{ $message }}</strong>
            </span>
        @endforeach
    </div>
@endif
