@props(["order"=>null, "selectedMenus"=>null])

<div>
    <h4>
        {{ __('Selected dish / จานที่เลือก') }}
    </h4>

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
                        <input type="hidden" name="menu-id" value="{{ $item->id }}" autocomplete="off">
                        <x-selected-id>
                            {{ $item->id }}
                        </x-selected-id>
                        <x-selected-title>
                            {{ $item->title }}
                        </x-selected-title>
                        <x-selected-price>
                            {{ $item->price }}
                        </x-selected-price>
                        @isset($item->image)
                            <div style="height: 50px">
                                <img class="img-fluid img-thumbnail" width="90px" src="{{ asset('/storage/' . $item->image) }}" alt="Image Menu-Item">
                            </div>
                        @endisset
                        <x-button type="submit" class="btn-danger">
                            {{ __('Delete') }}
                        </x-button>
                    </x-form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
