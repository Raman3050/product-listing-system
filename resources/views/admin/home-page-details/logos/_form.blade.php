<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0">Builder Selection</h5></div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Builder <span class="text-danger">*</span></label>
            <select name="builder_id" class="form-select @error('builder_id') is-invalid @enderror">
                <option value="">Select Builder</option>
                @foreach($builders as $builder)
                    <option value="{{ $builder->id }}" @selected(old('builder_id', $logo->builder_id ?? '') == $builder->id)>{{ $builder->name }}</option>
                @endforeach
            </select>
            @error('builder_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0">Settings</h5></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $logo->sort_order ?? 0) }}">
                @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" name="status" value="1" class="form-check-input" id="status" @checked(old('status', $logo->status ?? true))>
                    <label class="form-check-label" for="status">Active</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end mb-4">
    <button type="submit" class="btn btn-primary">{{ isset($logo) ? 'Update Logo' : 'Save Logo' }}</button>
</div>
