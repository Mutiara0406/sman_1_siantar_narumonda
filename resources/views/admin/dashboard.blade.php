<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin Dashboard</h1>

        <!-- Tampilkan statistik -->
        <div class="mt-4">
            <h3>Statistics:</h3>
            <ul>
                <li>Total Profiles: {{ $counts['profiles'] }}</li>
                <li>Total Announcements: {{ $counts['announcements'] }}</li>
                <li>Total News: {{ $counts['news'] }}</li>
                <li>Total Galleries: {{ $counts['galleries'] }}</li>
                <li>Total Contacts: {{ $counts['contacts'] }}</li>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
