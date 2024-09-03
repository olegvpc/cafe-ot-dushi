@props(["payments"=>null,"amount_monthly"=>null, "amount_monthly_negative"=>null])

<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
        <div class="fw-bold text-uppercase fs-4">Current Month Payments: {{ $payments->count() }}</div>
    </div>
    <span class="badge rounded-pill fs-4 {{$amount_monthly_negative ? 'bg-danger' : 'bg-success'}}">{{ $amount_monthly }}</span>
</li>
@foreach($payments as $payment)
    <li class="list-group-item m-2 d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">{{ $payment->title }}</div>
            <p class="m-1"> Payment ID: {{ $payment->id }}</p>
            <p class="m-1"> Description: {!!  $payment->description !!}</p>
            <p class="m-1 small text-muted">Date: {{ $payment->created_at }} </p>
        </div>
        @isset($payment->image)
            <div style="height: 50px">
                <img class="img-fluid img-thumbnail" width="90px" src="{{ asset('/storage/' . $payment->image) }}" alt="Image payment">
            </div>
        @endisset
        <span class="badge rounded-pill fs-6 {{ $payment->amount_in ? 'bg-success' : 'bg-danger' }}">
            {{ $payment->amount_in ? $payment->amount_in : '-' . $payment->amount_out }}</span>
        <a class="btn btn-warning btn-sm d-flex align-items-center {{ !(Auth::user()->admin) ? 'disabled' : '' }}"
           href="{{ route('user.payments.edit', $payment->id) }}">
            {{ __('Edit') }}
        </a>

    </li>
@endforeach
