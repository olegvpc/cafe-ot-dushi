@props(["amount_previeus"=>null, "paymentPrevious"=>null])

<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
        <div class="fw-bold text-uppercase fs-4">Previous Month Payments:</div>
    </div>
    <span class="badge rounded-pill fs-4 {{$paymentPrevious->amount_out ? 'bg-danger' : 'bg-success'}}">
        {{ $paymentPrevious->amount_in ? $paymentPrevious->amount_in : '-' . $paymentPrevious->amount_out }}</span>
    <a class="btn btn-warning btn-sm d-flex align-items-center {{ !(Auth::user()->admin) ? 'disabled' : '' }}"
       href="{{ route('user.payments.edit', $paymentPrevious->id) }}">
        {{ __('Edit Previous') }}
    </a>
</li>


