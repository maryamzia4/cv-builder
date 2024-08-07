<!DOCTYPE html>
<html>
<head>
    <title>Edit CV</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h2 class="section-title">Profile</h2>
            <form action="{{ route('cv.update', $cv->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="profileImage">Profile Image</label>
                    <input type="file" class="form-control" id="profileImage" name="profile_image">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cv->name }}" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $cv->title }}" placeholder="Enter Title" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="IT" {{ $cv->category === 'IT' ? 'selected' : '' }}>IT</option>
                        <option value="Sales & Marketing" {{ $cv->category === 'Sales & Marketing' ? 'selected' : '' }}>Sales & Marketing</option>
                        <option value="Finance" {{ $cv->category === 'Finance' ? 'selected' : '' }}>Finance</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="profile">Profile Description</label>
                    <textarea class="form-control" id="profile" name="profile" rows="3" placeholder="Enter Profile Description" required>{{ $cv->profile }}</textarea>
                </div>
                <h2 class="section-title">Projects</h2>
                <div class="form-group">
                    <textarea class="form-control" id="projects" name="projects" rows="3" placeholder="Enter Projects" required>{{ $cv->projects }}</textarea>
                </div>
                <h2 class="section-title">Education</h2>
                <div class="form-group">
                    <textarea class="form-control" id="education" name="education" rows="3" placeholder="Enter Education" required>{{ $cv->education }}</textarea>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $cv->phone }}" placeholder="Enter Phone Number" required>
                </div>
        </div>
        <div class="right-section">
            <h2 class="section-title">Skills</h2>
            <div class="form-group">
                <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="Enter Skills" required>{{ $cv->skills }}</textarea>
            </div>
            <h2 class="section-title">Co-Curricular Activities</h2>
            <div class="form-group">
                <textarea class="form-control" id="co_curricular" name="co_curricular" rows="3" placeholder="Enter Co-Curricular Activities" required>{{ $cv->co_curricular }}</textarea>
            </div>
            <h2 class="section-title">Contact</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $cv->email }}" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn URL</label>
                <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ $cv->linkedin }}" placeholder="Enter LinkedIn URL" required>
            </div>
            <button type="submit" class="btn-submit mt-4">Save Changes</button>
        </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
