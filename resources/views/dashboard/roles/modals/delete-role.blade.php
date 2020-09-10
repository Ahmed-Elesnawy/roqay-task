<div class="modal fade" id="delete-role-{{ $role->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <form method="POST"
                    action="{{ route('dashboard.roles.destroy', $role->id) }}">
                    @csrf
                    @method('DELETE')

                    <h4>Are You Sure ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
