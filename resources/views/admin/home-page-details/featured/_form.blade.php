<div class="card shadow-sm mb-4">
    <div class="card-header"><h5 class="mb-0">Property Selection</h5></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Project <span class="text-danger">*</span></label>
                <select name="project_id" id="project_select" class="form-select @error('project_id') is-invalid @enderror">
                    <option value="">Select Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" @selected(old('project_id', $featured->project_id ?? '') == $project->id)>{{ $project->name }}</option>
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
    <div class="card-header"><h5 class="mb-0">Display Settings</h5></div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Display Image (Homepage Specific)</label>
            <input type="file" name="display_image" class="form-control @error('display_image') is-invalid @enderror" accept="image/*">
            @if(isset($featured) && $featured->display_image)
                <div class="mt-2">
                    <img src="{{ Storage::disk('public')->url($featured->display_image) }}" alt="Display Image" class="img-thumbnail" style="max-height: 100px">
                </div>
            @endif
            @error('display_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $featured->sort_order ?? 0) }}">
                @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" name="status" value="1" class="form-check-input" id="status" @checked(old('status', $featured->status ?? true))>
                    <label class="form-check-label" for="status">Active</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end mb-4">
    <button type="submit" class="btn btn-primary">{{ isset($featured) ? 'Update Featured Property' : 'Save Featured Property' }}</button>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const units = @json($units);
        const projectSelect = document.getElementById('project_select');
        const unitSelect = document.getElementById('unit_select');
        const oldUnitId = "{{ old('unit_id', $featured->unit_id ?? '') }}";

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
