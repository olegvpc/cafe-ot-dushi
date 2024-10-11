@props(['categories'=>null])
<table>
    @foreach($categories as $category)

        <tr class="col-12 col-md-4 mb-3">
            <th colspan="4" style="border:black 1px solid;">{{ $category->name }}</th>
        </tr>

        @foreach($category->menus as $menu)
            <tr>
                <td style="width: 50px">{{ $menu->id }}</td>
                <td style="width: 800px">{!! $menu->title !!}</td>
                <td style="width: 100px">{{ $menu->price }} &#3647;</td>
                <td style="width: 70px">{{ $menu->active ? "Active" : '-'}}</td>
            </tr>
        @endforeach

    @endforeach
</table>
