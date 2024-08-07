<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        .photo {
            width: 100px;
            height: 100px;
            background-color: #bbb;
            border-radius: 50%;
            margin-right: 20px;
        }

        .name-title {
            flex-grow: 1;
        }

        .name-title h1 {
            margin: 0;
        }

        .name-title p {
            margin: 5px 0;
        }

        .main {
            display: flex;
            padding: 20px;
        }

        .left-column {
            width: 30%;
            padding-right: 20px;
        }

        .right-column {
            width: 70%;
        }

        .divider {
            width: 2px;
            background-color: #333;
            margin: 0 20px;
        }

        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        p {
            margin: 10px 0;
        }

        .profile, .projects, .education, .skills, .co-curricular, .contact {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <a href="{{ route('cv.list') }}" class="btn btn-light back-btn">Back to CV List</a>
    <div class="container">
        <div class="header">
            <div class="photo" style="background-image: url('{{ asset('images/' . $cv->profile_image) }}'); background-size: cover;"></div>
            <div class="name-title">
                <h1>{{ $cv->name }}</h1>
                <p>{{ $cv->title }}</p>
                <p>{{ $cv->category }}</p>
            </div>
        </div>
        <div class="main">
            <div class="left-column">
                <div class="profile">
                    <h2>Profile</h2>
                    <p>{{ $cv->profile }}</p>
                </div>
                <div class="contact">
                    <h2>Contact</h2>
                    <p>{{ $cv->phone }}</p>
                    <p><a href="{{ $cv->email }}" target="_blank">Email</a></p>
                    <p><a href="{{ $cv->linkedin }}" target="_blank">LinkedIn</a></p>
                </div>
                <div class="skills">
                    <h2>Skills</h2>
                    {!! nl2br(e($cv->skills)) !!}
                </div>
                
            </div>
            <div class="divider"></div>
            <div class="right-column">
                <div class="projects">
                    <h2>Projects</h2>
                    {!! nl2br(e($cv->projects)) !!}
                </div>
                <div class="education">
                    <h2>Education</h2>
                    {!! nl2br(e($cv->education)) !!}
                </div>
                <div class="co-curricular">
                    <h2>Co-Curricular Activities</h2>
                    {!! nl2br(e($cv->co_curricular)) !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
