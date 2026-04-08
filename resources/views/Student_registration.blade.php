
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - B.S.D.L.V. Inter College</title>
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
            padding: 20px;
        }
        .success-message {
            background: var(--success);
            color: var(--white);
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
            font-family: 'Source Serif Pro', serif;
        }

        .container-fluid {
            padding: 20px;
        }

        /* Header Section */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 40px 20px;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin-bottom: 15px;
            font-weight: 700;
            color:var(--primary);
            letter-spacing: 0.5px;
        }

        .page-header p {
            font-size: 1.2rem;
            opacity: 0.9;
            color:var(--primary);
            max-width: 700px;
            margin: 0 auto;
        }

        /* Registration Form */
        .registration-container {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .form-header {
            background: var(--primary);
            color: var(--white);
            padding: 25px 40px;
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .form-content {
            padding: 40px;
        }

        .form-section {
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eaeaea;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--secondary);
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1 1 300px;
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .required::after {
            content: " *";
            color: var(--accent);
        }

        .input-group {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #d1e3f8;
            border-radius: 6px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--light);
            font-family: 'Source Serif Pro', serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            opacity: 0.7;
        }

        select.form-control {
            appearance: none;
            padding-right: 40px;
        }

        .radio-group, .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 5px;
        }

        .radio-option, .checkbox-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .radio-option input, .checkbox-option input {
            width: 18px;
            height: 18px;
        }

        .form-text {
            font-size: 0.9rem;
            color: var(--dark);
            margin-top: 5px;
            opacity: 0.7;
        }
        
        .file-upload-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .file-upload-box {
            border: 2px dashed #d1e3f8;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            background: rgba(240, 247, 255, 0.3);
            position: relative;
            overflow: hidden;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .file-upload-box:hover {
            border-color: var(--primary);
            background: rgba(26, 75, 140, 0.03);
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .file-upload-box i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .file-upload-box:hover i {
            transform: scale(1.1);
            color: var(--secondary);
        }

        .file-upload-box input {
            display: none;
        }

        .file-upload-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
        }

        .file-upload-info {
            font-size: 0.95rem;
            color: #666;
            margin-top: 8px;
            opacity: 0.8;
        }

        .file-preview {
            margin-top: 15px;
            padding: 10px;
            background: rgba(26, 75, 140, 0.05);
            border-radius: 20px;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
            flex: 1;
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

        .btn-secondary {
            background: var(--secondary);
            color: var(--white);
        }

        .btn-secondary:hover {
            background: #6b3810;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-reset {
            background: #e0e0e0;
            color: var(--dark);
        }

        .btn-reset:hover {
            background: #d0d0d0;
            transform: translateY(-3px);
        }

        /* Success Message */
        .success-message {
            background: var(--success);
            color: var(--white);
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
            font-family: 'Source Serif Pro', serif;
        }

        /* error-message */
        .error-message {
            color: var(--accent);
            font-size: 0.95rem;
            margin-top: 8px;
            padding: 8px 12px;
            background: rgba(220, 20, 60, 0.05);
            border-radius: 6px;
            border-left: 3px solid var(--accent);
            display: none;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-content {
                padding: 30px 20px;
            }

            .form-header {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    @include("Admin_sidebar")
    <div class="container-fluid">
        <!-- Page Header -->
        <header class="page-header">
            <h1>Student Registration</h1>
            <p>Complete the form below to register as a new student at B.S.D.L.V. Inter College</p>
        </header>

        <!-- Registration Form -->
        <div class="registration-container">
            <div class="form-header">
                <h2>New Student Application Form</h2>
 
            </div>
 


            <div class="form-content">
                <!-- Display validation errors -->
                <!-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->

              

                          @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif
                <form id="studentRegistrationForm" action="/student_registration" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Personal Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user"></i> Personal Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName" class="form-label required">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter your first name" value="{{ old('firstName') }}" required>
                                <div class="error-message" id="firstNameError"></div>
                                @error('firstName')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lastName" class="form-label required">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter your last name" value="{{ old('lastName') }}" required>
                                <div class="error-message" id="lastNameError"></div>
                                @error('lastName')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="dateOfBirth" class="form-label required">Date of Birth</label>
                                <div class="input-group">
                                    <input type="date" id="dateOfBirth" name="dob" class="form-control" value="{{ old('dob') }}" required>
                                    <i class="fas fa-calendar-alt input-icon"></i>
                                </div>
                                <div class="error-message" id="dateOfBirthError"></div>
                                @error('dob')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Gender</label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                        <label for="female">Female</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="other" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                        <label for="other">Other</label>
                                    </div>
                                </div>
                                <div class="error-message" id="genderError"></div>
                                @error('gender')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="nationality" class="form-label required">Nationality</label>
                                <div class="input-group">
                                    <select id="nationality" name="nationality" class="form-control" required>
                                        <option value="">Select Nationality</option>
                                        <option value="indian" {{ old('nationality') == 'indian' ? 'selected' : '' }}>Indian</option>
                                        <option value="other" {{ old('nationality') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                <div class="error-message" id="nationalityError"></div>
                                @error('nationality')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="religion" class="form-label">Religion</label>
                                <input type="text" id="religion" name="religion" class="form-control" value="{{ old('religion') }}" placeholder="Enter your religion">
                                @error('religion')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-address-book"></i> Contact Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="address" class="form-label required">Residential Address</label>
                                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your complete address" required>{{ old('address') }}</textarea>
                                <div class="error-message" id="addressError"></div>
                                @error('address')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="city" class="form-label required">City</label>
                                <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city" value="{{ old('city') }}" required>
                                <div class="error-message" id="cityError"></div>
                                @error('city')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="state" class="form-label required">State</label>
                                <input type="text" id="state" name="state" class="form-control" placeholder="Enter your state" value="{{ old('state') }}" required>
                                <div class="error-message" id="stateError"></div>
                                @error('state')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pincode" class="form-label required">PIN Code</label>
                                <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter PIN code" value="{{ old('pincode') }}" required maxlength="6">
                                <div class="error-message" id="pincodeError"></div>
                                @error('pincode')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label required">Phone Number</label>
                                <div class="input-group">
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                                    <i class="fas fa-phone input-icon"></i>
                                </div>
                                <div class="error-message" id="phoneError"></div>
                                @error('phone')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label required">Email Address</label>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}" required>
                                    <i class="fas fa-envelope input-icon"></i>
                                </div>
                                <div class="error-message" id="emailError"></div>
                                @error('email')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-graduation-cap"></i> Academic Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="class" class="form-label required">Class Applying For</label>
                                <div class="input-group">
                                    <select id="class" name="class" class="form-control" required>
                                        <option value="">Select Class</option>
                                        <option value="U.K.G" {{ old('class') == 'U.K.G' ? 'selected' : '' }}>U.K.G</option>
                                        <option value="L.K.G" {{ old('class') == 'L.K.G' ? 'selected' : '' }}>L.K.G</option>
                                        <option value="1" {{ old('class') == '1' ? 'selected' : '' }}>Class 1</option>
                                        <option value="2" {{ old('class') == '2' ? 'selected' : '' }}>Class 2</option>
                                        <option value="3" {{ old('class') == '3' ? 'selected' : '' }}>Class 3</option>
                                        <option value="4" {{ old('class') == '4' ? 'selected' : '' }}>Class 4</option>
                                        <option value="5" {{ old('class') == '5' ? 'selected' : '' }}>Class 5</option>
                                        <option value="6" {{ old('class') == '6' ? 'selected' : '' }}>Class 6</option>
                                        <option value="7" {{ old('class') == '7' ? 'selected' : '' }}>Class 7</option>
                                        <option value="8" {{ old('class') == '8' ? 'selected' : '' }}>Class 8</option>
                                        <option value="9" {{ old('class') == '9' ? 'selected' : '' }}>Class 9</option>
                                        <option value="10" {{ old('class') == '10' ? 'selected' : '' }}>Class 10</option>
                                        <option value="11" {{ old('class') == '11' ? 'selected' : '' }}>Class 11</option>
                                        <option value="12" {{ old('class') == '12' ? 'selected' : '' }}>Class 12</option>
                                    </select>
                                    <i class="fas fa-chevron-down input-icon"></i>
                                </div>
                                <div class="error-message" id="classError"></div>
                                @error('class')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="previousSchool" class="form-label required">Previous School</label>
                                <input type="text" id="previousSchool" name="pschool" class="form-control" value="{{ old('pschool') }}" placeholder="Name of your previous school" required>
                                <div class="error-message" id="previousSchoolError"></div>
                                @error('pschool')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lastClass" class="form-label required">Last Class Completed</label>
                                <input type="text" id="lastClass" name="lastclass" class="form-control" value="{{ old('lastclass') }}" placeholder="Last class you completed" required>
                                <div class="error-message" id="lastClassError"></div>
                                @error('lastclass')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Parent/Guardian Information -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-users"></i> Parent/Guardian Information
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="fatherName" class="form-label required">Father's Name</label>
                                <input type="text" id="fatherName" name="father_name" class="form-control" value="{{ old('father_name') }}" placeholder="Enter father's full name" required>
                                <div class="error-message" id="fatherNameError"></div>
                                @error('father_name')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fatherOccupation" class="form-label">Father's Occupation</label>
                                <input type="text" id="fatherOccupation" name="father_occupation" class="form-control" value="{{ old('father_occupation') }}" placeholder="Enter father's occupation">
                                @error('father_occupation')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="motherName" class="form-label required">Mother's Name</label>
                                <input type="text" id="motherName" name="mother_name" class="form-control" value="{{ old('mother_name') }}" placeholder="Enter mother's full name" required>
                                <div class="error-message" id="motherNameError"></div>
                                @error('mother_name')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="motherOccupation" class="form-label">Mother's Occupation</label>
                                <input type="text" id="motherOccupation" name="mother_occupation" class="form-control" value="{{ old('mother_occupation') }}" placeholder="Enter mother's occupation">
                                @error('mother_occupation')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                       
                    </div>

                    <!-- Account Creation -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-key"></i> Account Creation
                        </h3>

                        <div class="form-row">
                       

                        <div class="form-group">
                               <label for="password" class="form-label required">Password</label>
                               <div class="input-group">
                                   <input type="password" id="password" name="password" class="form-control">
                                   <i class="fas fa-lock input-icon"></i>
                               </div>
                           
                               <!-- ❗ यह नीचे सही जगह है -->
                               @error('password')
                                   <div class="error-message" style="display: block;">{{ $message }}</div>
                               @enderror
                           
                               <div class="form-text">Password must be at least 8 characters long</div>
                        </div>

                        </div>

                        <div class="form-group">
                              <label for="confirmPassword" class="form-label required">Confirm Password</label>
                              <div class="input-group">
                                  <input type="password" id="confirmPassword" name="confirm_password" class="form-control">
                                  <i class="fas fa-lock input-icon"></i>
                              </div>
                          
                              @error('confirm_password')
                                  <div class="error-message" style="display: block;">{{ $message }}</div>
                              @enderror
                         </div>

                    </div>

                    <!-- Documents Upload Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-file-upload"></i> Documents Upload
                        </h3>

                        <div class="file-upload-container">
                            <!-- Resume Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('resume').click()">
                                <i class="fas fa-file-pdf"></i>
                                <div class="file-upload-label">Transfer Certificate/T.C.</div>
                                <div class="file-upload-info">Upload your resume (PDF, DOC, DOCX)</div>
                                <input type="file" id="resume" name="resume" value="{{ old('resume') }}" accept=".pdf,.doc,.docx" onchange="showFileName(this, 'resumePreview')">
                                <div id="resumePreview" class="file-preview"></div>
                                @error('resume')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Certificates Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('certificates').click()">
                                <i class="fas fa-certificate"></i>
                                <div class="file-upload-label">Father'S Photo</div>
                                <div class="file-upload-info">Upload Father'Photo (PDF, JPG, PNG)</div>
                                <input type="file" id="certificates" value="{{ old('certificate') }}" name="certificate" accept=".jpg,.jpeg,.png"  onchange="showFileNames(this, 'certificatesPreview')">
                                <div id="certificatesPreview" class="file-preview"></div>
                                @error('certificates')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ID Proof Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('id_proof').click()">
                                <i class="fas fa-id-card"></i>
                                <div class="file-upload-label">Addhar Cad</div>
                                <div class="file-upload-info">Aadhaar, PAN, or other ID</div>
                                <input type="file" id="id_proof" name="idproof" value="{{ old('idproof') }}" accept=".pdf,.jpg,.jpeg,.png" onchange="showFileName(this, 'idProofPreview')">
                                <div id="idProofPreview" class="file-preview"></div>
                                @error('idproof')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Photo Upload -->
                            <div class="file-upload-box" onclick="document.getElementById('photo').click()">
                                <i class="fas fa-camera"></i>
                                <div class="file-upload-label">Passport Photo</div>
                                <div class="file-upload-info">Recent passport size photo</div>
                                <input type="file" id="photo" name="photo" va accept=".jpg,.jpeg,.png" onchange="showFileName(this, 'photoPreview')">
                                <div id="photoPreview" class="file-preview"></div>
                                @error('photo')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="form-section">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="checkbox-option">
                                    <input type="checkbox" id="agreeTerms" name="terms" required>
                                    <label for="agreeTerms" class="form-label">I agree to the <a href="#">terms and conditions</a> and <a href="#">privacy policy</a></label>
                                </div>
                                <div class="error-message" id="termsError"></div>
                                @error('terms')
                                    <div class="error-message" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="reset" class="btn btn-reset">
                            <i class="fas fa-redo"></i> Reset Form
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showFileName(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                preview.textContent = input.files[0].name;
                preview.style.color = 'var(--primary)';
            } else {
                preview.textContent = 'No file selected';
                preview.style.color = '#666';
            }
        }

        function showFileNames(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files.length > 0) {
                if (input.files.length === 1) {
                    preview.textContent = input.files[0].name;
                } else {
                    preview.textContent = `${input.files.length} files selected`;
                }
                preview.style.color = 'var(--primary)';
            } else {
                preview.textContent = 'No files selected';
                preview.style.color = '#666';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const registrationForm = document.getElementById('studentRegistrationForm');
            const successMessage = document.getElementById('successMessage');
            const classField = document.getElementById('class');
            const streamGroup = document.getElementById('streamGroup');
            
            // Initialize stream field visibility
            updateStreamVisibility();
            
            // Update stream field visibility when class changes
            classField.addEventListener('change', updateStreamVisibility);
            
            function updateStreamVisibility() {
                const selectedClass = classField.value;
                const numericClass = parseInt(selectedClass);
                
                if (!isNaN(numericClass) && numericClass >= 11) {
                    streamGroup.style.display = 'block';
                    document.getElementById('stream').required = true;
                } else {
                    streamGroup.style.display = 'none';
                    document.getElementById('stream').required = false;
                }
            }
            
          
        });
    </script>
</body>
</html>