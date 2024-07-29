@foreach($statistics as $stats)
    <h4>
        {{ __('Статистика для :currency', ['currency' => $stats->currency_id]) }}
    </h4>
    <div class="row mb-3">
        <div class="col-12 col-md-4 mb-3">
            <x-card>
                <x-card-body>
                    <div class="mb-3 text-muted small">
                        {{__('Количество Донатов')}}
                    </div>

                    <h5 class="m-0">{{ $stats['total_count'] }}</h5>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <x-card>
                <x-card-body>
                    <div class="mb-3 text-muted small">
                        {{__('Сумма Донатов')}}
                    </div>

{{--                    <h5 class="m-0">{{ $stats['total_amount'] }}</h5>--}}
{{--                    Делаем красивый вывод на экрад через кастомную функцию helper--}}
                    <h5>{{ __money($stats->total_amount, $stats->currency_id) }}</h5>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <x-card>
                <x-card-body>
                    <div class="mb-3 text-muted small">
                        {{__('Среняя сумма донатов')}}
                    </div>

{{--                    <h5 class="m-0">{{ $stats['amount_avg'] }}</h5>--}}
                    <h5>{{ __money($stats->amount_avg, $stats->currency_id) }}</h5>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <x-card>
                <x-card-body>
                    <div class="mb-3 text-muted small">
                        {{__('Мин Донат')}}
                    </div>

{{--                    <h5 class="m-0">{{ $stats['amount_min'] }}</h5>--}}
                    <h5>{{ __money($stats->amount_min, $stats->currency_id) }}</h5>
                </x-card-body>
            </x-card>
        </div>

        <div class="col-12 col-md-4 mb-3">
            <x-card>
                <x-card-body>
                    <div class="mb-3 text-muted small">
                        {{__('Макс Донат')}}
                    </div>

                    <h5 class="m-0">{{ $stats->amount_max }}</h5>
                </x-card-body>
            </x-card>
        </div>
    </div>
@endforeach
