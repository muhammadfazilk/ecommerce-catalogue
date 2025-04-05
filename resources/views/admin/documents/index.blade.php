<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Documents</h2>
    </x-slot>

    <div class="container py-4">
        <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">
            + Add Document
        </a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SI NO.</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Issue Date</th>
                        <th>Product</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $document)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->type }}</td>
                            <td>{{ \Carbon\Carbon::parse($document->issue_date)->format('d-m-Y') }}</td>
                            <td>{{ $document->product->name ?? '-' }}</td>
                            <td>
                                @if($document->file_path)
                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="btn btn-sm btn-info">View</a>
                                @else
                                    <span class="text-muted">No File</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('documents.download', $document) }}" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-download"></i>
                                </a>
                                {{-- <a href="{{ route('compliance-documents.edit', $document) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('compliance-documents.destroy', $document) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this document?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No documents found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $documents->links() }}
    </div>
</x-app-layout>
