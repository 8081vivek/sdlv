
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Management- B.S.D.L.V. Inter College</title>
    <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Crimson+Text:wght@400;600;700&family=Source+Serif+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables with Serif Fonts */
        :root {
            --primary: #1a4b8c;
            --secondary: #8B4513;
            --accent: #B22222;
            --light: #f0f7ff;
            --dark: #2c3e50;
            --white: #ffffff;
            --success: #228B22;
            --warning: #FFA500;
            --danger: #DC143C;
            --gradient: linear-gradient(135deg, #1a4b8c, #4a7abc);
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            display: flex;
            min-height: 100vh;
        }
        a{
            text-decoration: none;
            color: inherit;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: var(--primary);
            color: var(--white);
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
            left: 0;
            top: 0;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            font-size: 2rem;
            color: var(--white);
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .sidebar-close {
            display: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.3rem;
            cursor: pointer;
            padding: 5px;
            transition: var(--transition);
        }

        .sidebar-close:hover {
            color: var(--secondary);
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-left-color: var(--secondary);
        }

        .menu-item i {
            width: 20px;
            text-align: center;
        }

        .menu-text {
            font-size: 1rem;
        }

        .menu-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 15px 0;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 260px;
            transition: var(--transition);
        }

        .main-content.sidebar-collapsed {
            margin-left: 0;
        }

        /* Top Bar Styles */
        .top-bar {
            background: var(--white);
            padding: 15px 30px;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
            padding: 5px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--light);
            border-radius: 6px;
            padding: 8px 15px;
            width: 300px;
        }

        .search-bar input {
            border: none;
        
            background: transparent;
            padding: 5px 10px;
            width: 100%;
            font-family: 'Source Serif Pro', serif;
            font-size: 1rem;
        }

        .search-bar input:focus {
            outline: none;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-details {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 1rem;
        }

        .user-role {
            font-size: 0.85rem;
            color: var(--dark);
            opacity: 0.7;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .notifications {
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--accent);
            color: var(--white);
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Page Content */
        .page-content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: var(--dark);
            opacity: 0.8;
            font-size: 1.1rem;
        }

        .page-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            width:100%;  
            border-radius: 6px;
            font-size: 1rem;

            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            justify-content:center;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #153a6d;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-success {
            background: var(--success);
            color: var(--white);
        }

        .btn-success:hover {
            background: #1e7e34;
            transform: translateY(-3px);
        }

        /* Filters Section */
        .filters-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filters-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--primary);
        }

        .filter-controls {
            display: flex;
            gap:30px;
            
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-label {
            font-weight: 600;
            color: var(--primary);
            font-size: 1rem;
        }

         .filter-input {
            padding: 10px 15px;
            border: 2px solid #d1e3f8;
            border-radius: 6px;
            font-size: 1rem;
         
            background-color: var(--light);
            font-family: 'Source Serif Pro', serif;
            width: 100%;
        }

         .filter-input:focus {
            outline: none;
            border-color: var(--primary);
        }

        /* Students Table */
        .students-section {
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .table-container {
            overflow-x: auto;
        }

        .students-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        .students-table th, .students-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .students-table th {
            background-color: var(--light);
            font-weight: 600;
            color: var(--primary);
            position: sticky;
            top: 0;
        }

        .students-table tr:hover {
            background-color: #f9f9f9;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .student-name {
            font-weight: 600;
            color: var(--primary);
        }

        .student-id {
            font-size: 0.85rem;
            color: var(--dark);
            opacity: 0.7;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-active {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 70px;
            height: 35px;
            padding:10px;
            border-radius: 6px;
            display: flex;
            gap:10px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-edit {
            background: #e8f4fd;
            color: var(--primary);
        }

        .btn-edit:hover {
            background: var(--primary);
            color: var(--white);
        }

        .btn-delete {
            background: #fde8e8;
            color: var(--danger);
        }

        .btn-delete:hover {
            background: var(--danger);
            color: var(--white);
        }

        .btn-view {
            background: #e8f8f0;
            color: var(--success);
        }

        .btn-view:hover {
            background: var(--success);
            color: var(--white);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination-info {
            color: var(--dark);
            font-size: 0.9rem;
        }

        .pagination-controls {
            display: flex;
            gap: 10px;
        }

        .pagination-btn {
            padding: 8px 15px;
            border: 1px solid #d1e3f8;
            background: var(--white);
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Source Serif Pro', serif;
        }

        .pagination-btn:hover {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .pagination-btn.active {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        /* Footer */
        .page-footer {
            text-align: center;
            padding: 20px;
            color: var(--dark);
            opacity: 0.7;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            margin-top: 40px;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .sidebar-close {
                display: block;
            }
            
            .search-bar {
                width: 200px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .page-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }

        @media (max-width: 768px) {
            .search-bar {
                width: 150px;
            }
            
            .top-bar {
                padding: 15px 20px;
            }
            
            .user-details {
                display: none;
            }

            .filter-controls {
                grid-template-columns: 1fr;
            }

            .page-content {
                padding: 20px 15px;
            }

            .pagination {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .search-bar {
                display: none;
            }
            
            .page-title {
                font-size: 1.8rem;
            }

            .page-actions {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

@include('Admin_sidebar')
<div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
        <!-- Top Bar -->
        <!-- Page Content -->
        <div class="page-content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Students  Fee Submition </h1>
                    <p class="page-subtitle">Manage all student records and information</p>
                </div>
                <!-- <div class="page-actions">
                    <button class="btn btn-primary" id="addStudentBtn">
                        <a href="/student_register">
                        <i class="fas fa-user-plus"></i> Add New Student
                    </button></a>
                    <button class="btn btn-success" id="exportDataBtn">
                        <i class="fas fa-file-export"></i> Export Data
                    </button>
                </div> -->
            </div>

            <!-- Filters Section -->
        <form method="get" action="fee_pay">
    @csrf
    <div class="filters-section">
        <div class="filters-header">
            <h2 class="filters-title">Filter Students</h2>
        </div>

        <label class="filter-label">Search by Name / Roll</label>
        <div class="filter-controls">
            <div class="filter-group">
                <input type="text"
                       name="search"
                       class="filter-input"
                       value="{{ request('search') }}"
                       placeholder="Enter name or roll no">
            </div>

            <div class="filter-group">
                <button type="submit" class="btn btn-primary mt-4">
                    Apply Filter
                </button>
            </div>
        </div>
    </div>
</form>
    <!-- Students Table -->
            <div class="students-section">
                <div class="section-header">
                    <h2 class="section-title">All Students <span id="c">(0)</span> </h2>
                </div>
                <div class="table-container">
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Class & Section</th>
                                <th>Contact Info</th>
                                <th>Parent/Guardian</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>
                                    <div class="student-info">
                                        <div class="student-avatar">RK</div>
                                        <div>
                                            <div class="student-name">{{$d->name}}</div>
                                            <div class="student-id">ID: BSDLV {{$d->id}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$d->class}}</td>
                                <td>
                                    <div>{{$d->email}}</div>
                                    <div>+91 {{$d->phone}}</div>
                                </td>
                                <td>
                                    <div>Mr. {{$d->fname}}</div>
                                </td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    

                                    <div class="action-buttons">
<form action="{{ route('pay.form') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $d->id }}">

                                        <button class="btn-icon btn-delete" title="Delete">
        <i class="fa-solid fa-money-bill-wave"></i> Pay 
    </button>
</form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
    {{ $data->links('vendor.pagination.custom') }}
</div>

            </div>

            <!-- Footer -->
            <div class="page-footer">
                <p>© 2023 SDLV Inter College. All rights reserved. | Students Management v1.0</p>
            </div>
        </div>
    </div>

    <script>
    
function runCounter(id, max) {
    let count = 0;
    let speed = 1; // smooth animation

    function update() {
        count++;
        document.getElementById(id).innerHTML = count;

        if (count < max) {
            setTimeout(update, speed);
        }
    }

    update();
}

// Laravel value
runCounter("c", {{ $data1 }});
</script>
</body>
</html>