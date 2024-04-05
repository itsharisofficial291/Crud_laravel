<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/product/create">Create Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>My Products</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Show</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <img src="{{ asset('assets/img/' . $product->image) }}" alt="Product Image" width="100px"
                            height="100px">
                    </td>
                    <td><a href="/product/{{ $product->id }}/edit" class="btn btn-dark">Edit</a></td>
                    <td>
                        <a href="/product/{{ $product->id }}/show" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Show
                        </a>
                    </td>
                    <td>
                        <form action="/product/{{ $product->id }}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/product/create" class="btn btn-primary">Create Product</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
