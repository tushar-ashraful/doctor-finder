@if ($checkbox ?? true)
<div class="custom-control custom-checkbox d-inline">
    <input type="checkbox" class="delete-checkbox custom-control-input" id="horizontalCheckbox{{ $action->id }}" value="{{ $action->id }}">
    <label class="custom-control-label" for="horizontalCheckbox{{ $action->id }}"></label>
</div>
@endif

{{-- @if ($switch ?? false)
    <div class="custom-control custom-switch switch-primary d-inline">
        <input type="checkbox" class="custom-control-input" id="customSwitchPrimary{{ $action->id }}" data-url="{{ route('backend.' . str_singular($route) . '.update', $action->id) }}" {{ $action->status ? 'checked' : '' }}>
        <label class="custom-control-label" for="customSwitchPrimary{{ $action->id }}"></label>
    </div>
@endif --}}

{{-- @dd($action) --}}
@if ($view ?? true)
    <a href="{{ route('backend.' . $route . '.show', $action->slug) }}"><i class="far fa-eye text-info mr-1 mt-1 font-16"></i></a>
@endif

@if ($edit ?? true)
    <a href="{{ route('backend.' . $route . '.edit', $action->slug) }}"><i class="far fa-edit text-info mr-1 mt-1 font-16"></i></a>
@endif
@if ($delete ?? true)
        <form action="{{ route('backend.' . $route . '.destroy',$action->slug) }}" style="display: inline-block;" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure, want to delete this item!')" style="text-decoration: none;border: none;background: none; padding: 0px;"><i class="far fa-trash-alt text-danger mt-1 font-16"></i></button>
        </form>
    {{-- <a href="{{ route('backend.' . $route . '.destroy',$action->slug) }}" onclick="alert('Are you sure, want to delete this item!')"data-url="{{ route('backend.' . str_singular($route) . '.destroy') }}" data-id="{{ $action->id }}" class="btn-delete"><i class="far fa-trash-alt text-danger mt-1 font-16"></i></a> --}}
@endif
{{-- @if ($image ?? false)
    <a href="{{ asset($action->path()) }}" data-src="{{ $action->path() }}" data-id="{{ $action->id }}" class="select-image"><i class="far fa-check-square text-info font-16 ml-2"></i></a>
@endif --}}
