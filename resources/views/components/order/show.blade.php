@props(["menus"=>[], "order"=>null, "order_amount"=>null])

<x-errors />
{{--<h3>--}}
{{--    {{ __('Select from menu list / เลือกจากรายการเมนู') }}--}}
{{--</h3>--}}
{{--{{ dd($menus) }}--}}
@if(empty($menus))
    <h4 class="text-danger">
        {{ __('No one dish in menu / ไม่มีอาหารจานเดียวในเมนู') }}
    </h4>
@endif

<ul class="list-unstyled">
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold text-uppercase fs-4">Total Price: </div>
        </div>
        <span class="badge bg-primary rounded-pill fs-4">{{ $order_amount }}</span>
    </li>
    @foreach($menus as $menu)

        <li>
            <x-form class="d-flex justify-content-between flex-row m-1 fs-3"
                    action=""
                    method="GET" >

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
            </x-form>
        </li>
    @endforeach
</ul>
{{--    выводим встренную в Laravel паджинацию--}}
{{--{{ $menus->links() }}--}}


