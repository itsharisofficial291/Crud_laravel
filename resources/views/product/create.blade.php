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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <strong>{{ $message }}</strong>
</div>
@endif

<div class="container mt-5">
  <h1>Create Products</h1>
  <form action="/product/store" method="post" enctype="multipart/form-data">
    @csrf <!-- Remove this line if not using Blade templating -->
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
      @if($errors->has('name'))
      <span class="text-danger">{{$errors -> first('name')}}</span>
      @endif
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" rows="4" value="{{ old('description') }}"></textarea>
      @if($errors->has('description'))
      <span class="text-danger">{{$errors -> first('description')}}</span>
      @endif
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
      @if($errors->has('image'))
      <span class="text-danger">{{$errors -> first('image')}}</span>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
