<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - B.S.D.L.V. Inter College</title>
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

        /* Class Selection Form Styles */
        .class-selection-container {
            flex: 1;
            padding: 30px;
            background-color: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .selection-form {
            background: var(--white);
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 600px;
            border-top: 5px solid var(--secondary);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-family:  serif;
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        

        .btn {
            padding: 12px 25px;
            border-radius: 6px;
            border: none;
            font-family: 'Crimson Text', serif;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: var(--transition);
            width: 100%;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #0d3a73;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.3);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--light);
        }

       
    </style>
</head>
<body>
    @include("Admin_sidebar")
    
        <!-- Class Selection Form (Initially Visible) -->
        <div class="class-selection-container" id="classSelection">
            <div class="selection-form">
                <div class="form-header">
                    <h2>Select Faculty type </h2>
                    
             
                </div>
                
<form id="attendanceForm" action="type_code" method="POST">
                        @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="classSelect">
                                <i class="fas fa-chalkboard-teacher"></i> Select Type of faculty
                            </label>
                           <select  class="form-control" name="type" id="sectionSelect" required>
                            @foreach($data as $d)
                            <option value="{{$d->type}}">{{$d->type}}</option>
                            @endforeach
    </select>
                        </div>
                        
                    
                    </div>
                    
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Next
                        </button>
                    </div>
                </form>
            </div>
        </div>

    

   
</body>
</html>