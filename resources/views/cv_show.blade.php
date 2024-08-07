<!DOCTYPE html>
<html>
<head>
    <title>CV</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .name-title {
            display: flex;
            align-items: center;
        }
        .name-title h1 {
            font-size: 2.5rem;
            margin-left: 15px;
        }
        .name-title p {
            font-size: 1.2rem;
            color: #6c757d;
            margin-left: 15px;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #212529;
        }
        .section-title {
            font-size: 1.5rem;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .education-item, .project-item {
            margin-bottom: 20px;
        }
        .education-item h3, .project-item h3 {
            font-size: 1.2rem;
        }
        .education-item p, .project-item p {
            color: #6c757d;
        }
        .date {
            font-size: 0.9rem;
            color: #adb5bd;
        }
        .skills ul, .co-curricular ul {
            list-style: none;
            padding: 0;
        }
        .skills ul li, .co-curricular ul li {
            margin-bottom: 10px;
        }
        .back-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <a href="{{ route('cv.list') }}" class="btn btn-light back-btn">Back to CV List</a>
    <div class="container">
        <div class="left-section">
            <header class="name-title">
                <img src="{{ asset('images/' . $cv->profile_image) }}" alt="Profile Image" class="profile-img">
                <div>
                    <h1>{{ $cv->name }}</h1>
                    <p>{{ $cv->title }}</p>
                </div>
            </header>
            <section class="category">
                <h2 class="section-title">Department</h2>
                <p>{{ $cv->category }}</p>
            </section>
            <section class="profile">
                <h2 class="section-title">Profile</h2>
                <p>{{ $cv->profile }}</p>
            </section>
            <section class="projects">
                <h2 class="section-title">Projects</h2>
                <div class="project-item">
                    {!! nl2br(e($cv->projects)) !!}
                </div>
            </section>
            <section class="education">
                <h2 class="section-title">Education</h2>
                <div class="education-item">
                    {!! nl2br(e($cv->education)) !!}
                </div>
            </section>
            

        </div>
        <div class="right-section">
            <section class="skills">
                <h2 class="section-title">Skills</h2>
                <ul>
                    {!! nl2br(e($cv->skills)) !!}
                </ul>
            </section>
            <section class="co-curricular">
                <h2 class="section-title">Co-Curricular Activities</h2>
                <ul>
                    {!! nl2br(e($cv->co_curricular)) !!}
                </ul>
            </section>
            <section class="contact">
                <h2 class="section-title">Contact</h2>
                <p><a href="mailto:{{ $cv->email }}" class="btn-link"><i class="fas fa-envelope"></i> Email</a></p>
                <p><a href="{{ $cv->linkedin }}" target="_blank" class="btn-link"><i class="fab fa-linkedin"></i> LinkedIn</a></p>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
