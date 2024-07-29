@props(['name' => ''])

{{--@php($errorAccount = @error('account'))--}}

{{--{{ dd(@error('account')) }}--}}

<x-form action="{{ route('blog.index')}}" method='GET'>
    <div class="row">

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name='search' value="" placeholder="{{ __('Поиск')}}"/>
            </div>
        </div>

{{--        <div class="col-12 col-md-4">--}}
{{--            <div class="mb-3">--}}
{{--                <x-input name='from_date' type='date' value="{{ request('from_date')}}" placeholder="{{ __('с даты')}}"/>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-12 col-md-4">--}}
{{--            <div class="mb-3">--}}
{{--                <x-input name='to_date' type='date' value="{{ request('to_date')}}" placeholder="{{ __('по даты')}}"/>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name='tag' type='text' value="{{ request('tag')}}" placeholder="{{ __('TEG')}}"/>
            </div>
        </div>


        {{--		<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>    p>lorem7 + TAB--}}
{{--        {{ dd($categories) }}--}}
         <div class="col-12 col-md-4">
            <div class="mb-3">
                <!-- <x-select name='category_id' :options="['foo' => 'bar']" /> -->
                <!-- <x-select name='category_id' value="{{ request('category_id')}}" :options="[null => __('Все категории'), 1 => __('Первая категория'), 2 => __('Вторая категория')]" /> -->
                    <x-select name='category_id' value="{{ request('category_id')}}" :options=$categories />
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
