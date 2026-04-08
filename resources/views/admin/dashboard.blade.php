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
        
        /* Message Column Styling */
        .message-cell {
            white-space: normal !important; 
            word-wrap: break-word;          
            max-width: 300px;               
            min-width: 200px;
        }
        .btn-primary-outline {
             color: var(--color-sky-blue);
             width: 100%;
             border-radius: 5px;
             padding: 10px;
        }
        .btn-primary-outline:hover {
             background-color: rgba(255,255,255,0.1);
             color: white;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar p-4 d-flex flex-column" style="width: 250px; position: fixed; top: 0; bottom: 0;">
            <h4 class="mb-4 text-center">Wanderlust Admin</h4>
            <a href="#" class="btn btn-primary-outline text-start mb-2"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
            <a href="#bookings" class="btn btn-primary-outline text-start mb-2"><i class="fas fa-suitcase me-2"></i> Bookings</a>
            <a href="#inquiries" class="btn btn-primary-outline text-start mb-2"><i class="fas fa-envelope me-2"></i> Inquiries</a>
            <a href="#users" class="btn btn-primary-outline text-start mb-2"><i class="fas fa-users me-2"></i> Users</a>
            
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-danger w-100 text-start">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
            <a href="{{ url('/') }}" class="btn btn-outline-light mt-3 text-start"><i class="fas fa-external-link-alt me-2"></i> Go to Site</a>
        </div>

        <div class="w-100" style="margin-left: 250px;">
            <div class="content-header shadow-sm mb-4">
                <h2 class="mb-0">Analytics & Management</h2>
            </div>
            
            <div class="container-fluid p-4">
                
                <div class="row g-4 mb-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">Total Bookings</h5>
                            <p class="h3 text-dark-blue">{{ $bookings->count() }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">New Inquiries</h5>
                            <p class="h3 text-dark-blue">{{ $inquiries->count() }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">Confirmed Status</h5>
                            <p class="h3 text-success">
                                {{ $bookings->where('status', 'Confirmed')->count() }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-3">
                            <h5 class="card-title text-muted">Total Users</h5>
                            <p class="h3 text-dark-blue">{{ $users->count() }}</p> 
                        </div>
                    </div>
                </div>

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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->full_name }}</td>
                                            <td>{{ $booking->email }}</td>
                                            <td>{{ $booking->package_id }}</td>
                                            <td>{{ $booking->travelers }}</td>
                                            <td>{{ $booking->start_date }}</td>
                                            <td>
                                                @if($booking->status === 'Confirmed')
                                                    <span class="badge bg-success">Confirmed</span>
                                                @elseif($booking->status === 'Processing')
                                                    <span class="badge bg-warning text-dark">Processing</span>
                                                @elseif($booking->status === 'Cancelled')
                                                    <span class="badge bg-danger">Cancelled</span>
                                                @else
                                                    <span class="badge bg-secondary">Pending</span>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <form method="POST" action="{{ route('admin.booking.update', $booking->id) }}" style="display:inline;">
                                                    @csrf
                                                    
                                                    @if ($booking->status === 'Confirmed')
                                                        <input type="hidden" name="new_status" value="Cancelled">
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-times me-1"></i> Cancel
                                                        </button>
                                                    @else
                                                        <input type="hidden" name="new_status" value="Confirmed">
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check me-1"></i> Confirm
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr><td colspan="8" class="text-center">No recent bookings found.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h4 id="inquiries" class="mb-3 text-dark-blue"><i class="fas fa-envelope me-2"></i> Contact Form Inquiries</h4>
                <div class="card mb-5">
                    <div class="card-body p-0">
                         <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($inquiries as $inquiry)
                                        <tr>
                                            <td>{{ $inquiry->id }}</td>
                                            <td>{{ $inquiry->name }}</td>
                                            <td>{{ $inquiry->email }}</td>
                                            <td>{{ $inquiry->subject }}</td>
                                            <td class="message-cell">{{ $inquiry->message }}</td>
                                            <td>{{ $inquiry->created_at->format('Y-m-d H:i') }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="text-center">No contact inquiries found.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h4 id="users" class="mb-3 text-dark-blue"><i class="fas fa-users me-2"></i> Registered Users</h4>
                <div class="card">
                    <div class="card-body p-0">
                         <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4" class="text-center">No registered users found.</td></tr>
                                    @endforelse
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
