<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fastlink')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            padding: 10px;
            overflow-y: auto;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f7f9fc;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Include Sidebar Component -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="main-content flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
