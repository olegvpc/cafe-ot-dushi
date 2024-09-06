@props(["payment"=>null, "creditors"=>null])

<x-errors />


<x-form {{ $attributes->merge([
	'method'=>'GET'
]) }}>
	<x-form-item>
		<x-label required>{{ __('Title of payment') }}</x-label>
		<x-input name="title" value="{{ $payment->title ?? ''}}" autofocus />

		<x-error name='title' />
	</x-form-item>

	<x-form-item>
		<x-label required>{{ __('Description') }}</x-label>
		<x-trix name="description" value="{{ $payment->description ?? ''}}" />

		<x-error name='description' />
	</x-form-item>

    <x-form-image>
        @isset($payment->image)
            <div>
                <img class="img-fluid img-thumbnail" width="200px" src="{{ asset('/storage/' . $payment->image) }}" alt="Image">
            </div>
        @endisset
        <div class="ms-3">
            <x-label>{{ __("Выберите фото")}}</x-label>
            <p class='text-danger m-1'>Size must be less 100K</p>
            <x-input type="file" accept="image/*" name="image" />
        </div>

        <x-error name='image'/>
    </x-form-image>

    <x-form-item>
        <x-checkbox type="checkbox" id="payoutCheckbox" name="payout-check" checked>
            <span id="checkbox_title">{{__('Amount out / Расход / การชำระเงิน')}}</span>
        </x-checkbox>

        <x-error name='payout-check' />
    </x-form-item>
{{--    show or input for momey out or input for money in--}}
    <x-form-item-row id="amount_out_item">
        <x-label class="text-danger m-1">{{ __('Amount OUT / Расход / การชำระเงิน') }}</x-label>
        <input class="form-control" required id="input_amount_out" name="amount_out" type="number" value="{{ $payment->amount_out ?? ''}}" />

        <x-error name='amount_out' />
    </x-form-item-row>

    <x-form-item-row class="d-none" id="amount_in_item">
        <x-label class="text-success m-1">{{ __('Amount IN / Приход / มา') }}</x-label>
        <input class="form-control" id="input_amount_in" name="amount_in" type="number" value="{{ $payment->amount_in ?? ''}}"/>

        <x-error name='amount_in' />
    </x-form-item-row>

    <x-form-item>
        <x-checkbox type="checkbox" id="creditorCheckbox" name="creditor_check">
            <span id="checkbox_creditor">{{__('Creditor / Кредитор / เจ้าหนี้')}}</span>
        </x-checkbox>

        <x-error name='creditor-check' />
    </x-form-item>

    <x-form-item class="d-none" id="creditor_item">
        <x-label required>{{ __('Creditor / Debtor') }}</x-label>
        <x-select name='creditor_id' value="{{ $payment->creditor_id ?? '' }}"
                  :options="$creditors"
        >
            Users
        </x-select>
        <x-error name='creditor_id'/>
    </x-form-item>


	<x-button type="submit" class="btn-primary">
		{{ $slot }}
	</x-button>

</x-form>


@once

    @push('body-scripts')

        <script>
            const checkbox = document.getElementById('payoutCheckbox')
            const payment_out_element = document.getElementById('amount_out_item')
            const payment_in_element = document.getElementById('amount_in_item')
            const checkbox_title_element = document.getElementById('checkbox_title')
            const input_amount_out = document.getElementById('input_amount_out')
            const input_amount_in = document.getElementById('input_amount_in')

            const creditorCheckbox = document.getElementById('creditorCheckbox')
            const creditor_item_element = document.getElementById('creditor_item')

            checkbox.addEventListener('change', (event) => {
                event.preventDefault();
                if (event.currentTarget.checked) {
                    payment_in_element.classList.add('d-none');
                    payment_out_element.classList.remove('d-none');
                    checkbox_title_element.textContent = 'Amount OUT / Расход / การชำระเงิน';
                    input_amount_in.value = ""
                    input_amount_out.setAttribute("required", "");
                    input_amount_in.removeAttribute("required", "");
                } else {
                    // alert('not checked');
                    payment_out_element.classList.add('d-none');
                    payment_in_element.classList.remove('d-none');
                    checkbox_title_element.textContent = 'Amount IN / Приход / การชำระเงิน';
                    input_amount_out.value = ""
                    input_amount_in.setAttribute("required", "");
                    input_amount_out.removeAttribute("required", "");
                }
            })

            creditorCheckbox.addEventListener('change', (event) => {
                event.preventDefault();
                if (event.currentTarget.checked) {
                    // alert('checked');
                    creditor_item_element.classList.remove('d-none');
                } else {
                    // alert('not checked');
                    creditor_item_element.classList.add('d-none')
                }
            })
        </script>

    @endpush
@endonce
