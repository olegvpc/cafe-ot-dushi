@props(['tableItem'=>''])

@php($orderMenus = json_decode($tableItem->menus, true))

{{--{{ dd($tableItem) }}--}}
<x-card class="{{ $tableItem->timeOff ? 'border-danger' : '' }}">
    <x-card-body class="{{ $tableItem->is_free ? 'light' : 'bg-warning' }}">
        <div class="mb-2">
            <div class="card-footer">
                <div class="btn-wrapper text-center d-flex justify-content-between">
                    <x-form class="text-white d-flex align-items-center"
                        action="{{ route('user.orders.create', $tableItem->id) }}"
                        method="GET">
                        <x-button type="submit" class="btn-primary">
                            {{  $tableItem->is_free ? __('Start') : __('Change')}}
                        </x-button>
                    </x-form>
                    <div class="fw-bold m-1">{{ __('Table') }}: {{ $tableItem->id }}</div>
                    <x-form class="text-white d-flex align-items-center"
                          action="{{ route('user.orders.print', $tableItem->id) }}"
                            method="POST">
                        <x-button type="submit" class="btn-dark btn-sm {{ ($tableItem->is_free || !($tableItem->menus) || empty($orderMenus)) ? 'disabled' : '' }}">
                            {{ __("Print") }}
                        </x-button>
                    </x-form>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
{{--                @php($orderMenus = json_decode($tableItem->menus, true))--}}
                @if(!empty($orderMenus))
                    <ul>
                        @foreach($orderMenus as $menu)
                            <li class="small m-1 ">{{ $menu['title'] }} <span class="fw-bold">{{ $menu['price'] }}&nbsp;&#3647;</span></li>
                        @endforeach
{{--                            <li class="fw-bold mt-2 ">{{ __('Amount') }}: {{ $tableItem->totalAmount }}&nbsp;&#3647;</li>--}}
                    </ul>
                    <div class="fw-bold m-1">{{ __('Amount') }}: {{ $tableItem->totalAmount }}&nbsp;&#3647;</div>
                @endif
            </div>
            <div class="card-footer">
                <div class="btn-wrapper text-center d-flex justify-content-between">
                    <x-form class="text-white d-flex align-items-center"
                        action="{{ route('user.orders.cancel', $tableItem->id) }}"
                        method="GET">

                        <x-button type="submit" class="btn-danger btn-sm {{ !($tableItem->is_free) ? '' : 'disabled' }}">
                            {{ __('Cancel') }}
                        </x-button>
                    </x-form>
{{--                    {{ dd($tableItem) }}--}}

                    @if($tableItem->timeOff)
                        <div class="text-danger fw-bold smal m-1 text-truncate">{{ __('Date') }}: {{ $tableItem->updated_at_carbon?->format('M-d H:i') }};</div>
                    @endif

                    <x-form class="text-white d-flex align-items-center"
                        action="{{ route('user.orders.store', $tableItem->id) }}"
                        method="POST">
                        <x-button type="submit" class="btn-success btn-sm {{ ($tableItem->is_free || !($tableItem->menus) || empty($orderMenus)) ? 'disabled' : '' }}">
                            {{ __("Done") }}
                        </x-button>
                    </x-form>
                </div>
            </div>

        </div>

    </x-card-body>
</x-card>
