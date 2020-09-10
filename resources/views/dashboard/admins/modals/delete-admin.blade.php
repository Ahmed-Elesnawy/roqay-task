<div class="modal fade" id="delete-admin-{{ $admin->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <form method="POST"
                    action="{{ route('dashboard.admins.destroy', $admin->id) }}">
                    @csrf
                    @method('DELETE')
                    <h4>@lang('dashboard.confirm_delete')</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('dashboard.no')</button>
                <button type="submit" class="btn btn-danger">@lang('dashboard.yes')</button>
                </form>
            </div>
        </div>
    </div>
</div>
