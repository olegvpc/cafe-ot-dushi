@props(["menus"=>[], "order"=>null, "selectedMenus"=>null])

<x-errors />
<h3>
    {{ __('Select from menu list / เลือกจากรายการเมนู') }}
</h3>

@if($menus->isEmpty())
    <h4 class="text-danger">
        {{ __('No one dish in menu / ไม่มีอาหารจานเดียวในเมนู') }}
    </h4>
@endif

<ul class="list-unstyled">
    @foreach($menus as $menu)
        <li>
            <x-form class="d-flex justify-content-between flex-row m-1 fs-3"
                    action="{{ route('user.orders.add', $menu->id) }}"
                    method="PATCH" >
                <input type="hidden" name="order-id" value="{{ $order->id }}" autocomplete="off">
                <div style="width:100px; height: 100%">
                    <x-input class="" name="menu-id"  value="{{ $menu->id }}"></x-input>
                </div>
                <x-input name="menu-title" value="{{ $menu->title }}" />
                <div style="width:100px">
                    <x-input name="menu-title" value="{{ $menu->price }}" />
                </div>
                @isset($menu->image)
                    <div style="height: 50px">
                        <img class="img-fluid img-thumbnail" width="90px" src="{{ asset('/storage/' . $menu->image) }}" alt="Image Menu-Item">
                    </div>

                @endisset
                <x-button type="submit" class="btn-success">
                    {{ __('Add') }}
                </x-button>
            </x-form>

        </li>
    @endforeach
</ul>
{{--    выводим встренную в Laravel паджинацию если меню без фильтра с категориями --}}
@if(!request()->query("category"))
    {{ $menus->links() }}
@endif

<h3>
    {{ __('Selected dish / จานที่เลือก') }}
</h3>

{{--{{ dd($selectedMenus, empty($selectedMenus)) }}--}}
@if(empty($selectedMenus))
    {{ __('No one selected / ไม่มีใครเลือก') }}
@else
    <ul class="list-unstyled">
        @foreach($selectedMenus as $item)
            <li>
                <x-form class="d-flex justify-content-between flex-row m-1"
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
