@props(["menuItem"=>null, "categories"=>null, "cuisines"=>null])

<x-errors />


<x-form {{ $attributes->merge([
	'method'=>'GET'
]) }}>
	<x-form-item>
		<x-label required>{{ __('Название Блюда') }}</x-label>
		<x-input name="title" value="{{ $menuItem->title ?? ''}}" autofocus />

		<x-error name='title' />
	</x-form-item>

    <x-form-item>
        <x-label required>{{ __('Можно выбрать кухню') }}</x-label>
        <x-select name='cuisine_id' value="{{ $menuItem->cuisine_id ?? '' }}" :options="$cuisines">Категория</x-select>

        <x-error name='cuisine_id'/>
    </x-form-item>

	<x-form-item>
		<x-label required>{{ __('Описание блюда') }}</x-label>
		<x-trix name="description" value="{{ $menuItem->description ?? ''}}" />

		<x-error name='description' />

	</x-form-item>

{{--    {{ dd($menuItem->category_id) }}--}}
{{--    "DRINK"--}}
    <x-form-item>
        <x-label required>{{ __('Категория блюда') }}</x-label>
        <x-select name='category_id' value="{{ $menuItem->category_id ?? '' }}" :options="$categories">Категория</x-select>
        <x-error name='category_id'/>
    </x-form-item>

    <x-form-item-row>
        @isset($menuItem->image)
            <div>
                <img class="img-fluid img-thumbnail" width="200px" src="{{ asset('/storage/' . $menuItem->image) }}" alt="Image Menu-Item">
            </div>
        @endisset

        <div class="ms-3">
            <x-label>{{ __("Выберите фото")}}</x-label>
            <p class='text-danger m-1'>Size must be less 100K</p>
            <x-input type="file" accept="image/*" name="image" />
        </div>

        <x-error name='image'/>
    </x-form-item-row>

    <x-form-item>
        <x-label required>{{ __('Стоимость') }}</x-label>
        <x-input name="price" type="number" value="{{ $menuItem->price ?? ''}}"/>

        <x-error name='price' />
    </x-form-item>

    <x-form-item>
        <x-checkbox type="checkbox" name="active" checked>
            {{__('Актуальное')}}
        </x-checkbox>

        <x-error name='active' />
    </x-form-item>

	<x-button type="submit" class="btn-primary {{ !(Auth::user()->admin) ? 'disabled' : '' }}">
		{{ $slot }}
	</x-button>

    <x-error name='account' />

</x-form>

