<!DOCTYPE html>
<html>
<head>
    <title>Laravel Blade Component Example</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
      
<div class="container">
    <h1>Laravel Blade Component Example - NiceSnippets.com</h1>
  
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <x-post :post="$post" />
            @endforeach
        </tbody>
    </table>

</div>

</html>