<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Compliance Document') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="">Select Type</option>
                            <option value="Product Certification" {{ old('type') == 'Product Certification' ? 'selected' : '' }}>Product Certification</option>
                            <option value="User Manual" {{ old('type') == 'User Manual' ? 'selected' : '' }}>User Manual</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="issue_date" class="form-label">Issue Date</label>
                        <input type="date" name="issue_date" id="issue_date" class="form-control"
                            value="{{ old('issue_date') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="product_id" class="form-label">Associated Product</label>
                        <select name="product_id" id="product_id" class="form-select" required>
                            <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="file" class="form-label">Upload PDF</label>
                        <input type="file" name="file_path" id="file" accept="application/pdf" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Upload Document
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
