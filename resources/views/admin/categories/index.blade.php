<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Categories
        </h2>
    </x-slot>

    <div class="py-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>All Categories</h5>
                {{-- <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">+ Add Category</a> --}}
            </div>
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>SI NO.</th>
                            <th>Name</th>
                            <th>Subcategories</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->children->count())
                                        <ul class="mb-0">
                                            @foreach ($category->children as $child)
                                                <li>{{ $child->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-muted">No subcategories</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
