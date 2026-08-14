<div class="card shadow-sm">

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Builder Name <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $builder->name ?? '') }}">

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
                value="{{ old('slug', $builder->slug ?? '') }}">

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

                Logo

            </label>

            <input
                type="file"
                name="logo"
                class="form-control @error('logo') is-invalid @enderror">

            @if(!empty($builder->logo))

                <div class="mt-3">

                    <img
                        src="{{ Storage::disk('public')->url($builder->logo) }}"
                        width="120"
                        class="img-thumbnail">

                </div>

            @endif

            @error('logo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Description

            </label>

            <textarea
                rows="4"
                name="description"
                class="form-control">{{ old('description', $builder->description ?? '') }}</textarea>

        </div>

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                name="status"
                value="1"
                {{ old('status', $builder->status ?? true) ? 'checked' : '' }}>

            <label class="form-check-label">

                Active

            </label>

        </div>

    </div>

    <div class="card shadow-sm mt-4">

    <div class="card-header">

        SEO Information

    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">

                Meta Title

            </label>

            <input
                type="text"
                name="meta_title"
                class="form-control"
                value="{{ old('meta_title', $builder->meta_title ?? '') }}">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Meta Description

            </label>

            <input
                type="text"
                name="meta_description"
                class="form-control"
                value="{{ old('meta_description', $builder->meta_description ?? '') }}">

        </div>

        <div>

            <label class="form-label">

                Meta Keywords

            </label>

            <input
                type="text"
                name="meta_keywords"
                class="form-control"
                value="{{ old('meta_keywords', $builder->meta_keywords ?? '') }}">

        </div>

    </div>

</div>

</div>