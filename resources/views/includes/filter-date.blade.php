@props(['name' => ''])

<x-errors />

<x-form action="{{ route('user.report')}}" method='GET'>
    <div class="row">

        <div class="col-12 col-md-4 mb-1">
            <div class="mb-3">
                <x-label>{{ __('From Date') }}</x-label>
                <x-input name='from_date' type="date" value="{{ request('from_date') }}" placeholder="{{ __('From Date')}}"/>

                <x-error name='from_date' />
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-label>{{ __('To Date') }}</x-label>
                <x-input name='to_date' type="date" value="{{ request('to_date') }}" placeholder="{{ __('To Date')}}"/>

                <x-error name='to_date' />
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-button type='submit' class='w-150 btn-primary'>
                    {{ __('Применить') }}
                </x-button>
            </div>
        </div>

    </div>

</x-form>
