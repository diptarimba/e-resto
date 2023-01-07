<div class="mb-2">
    <div  class="col-form-label">{{ $label }}</div>
    <select class="form-control" {{ $multiple }} data-placeholder="{{ $placeholder }}" name="{{ $name }}">
        <option>Default Value</option>
        @foreach ($items as $id => $name)
            <option value="{{ $id }}" @if (@$value == $id) selected @endif>{{ $name }}</option>
        @endforeach
    </select>
</div>
