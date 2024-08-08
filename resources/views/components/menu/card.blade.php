@props(['from' => '', 'menuItem'=>''])

<x-card>
    <x-card-body>
        <div class="mb-2">
            <div class="card-footer">
                <div class="btn-wrapper text-center d-flex justify-content-between">
                    <a class="btn btn-warning btn-sm d-flex align-items-center {{ !(Auth::user()->admin) ? 'disabled' : '' }}"
                       href="{{ route('user.menus.edit', $menuItem->id) }}">
                        {{ __('Change') }}
                    </a>
                    <div class="small m-1 ">{{ $menuItem->cuisine_id }}</div>
                    <x-form class="text-white d-flex align-items-center"
                          action="{{ route('user.menus.delete', $menuItem->id) }}" method="DELETE">
                        <x-button type="submit" class="btn-danger btn-sm {{ !(Auth::user()->admin) ? 'disabled' : '' }}" onclick="return confirm('Are you shure?')">
                            {{ __("Delete") }}
                        </x-button>
                    </x-form>

                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="small m-1 ">{{ $menuItem->id }}</div>
                <div class="small m-1 {{ $menuItem->active ? 'text-bold' : 'text-danger' }}">{{ $menuItem->active ? 'Актуальное' : 'Больше не актуальное' }}</div>
                <div class="small m-1 ">{{ $menuItem->category_id }}</div>
            </div>

            <h2 class="h6">
                <!--   вытаскиваем элементы массива -->
                @if($from === 'blog')
                    <a href="{{ route('blog.show', $menuItem->id) }}">{{ $menuItem->title }}</a>
                @elseif($from === 'user')
                    <a href="{{ route('user.menus.show', $menuItem->id) }}">{{ $menuItem->title }}</a>
                @endif
            </h2>
            <p>
                {!! $menuItem->description !!}
            </p>
            @isset($menuItem->image)
                <img class="img-fluid img-thumbnail" width="200px" src="{{ asset('/storage/' . $menuItem->image) }}" alt="Image Menu-Item">
            @endisset
            <p>
                {{__money($menuItem->price)}} &#3647;
            </p>

        </div>

    </x-card-body>
</x-card>
