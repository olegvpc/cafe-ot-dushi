@props(["menus"=>[], "order"=>null, "selectedMenus"=>null])

<x-errors />
<div>
    <h4>
        {{ __('Select from menu list / เลือกจากรายการเมนู') }}
    </h4>

    @if($menus->isEmpty())
        <h5 class="text-danger">
            {{ __('No one dish in menu / ไม่มีอาหารจานเดียวในเมนู') }}
        </h5>
    @endif

    <ul class="list-unstyled">
        @foreach($menus as $menu)
            <li>
                <x-form class="d-flex justify-content-between flex-row m-1"
                        action="{{ route('user.orders.add', $menu->id) }}"
                        method="PATCH" >
                    <input type="hidden" name="order-id" value="{{ $order->id }}" autocomplete="off">
                    <input type="hidden" name="menu-id" value="{{ $menu->id }}" autocomplete="off">
                    {{--                <div style="width:100px; height: 100%">--}}
                    {{--                    <x-input class="" name="menu-id"  value="{{ $menu->id }}"></x-input>--}}
                    {{--                </div>--}}
                    <x-selected-id>
                        {{ $menu->id }}
                    </x-selected-id>
                    <x-selected-title>
                        {{ $menu->title }}
                    </x-selected-title>
                    {{--                <x-input name="menu-title" value="{{ $menu->title }}" />--}}
                    <x-selected-price>
                        {{ $menu->price }}
                    </x-selected-price>
                    {{--                <div style="width:100px">--}}
                    {{--                    <x-input name="menu-title" value="{{ $menu->price }}" />--}}
                    {{--                </div>--}}
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
</div>



