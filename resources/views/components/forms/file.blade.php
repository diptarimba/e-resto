<div class="mb-2 {{ $attributes->get('class') }}">
    {{-- <label class="col-form-label">{{ $label }}</label> --}}
    <label class="btn d-flex btn-outline-primary" for="{{$id}}">{{ $label }}</label>
    <input {{ $multiple }} {{ $attributes }} class="form-control d-none" type="file" name="{{ $name }}" id="{{$id}}">
 </div>
