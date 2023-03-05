<form id="status_{{ $status }}" action="{{ route('admin.order.change', $order) }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="status" value="{{ $status }}">
</form>
