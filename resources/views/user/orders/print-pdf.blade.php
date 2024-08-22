<!DOCTYPE html>
<html>
    <head>
        <title>Invoice</title>
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

            {{--@font-face {--}}
            {{--    font-family: "THSarabunNew";--}}
            {{--    font-style: normal;--}}
            {{--    font-weight: 400;--}}
            {{--    src: url("{{ asset('/fonts/th-sarabun-new/THSarabunNew.ttf') }}");--}}
            {{--    /* IE9 Compat Modes */--}}
            {{--    src:--}}
            {{--        local("THSarabunNew"),--}}
            {{--        url("{{ asset('//fonts/th-sarabun-new/THSarabunNew.ttf') }}") format("truetype");--}}
            {{--}--}}
            {{--body {--}}
            {{--    font-family: "THSarabunNew";--}}
            {{--    max-width: 280px;--}}
            {{--}--}}
            ul {
                margin: 0;

            }
            .container {
                width: 280px;
                display: flex;
                flex-direction: column;
                border: black solid 1px;
            }
            /* added styles */
            .logo {
                width: 100px;
                height: 100px;
                float:right;
            }
            .company-name {
                font-size: 16px;
                font-weight: bold;
                /*float:left;*/
                margin-left: 10px;
            }
            .invoice-header {
                display: flex;
                flex-direction: column;
                margin: 20px;
                clear: both;
            }
            .menu-container {
                width: 100%;
                display: flex;
            }
            .menu-item {
                font-size: 15px;
                margin: 5px;
            }
            .fw-bold {
                font-weight: bold;
            }
            .m-1 {
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="invoice-header">
                <A4 class="company-name">Cafe "Ot Dushi"</A4> <br>

                <A5 class="fw-bold">{{ __('Table') }}: {{ $data['table_id'] }}</A5>
                <A5 class="fw-bold">{{ __('Order') }}: {{ $data['order_id'] }}</A5>
            </div>
            <div class="menu-container">
                <ul style="padding-inline-start:10px">
                    @foreach($data['order_menus'] as $menu)
                        <li class="menu-item">{!! $menu->title !!} <br>
                            <span class="fw-bold m-1">{{ $menu->price }} Baht;</span></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <p>Total Price: {{ $data['total_price'] }} Baht</p>
        <p>Спасибо!</p>
    </body>
</html>
