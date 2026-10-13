<div class="card border">
    <div class="card-body">
        <form action="{{ route('admin.appearance.settings.update') }}" method="POST">
            @csrf

            {{-- site_color --}}
            <div class="form-group">
                <label class="font-weight-bold">Default Site Color</label>
                <div class="input-group colorpickerinput">
                    <input type="text"
                           class="form-control @error('site_color') is-invalid @enderror"
                           value="{{ old('site_color', config('settings.site_color')) }}"
                           name="site_color"
                           placeholder="#0d6efd">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-fill-drip"></i>
                        </div>
                    </div>
                    @error('site_color')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <small class="text-muted">اختر اللون الأساسي للموقع</small>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                <i class="fas fa-save me-1"></i> Save
            </button>
        </form>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function () {
            if (typeof $.fn.colorpicker !== 'undefined') {
                $(".colorpickerinput").colorpicker({
                    format: 'hex',
                    component: '.input-group-append',
                });
            }
        });
    </script>
@endpush
