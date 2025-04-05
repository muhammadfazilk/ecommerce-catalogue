@csrf

<div class="mb-3">
    <label for="name" class="form-label">Product Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name ?? '') }}"
        data-parsley-errors-container="#name_error" data-parsley-required-message="Name is required" required>
    <span class="text-danger" id="name_error"></span>
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select name="category_id" id="category_id" class="form-select" required onchange="updateSizeOptions()"
        data-parsley-errors-container="#category_error" data-parsley-required-message="Category is required">
        <option value="">-- Select Category --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" data-group="{{ $categoryGroups[$category->id] ?? '' }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <span class="text-danger" id="category_error"></span>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price ($)</label>
    <input type="number" name="price" id="price" step="0.01" class="form-control"
        value="{{ old('price', $product->price ?? '') }}" data-parsley-errors-container="#price_error"
        data-parsley-required-message="Price is required" required>
    <span class="text-danger" id="price_error"></span>
</div>

<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" id="stock" class="form-control"
        value="{{ old('stock', $product->stock ?? '') }}" data-parsley-errors-container="#stock_error"
        data-parsley-required-message="Stock is required" required>
    <span class="text-danger" id="stock_error"></span>
</div>

<div class="mb-3">
    <label for="image" class="form-label">Product Image</label>
    <input type="file" name="image" id="image" class="form-control">
    @if (!empty($product?->image))
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="80" class="mt-2">
    @endif
</div>

<div class="mb-3">
    <label class="form-label">Color</label>
    <select name="attributes[color]" class="form-select">
        <option value="">-- Select Color --</option>
        @foreach (['Red', 'Blue', 'Black', 'White', 'Transparent'] as $color)
            <option value="{{ $color }}"
                {{ old('attributes.color', $selectedColor ?? null) == $color ? 'selected' : '' }}>
                {{ $color }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Size</label>
    <select name="attributes[size]" class="form-select" id="sizeSelect">
        <option value="">-- Select Size --</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">
    {{ $buttonText ?? 'Save Product' }}
</button>

@push('scripts')
    <script>
        const categoryGroups = @json($categoryGroups);
        const sizeSelect = document.getElementById('sizeSelect');

        const sizes = {
            clothing: ['S', 'M', 'L', 'XL', 'XXL'],
            electronics: ['128GB', '256GB', '512GB'],
        };

        function updateSizeOptions() {
            const selectedCategory = document.getElementById('category_id');

            const group = selectedCategory.options[selectedCategory.selectedIndex].getAttribute('data-group');

            sizeSelect.innerHTML = '<option value="">-- Select Size --</option>';
            if (sizes[group]) {
                sizes[group].forEach(size => {
                    const selected = "{{ old('attributes.size', $selectedSize ?? '') }}" === size ? 'selected' :
                        '';
                    sizeSelect.innerHTML += `<option value="${size}" ${selected}>${size}</option>`;
                });
            }
        }

        document.addEventListener("DOMContentLoaded", updateSizeOptions);
    </script>
@endpush
