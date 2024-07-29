<div class="card-body">
{{--    {{ $slot }}--}}
{{--    для размещения втрой кнопки делаем флекс и раздвигаем по краям--}}
    <div class="d-flex justify-content-between">

        <div>
            {{ $slot }}
        </div>
        <!-- можно короче -->
        @isset($right)
            <div>

                {{ $right }}

            </div>
        @endisset
    </div>
</div>
