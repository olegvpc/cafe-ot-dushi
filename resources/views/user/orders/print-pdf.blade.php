<!DOCTYPE html>
<html>
    <head>
        <title>Check</title>
        <style>
            /* CSS for styling the invoice */
            @font-face {
                font-family: "DejaVu Sans";
                font-style: normal;
                font-weight: 400;
                src: url("{{ asset('/fonts/dejavu-sans/DejaVuSans.ttf') }}");
                /* IE9 Compat Modes */
                src:
                    local("DejaVu Sans"),
                    url("{{ asset('/fonts/dejavu-sans/DejaVuSans.ttf') }}") format("truetype");
            }
            body {
                font-family: "DejaVu Sans";
                /*font-size: 10px;*/
            }

            ul {
                margin: 0;

            }
            .body-container {
                width: 1050px;
                /*height: 100%;*/
                /*display: flex;*/
                /*flex-direction: row;*/
                /*justify-content: space-between;*/
                border: black dotted 1px;
            }
            .container {
                /*display: inline-block;*/
                width: 450px;
                /*display: flex;*/
                /*flex-direction: column;*/
                margin: 0 10px 0 10px;
                border: black dashed 1px;
            }
            /* added styles */
            .company-name {
                /*font-size: 16px;*/
                font-weight: bold;
                text-align: center;
                margin: 10px;
            }
            .thanks {
                /*font-size: 16px;*/
                /*font-weight: bold;*/
                text-align: center;
                /*margin-left: 10px;*/
            }
            .left-element {
                float: left;
            }
            .right-element {
                float: right;
            }
            .invoice-header {
                /*display: flex;*/
                /*flex-direction: row;*/
                /*justify-content: space-between;*/
                /*display: inline;*/
                margin: 5px;
                /*clear: both;*/
            }
            .menu-container {
                width: 100%;
                display: flex;
            }
            .menu-item {
                display: inline;
                font-size: 15px;
                margin: 5px;
            }
            .fw-bold {
                display: inline;
                font-size: 15px;
                font-weight: bold;
                margin: 5px;
            }
            .date {
                width: 50%;
                font-size: 10px;
            }
            .m-1 {
                margin: 0 5px 0 auto;

            }
        </style>
    </head>
    <body>
{{--    {{ dd($data) }}--}}
        <div class="body-container">
            <div class="container left-element">
                <h3 class="company-name">Cafe "Ot Dushi"</h3> <br>
                <div class="invoice-header">
                    {{--                <img class="logo" src="{{ asset('/img/sheff-logo.png') }}" alt="Company Logo"><br>--}}
                    <div class="fw-bold left-element">{{ __('Table') }}: {{ $data['table_id'] }}</div>
                    <div class="date">{{ $data['order_created_at']->format('Y-m-d-H-i-s') }}</div>
                    <div class="fw-bold right-element">{{ __('Order') }}: {{ $data['order_id'] }}</div>
                </div><br>

                <div class="menu-container">
                    <ul style="padding-inline-start:10px; list-style-type:none">
                        @foreach($data['order_menus'] as $menu)
                            @php($titleArray = explode('/', $menu->title)
                              )
                            <li>
                                <div class="menu-item">
                                    {{ $menu->id }}<br>{!! $titleArray[0] !!}/<br>{!! $titleArray[1] !!}
                                </div>
                                <span class="fw-bold m-1 right-element">{{ $menu->price }} Baht;</span>
                            </li><br>
                        @endforeach
                    </ul>
                </div>
                <div class="fw-bold left-element">Total Price:</div>
                <span class="fw-bold m-1 right-element">{{ $data['total_price'] }} Baht;</span>
                <h3 class="thanks">Спасибо!</h3>
            </div>
            <div class="container right-element">
                <h3 class="company-name">Cafe "Ot Dushi"</h3> <br>
                <div class="invoice-header">
                    {{--                <img class="logo" src="{{ asset('/img/sheff-logo.png') }}" alt="Company Logo"><br>--}}
                    <div class="fw-bold left-element">{{ __('Table') }}: {{ $data['table_id'] }}</div>
                    <div class="date">{{ $data['order_created_at']->format('Y-m-d-H-i-s') }}</div>
                    <div class="fw-bold right-element">{{ __('Order') }}: {{ $data['order_id'] }}</div>
                </div><br>

                <div class="menu-container">
                    <ul style="padding-inline-start:10px; list-style-type:none">
                        @foreach($data['order_menus'] as $menu)
                            @php($titleArray = explode('/', $menu->title)
                              )
                            <li>
                                <div class="menu-item">
                                    {{ $menu->id }}<br>{!! $titleArray[0] !!}<br>/ {!! $titleArray[1] !!}
                                </div>
                                <span class="fw-bold m-1 right-element">{{ $menu->price }} Baht;</span>
                            </li><br>
                        @endforeach
                    </ul>
                </div>
                <div class="fw-bold left-element">Total Price:</div>
                <span class="fw-bold m-1 right-element">{{ $data['total_price'] }} Baht;</span>
                <h3 class="thanks">Спасибо!</h3>
            </div>
        </div>
    </body>
</html>
