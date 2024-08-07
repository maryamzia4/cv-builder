<html>
<head>
    <title>CV Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h2 class="section-title">Profile</h2>
            <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="profileImage">Profile Image</label>
                    <input type="file" class="form-control" id="profileImage" name="profile_image">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category">
        <option value="IT">IT</option>
        <option value="Sales & Marketing">Sales & Marketing</option>
        <option value="Finance">Finance</option>
    </select>
</div>

                <div class="form-group">
                    <label for="profile">Profile Description</label>
                    <textarea class="form-control" id="profile" name="profile" rows="3" placeholder="Enter Profile Description" required></textarea>
                </div>
                <h2 class="section-title">Projects</h2>
                <div class="form-group">
                    <label for="projects">Projects</label>
                    <textarea class="form-control" id="projects" name="projects" rows="3" placeholder="Enter Projects" required></textarea>
                </div>
                <h2 class="section-title">Education</h2>
                <div class="form-group">
                    <label for="education">Education</label>
                    <textarea class="form-control" id="education" name="education" rows="3" placeholder="Enter Education" required></textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
                </div>
        </div>
        <div class="right-section">
            <h2 class="section-title">Skills</h2>
            <div class="form-group">
                <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="Enter Skills" required></textarea>
            </div>
            <h2 class="section-title">Co-Curricular Activities</h2>
            <div class="form-group">
                <textarea class="form-control" id="co_curricular" name="co_curricular" rows="3" placeholder="Enter Co-Curricular Activities" required></textarea>
            </div>
            <h2 class="section-title">Contact</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn URL</label>
                <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="Enter LinkedIn URL" required>
            </div>
            <button type="submit" class="btn-submit mt-4">Submit</button>
        </div>
        </form>
    </div>
</body>
</html>
