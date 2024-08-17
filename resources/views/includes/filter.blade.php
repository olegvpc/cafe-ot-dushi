@props(['name' => ''])

<x-form action="{{ route('user.menus.index')}}" method='GET'>
    <div class="row">

        <div class="col-12 col-md-3">
            <div class="mb-3">
                <x-input name='search' value="{{ request('search') }}" placeholder="{{ __('Поиск')}}"/>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <x-select name='cuisine_id' value="{{ request('cuisine_id') }}" :options=$cuisines />
            </div>
        </div>
         <div class="col-12 col-md-3">
            <div class="mb-3">
                    <x-select name='category_id' value="{{ request('category_id') }}" :options=$categories />
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="mb-3">
                <x-button type='submit' class='w-100 btn-primary'>
                    {{ __('Применить') }}
                </x-button>
            </div>
        </div>

    </div>

</x-form>
