@props(['name' => ''])

<x-errors />
{{--{{ dd(request('from_date'), old('from_date')), request()->flash() }}--}}
<x-form action="{{ route('user.payments.index')}}" method='GET'>
    <div class="row">

        <div class="col-12 col-md-4">
            <div class="mb-3">
{{--                <x-label>{{ __('To Date') }}</x-label>--}}
                <x-input name='year_month' type="month" value="{{ request('year_month')?? '' }}" placeholder="{{ __('month')}}"/>

                <x-error name='year_month' />
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
