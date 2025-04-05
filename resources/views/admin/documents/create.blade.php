<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        
        <select name="type" required>
            <option value="">Select Type</option>
            <option value="Product Certification">Product Certification</option>
            <option value="User Manual">User Manual</option>
        </select>
    
        <input type="date" name="issue_date" required>
    
        <select name="product_id" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    
        <input type="file" name="file" accept="application/pdf" required>
    
        <button type="submit">Upload</button>
    </form>
    
</body>
</html>