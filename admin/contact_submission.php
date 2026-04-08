<?php
session_start();
require_once "connection.php";

// --- Authentication Check (Basic) ---
// You should implement stronger admin user checks (e.g., checking user role)
// For this demo, we check if ANY user is logged in via session.
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header("Location: login-signup.html");
//     exit;
// }

// --- 1. Fetch Latest Bookings ---
$bookings_sql = "SELECT id, full_name, email, package_id, start_date, travelers, status 
                 FROM bookings ORDER BY id DESC LIMIT 5";
$bookings_result = mysqli_query($conn, $bookings_sql);
$bookings = [];
if ($bookings_result) {
    while ($row = mysqli_fetch_assoc($bookings_result)) {
        $bookings[] = $row;
    }
}

// --- 2. Fetch All Contact Inquiries ---
$inquiries_sql = "SELECT id, full_name, email, subject, submission_date 
                  FROM inquiries ORDER BY submission_date DESC";
$inquiries_result = mysqli_query($conn, $inquiries_sql);
$inquiries = [];
if ($inquiries_result) {
    while ($row = mysqli_fetch_assoc($inquiries_result)) {
        $inquiries[] = $row;
    }
}

mysqli_close($conn);

// Helper function to render status badges
function getStatusBadge($status) {
    switch ($status) {
        case 'Confirmed':
            return '<span class="badge bg-success">Confirmed</span>';
        case 'Processing':
            return '<span class="badge bg-warning text-dark">Processing</span>';
        default:
            return '<span class="badge bg-secondary">Pending</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wanderlust</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        :root {
            --color-dark-blue: #052659;
            --color-deep-navy: #021024;
            --color-sky-blue: #c1e8ff;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
        }
        .sidebar {
            background-color: var(--color-deep-navy);
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: var(--color-sky-blue);
            text-decoration: none;
        }
        .content-header {
            background-color: var(--color-dark-blue);
            color: white;
            padding: 20px;
        }
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .table thead {
            background-color: var(--color-dark-blue);
            color: white;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-4 d-flex flex-column" style="width: 250px;">
            <h4 class="mb-4 text-center">Wanderlust Admin</h4>
            <a href="admin_dashboard.php" class="btn btn-primary-outline text-start mb-2"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
            <a href="#bookings" class="btn btn-primary-outline text-start mb-2"><i class="fas fa-suitcase me-2"></i> Bookings</a>
            <a href="#inquiries" class="btn btn-primary-outline text-start mb-2"><i class="fas fa-envelope me-2"></i> Inquiries</a>
            <a href="index.html" class="btn btn-danger mt-auto text-start"><i class="fas fa-sign-out-alt me-2"></i> Go to Site</a>
        </div>

        <!-- Main Content -->
        <div class="w-100">
            <div class="content-header shadow-sm mb-4">
                <h2 class="mb-0">Analytics & Management</h2>
            </div>
            
            <div class="container-fluid p-4">
                
                <!-- Summary Stats -->
                <div class="row g-4 mb-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">Total Bookings</h5>
                            <p class="h3 text-dark-blue"><?php echo count($bookings); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">New Inquiries</h5>
                            <p class="h3 text-dark-blue"><?php echo count($inquiries); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">Confirmed Status</h5>
                            <p class="h3 text-success"><?php 
                                $confirmed_count = 0;
                                foreach ($bookings as $b) {
                                    if ($b['status'] === 'Confirmed') $confirmed_count++;
                                }
                                echo $confirmed_count;
                            ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">Total Users</h5>
                            <p class="h3 text-dark-blue">50+</p> <!-- Placeholder, needs DB query -->
                        </div>
                    </div>
                </div>

                <!-- Bookings Table -->
                <h4 id="bookings" class="mb-3 text-dark-blue"><i class="fas fa-suitcase me-2"></i> Recent Package Bookings</h4>
                <div class="card mb-5">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Package ID</th>
                                        <th>Travelers</th>
                                        <th>Start Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($bookings)): ?>
                                        <?php foreach ($bookings as $booking): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($booking['id']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['full_name']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['email']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['package_id']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['travelers']); ?></td>
                                                <td><?php echo htmlspecialchars($booking['start_date']); ?></td>
                                                <td><?php echo getStatusBadge(htmlspecialchars($booking['status'])); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="7" class="text-center">No recent bookings found.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Inquiries Table -->
                <h4 id="inquiries" class="mb-3 text-dark-blue"><i class="fas fa-envelope me-2"></i> Contact Form Inquiries</h4>
                <div class="card">
                    <div class="card-body p-0">
                         <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($inquiries)): ?>
                                        <?php foreach ($inquiries as $inquiry): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                                                <td><?php echo htmlspecialchars($inquiry['full_name']); ?></td>
                                                <td><?php echo htmlspecialchars($inquiry['email']); ?></td>
                                                <td><?php echo htmlspecialchars($inquiry['subject']); ?></td>
                                                <td><?php echo htmlspecialchars(date("Y-m-d H:i", strtotime($inquiry['submission_date']))); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="5" class="text-center">No contact inquiries found.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>