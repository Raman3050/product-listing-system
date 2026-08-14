<div class="card shadow-sm">

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Tenant / Brand Name <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $tenant->name ?? '') }}">

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
                value="{{ old('slug', $tenant->slug ?? '') }}">

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
                Business Category
            </label>

            <select
                name="business_category"
                class="form-select @error('business_category') is-invalid @enderror">

                <option value="">
                    Select Business Category
                </option>

                <option
                    value="Bank"
                    @selected(
                        old(
                            'business_category',
                            $tenant->business_category ?? ''
                        ) === 'Bank'
                    )>
                    Bank
                </option>

                <option
                    value="Food & Bev"
                    @selected(
                        old(
                            'business_category',
                            $tenant->business_category ?? ''
                        ) === 'Food & Bev'
                    )>
                    Food & Bev
                </option>

                <option
                    value="Retail"
                    @selected(
                        old(
                            'business_category',
                            $tenant->business_category ?? ''
                        ) === 'Retail'
                    )>
                    Retail
                </option>

                <option
                    value="Gaming Zone"
                    @selected(
                        old(
                            'business_category',
                            $tenant->business_category ?? ''
                        ) === 'Gaming Zone'
                    )>
                    Gaming Zone
                </option>

                <option
                    value="Entertainment"
                    @selected(
                        old(
                            'business_category',
                            $tenant->business_category ?? ''
                        ) === 'Entertainment'
                    )>
                    Entertainment
                </option>

                <option
                    value="Lifestyle"
                    @selected(
                        old(
                            'business_category',
                            $tenant->business_category ?? ''
                        ) === 'Lifestyle'
                    )>
                    Lifestyle
                </option>

            </select>

            @error('business_category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Logo

            </label>

            <input
                type="file"
                name="logo"
                class="form-control @error('logo') is-invalid @enderror">

            @if(!empty($tenant->logo))

                <div class="mt-3">

                    <img
                        src="{{ Storage::disk('public')->url($tenant->logo) }}"
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
                class="form-control">{{ old('description', $tenant->description ?? '') }}</textarea>

        </div>

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                name="status"
                value="1"
                {{ old('status', $tenant->status ?? true) ? 'checked' : '' }}>

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
                value="{{ old('meta_title', $tenant->meta_title ?? '') }}">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Meta Description

            </label>

            <input
                type="text"
                name="meta_description"
                class="form-control"
                value="{{ old('meta_description', $tenant->meta_description ?? '') }}">

        </div>

        <div>

            <label class="form-label">

                Meta Keywords

            </label>

            <input
                type="text"
                name="meta_keywords"
                class="form-control"
                value="{{ old('meta_keywords', $tenant->meta_keywords ?? '') }}">

        </div>

    </div>

</div>

</div>