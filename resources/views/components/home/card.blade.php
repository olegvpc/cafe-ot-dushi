@props(['menuItem'=>''])

<x-card>
{{--    {{ dd($menuItem) }}--}}
    <div class="tm-list-item">
        <img class="tm-list-item-img" src="{{ asset('/storage/' . $menuItem->image) }}" alt="{{ $menuItem->title }}">
        <div class="tm-black-bg tm-list-item-text">
            <h3 class="tm-list-item-name">{{ $menuItem->title }} / <span class="tm-list-item-price">{{ $menuItem->price }}&nbsp;&#3647;</span></h3>
            <p class="tm-list-item-description">{!! $menuItem->description !!}</p>
        </div>
    </div>
</x-card>
