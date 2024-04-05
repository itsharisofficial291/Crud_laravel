<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/product/create">Add Product</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <strong>{{ $message }}</strong>
</div>
@endif

<div class="container mt-5">
  <h1>Show Product</h1>
  <div class="mb-3">
    <label for="name" class="form-label"><h3>Product Name</h3></label>
    <p>{{ $product->name }}</p>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label"><h3>Product Description</h3></label>
    <p>{{ $product->description }}</p>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label"><h3>Product Image</h3></label>
    <br>
    <img src="{{ asset('assets/img/' . $product->image) }}" alt="Product Image" style="max-width: 200px; max-height: 200px;">
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
