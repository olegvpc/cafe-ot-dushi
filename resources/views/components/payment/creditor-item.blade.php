@props(["users"=>null])

<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
        <div class="fw-bold text-uppercase fs-4">
            {{ $slot }}
        </div>
    </div>
</li>
@foreach($users as $user)
    <li class="list-group-item m-2 d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">{{ $user->name }}</div>
        </div>

        <span class="badge rounded-pill fs-6 {{ $user->total > 0 ? 'bg-success' : 'bg-danger' }}">
            {{ $user->total }}
        </span>
    </li>
@endforeach
