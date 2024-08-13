@props(["menus"=>null, "order"=>null, "selectedMenus"=>null])

<x-errors />
<h3>
    {{ __('Select from menu list / เลือกจากรายการเมนู') }}
</h3>

<ul class="list-unstyled">
    @foreach($menus as $menu)
        <li>
            <x-form class="d-flex justify-content-between flex-row"
                    action="{{ route('user.orders.add', $menu->id) }}"
                    method="PATCH" >
                <input type="hidden" name="order-id" value="{{ $order->id }}" autocomplete="off">
                <div style="width:100px">
                    <x-input name="menu-id"  value="{{ $menu->id }}"></x-input>
                </div>
                <x-input name="menu-title" value="{{ $menu->title }}" />
                <div style="width:100px">
                    <x-input name="menu-title" value="{{ $menu->price }}" />
                </div>
                @isset($menu->image)
                    <img class="img-fluid img-thumbnail" width="50px" src="{{ asset('/storage/' . $menu->image) }}" alt="Image Menu-Item">
                @endisset
                <x-button type="submit" class="btn-success">
                    {{ __('Add') }}
                </x-button>
            </x-form>

        </li>
    @endforeach
</ul>
{{--    выводим встренную в Laravel паджинацию--}}
{{ $menus->links() }}
<h3>
    {{ __('Selected dish / จานที่เลือก') }}
</h3>

{{--{{ dd($selectedMenus, empty($selectedMenus)) }}--}}
@if(empty($selectedMenus))
    {{ __('No one selected') }}
@else
    <ul class="list-unstyled">
        @foreach($selectedMenus as $item)
            <li>
                <x-form class="d-flex justify-content-between flex-row"
                        action="{{ route('user.orders.destroy', $item->id) }}"
                        method="DELETE" >
                    <input type="hidden" name="order-id" value="{{ $order->id }}" autocomplete="off">
                    <div style="width:100px">
                        <x-input name="menu-id" width="50px" value="{{ $item->id }}"></x-input>
                    </div>
                    <x-input name="menu-title" value="{{ $item->title }}" />
                    <div style="width:100px">
                        <x-input name="menu-title" value="{{ $item->price }}" />
                    </div>
                    <x-button type="submit" class="btn-danger">
                        {{ __('Delete') }}
                    </x-button>
                </x-form>
            </li>
            {{--        <li> {{ $item->id }} {{ $item->title }} </li>--}}
        @endforeach
    </ul>
@endif



{{--<x-form {{ $attributes->merge([--}}
{{--	'method'=>'GET'--}}
{{--]) }}>--}}

{{--	<x-form-item>--}}
{{--		<x-input name="title" value="-"  />--}}

{{--		<x-error name='title' />--}}
{{--	</x-form-item>--}}
{{--</x-form>--}}
