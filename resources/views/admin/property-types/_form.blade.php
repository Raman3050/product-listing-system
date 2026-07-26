<div class="card shadow-sm">

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Property Category <span class="text-danger">*</span>
            </label>

            <select
                name="property_category_id"
                class="form-select @error('property_category_id') is-invalid @enderror">

                <option value="">
                    Select Property Category
                </option>

                @foreach($propertyCategories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('property_category_id', $propertyType->property_category_id ?? '') == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                @endforeach

            </select>

            @error('property_category_id')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Property Type Name <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $propertyType->name ?? '') }}">

            @error('name')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Slug

            </label>

            <input
                type="text"
                name="slug"
                class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug', $propertyType->slug ?? '') }}">

            @error('slug')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

            <small class="text-muted">

                Leave blank to generate automatically.

            </small>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Description

            </label>

            <textarea
                rows="4"
                name="description"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $propertyType->description ?? '') }}</textarea>

            @error('description')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                name="status"
                value="1"
                {{ old('status', $propertyType->status ?? true) ? 'checked' : '' }}>

            <label class="form-check-label">

                Active

            </label>

        </div>

    </div>

</div>