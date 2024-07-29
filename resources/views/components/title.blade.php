<div class="pb-3 border-bottom mb-4" >
    @isset($link)
        {{ $link }}
    @endisset

{{--{{ dd($link, $slot, $right) }}--}}
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h2 m-0">
                {{ $slot }}
            </h1>
        </div>

        @isset($right)
            <div>
                {{ $right }}
            </div>
        @endisset

    </div>
</div>
