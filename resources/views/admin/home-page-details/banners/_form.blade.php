<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0">Selection</h5></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Project <span class="text-danger">*</span></label>
                <select name="project_id" id="project_select" class="form-select @error('project_id') is-invalid @enderror">
                    <option value="">Select Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" @selected(old('project_id', $banner->project_id ?? '') == $project->id)>{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Unit <span class="text-danger">*</span></label>
                <select name="unit_id" id="unit_select" class="form-select @error('unit_id') is-invalid @enderror">
                    <option value="">Select Unit</option>
                    <!-- Units will be populated via JS -->
                </select>
                @error('unit_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0">Banner Details</h5></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Small Yellow Tagline</label>
                <input type="text" name="yellow_tagline" class="form-control @error('yellow_tagline') is-invalid @enderror" value="{{ old('yellow_tagline', $banner->yellow_tagline ?? '') }}">
                @error('yellow_tagline') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Main White Heading</label>
                <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" value="{{ old('heading', $banner->heading ?? '') }}">
                @error('heading') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $banner->description ?? '') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Button Text</label>
                <input type="text" name="button_text" class="form-control @error('button_text') is-invalid @enderror" value="{{ old('button_text', $banner->button_text ?? '') }}">
                @error('button_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Background Image</label>
                <input type="file" name="background_image" class="form-control @error('background_image') is-invalid @enderror" accept="image/*">
                @if(isset($banner) && $banner->background_image)
                    <div class="mt-2">
                        <img src="{{ Storage::disk('public')->url($banner->background_image) }}" alt="Background" class="img-thumbnail" style="max-height: 100px">
                    </div>
                @endif
                @error('background_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0">Editable Black Card</h5></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Card Title</label>
                <input type="text" name="card_title" class="form-control @error('card_title') is-invalid @enderror" value="{{ old('card_title', $banner->card_title ?? '') }}">
                @error('card_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Card Category</label>
                <input type="text" name="card_category" class="form-control @error('card_category') is-invalid @enderror" value="{{ old('card_category', $banner->card_category ?? '') }}">
                @error('card_category') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Card Brand</label>
                <input type="text" name="card_brand" class="form-control @error('card_brand') is-invalid @enderror" value="{{ old('card_brand', $banner->card_brand ?? '') }}">
                @error('card_brand') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Card Area</label>
                <input type="text" name="card_area" class="form-control @error('card_area') is-invalid @enderror" value="{{ old('card_area', $banner->card_area ?? '') }}">
                @error('card_area') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0">Settings</h5></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $banner->sort_order ?? 0) }}">
                @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" name="status" value="1" class="form-check-input" id="status" @checked(old('status', $banner->status ?? true))>
                    <label class="form-check-label" for="status">Active</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end mb-4">
    <button type="submit" class="btn btn-primary">{{ isset($banner) ? 'Update Banner' : 'Save Banner' }}</button>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const units = @json($units);
        const projectSelect = document.getElementById('project_select');
        const unitSelect = document.getElementById('unit_select');
        const oldUnitId = "{{ old('unit_id', $banner->unit_id ?? '') }}";

        function updateUnits() {
            const projectId = projectSelect.value;
            unitSelect.innerHTML = '<option value="">Select Unit</option>';
            
            if (projectId) {
                const filteredUnits = units.filter(unit => unit.project_id == projectId);
                filteredUnits.forEach(unit => {
                    const option = document.createElement('option');
                    option.value = unit.id;
                    option.textContent = unit.name;
                    if (unit.id == oldUnitId) {
                        option.selected = true;
                    }
                    unitSelect.appendChild(option);
                });
            }
        }

        projectSelect.addEventListener('change', updateUnits);
        
        // Initial load
        updateUnits();
    });
</script>
@endpush
