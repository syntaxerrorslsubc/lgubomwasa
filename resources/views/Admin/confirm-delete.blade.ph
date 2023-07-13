<div class="alert alert-danger">
        <p>Are you sure you want to delete this item?</p>
        <form method="POST" action="{{ route('admindelete_billing', $item->id) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('adminbillings') }}" class="btn btn-secondary">Cancel</a>
    </div>