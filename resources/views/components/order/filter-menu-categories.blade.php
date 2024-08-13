@props(['categories'=>[], 'order'=>''])

<x-errors />
{{--@php($categories = ['SALAD', 'SOUP'])--}}
<div class="row">

    @foreach($categories as $category)
        <div class="col-12 col-md-2">
            <x-form action="{{ route('user.orders.create', $order->table_id)}}" method='GET'>

                <div class="mb-3">
                    <x-input type="hidden" name="category" value="{{ $category }}"/>

                    <x-error name='category' />
                    <x-button type='submit' class='btn-sm btn-primary'>
                        {{ __($category) }}
                    </x-button>
                </div>

            </x-form>
        </div>
    @endforeach

</div>

