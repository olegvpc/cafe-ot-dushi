<form action="{{ route('user.menus.delete', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
{{--    https://www.youtube.com/watch?v=b-x80141JCw--}}
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{$menuItem->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Удалить это') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal body">You shure You want to DELETE <b>$menuItem->title</b>?</div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="button" class="btn btn-outline-danger">{{ __('Delete') }}</button>
                </div>
            </div>
        </div>
    </div>

{{--    <x-button type="submit" class="btn-danger btn-sm">--}}
{{--        {{ __("Delete") }}--}}
{{--    </x-button>--}}
</form>
