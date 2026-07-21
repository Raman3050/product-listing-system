<div class="card shadow-sm">

    <div class="card-body">

        <form method="POST" action="{{ $action }}">
            @csrf

            @if($method == 'PUT')
                @method('PUT')
            @endif

            <!-- Category Name -->
            <div class="mb-3">

                <label for="name" class="form-label">
                    Category Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name ?? '') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Enter category name">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Slug -->
            @if($showSlug)

            <div class="mb-3">

                <label for="slug" class="form-label">
                    Slug
                </label>

                <input
                    type="text"
                    id="slug"
                    name="slug"
                    class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $category->slug ?? '') }}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            @endif

            <!-- Description -->
            <div class="mb-3">

                <label for="description" class="form-label">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Enter category description">{{ old('description', $category->description ?? '') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Status -->
            <div class="form-check form-switch mb-4">

                <input
                    id="status"
                    class="form-check-input"
                    type="checkbox"
                    name="status"
                    value="1"
                    {{ old('status', $category->status ?? true) ? 'checked' : '' }}>

                <label for="status" class="form-check-label">
                    Active
                </label>

            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end">

                <a href="{{ route('admin.categories.index') }}"
                   class="btn btn-secondary me-2">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i>
                    Save Category
                </button>

            </div>

        </form>

    </div>

</div>