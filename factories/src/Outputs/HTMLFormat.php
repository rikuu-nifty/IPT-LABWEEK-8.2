<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $htmlHeader = $this->generateHeader($profile->getName());
        $htmlBody = $this->generateBody($profile);
        $htmlFooter = $this->generateFooter();

        $this->response = $htmlHeader . $htmlBody . $htmlFooter;
    }

    private function generateHeader($name)
    {
        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of Dr. {$name}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LtrjvnR4/JxJyX+od3Cdf2tXtHATxGYYpHlTq62Iwt4FRb60/Xg5TnNzpDI5I3eJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZvBnlWvQ7F+7ViZxH/4LnA9KZr+ZgHfHq6U1iXQX4gq8n/tP2wOqu6Q8Z/TBqA" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9ecef; 
            font-family: 'Poppins', sans-serif;
        }
        .profile-card {
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
            transition: transform 0.2s;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; 
            border-radius: 8px; 
        }
        .profile-card:hover {
            transform: scale(1.02);
        }
        .profile-img {
            max-width: 200px;
        }
        .card {
            border: none;
        }
        .card-title {
            font-weight: 600;
            color: #343a40;
        }
        .card-text {
            font-size: 1.1rem;
            color: #6c757d;
            text-align: justify; 
        }
        .img-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .card-body {
            padding: 2rem;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 25px; 
            padding: 10px 20px; 
            transition: background-color 0.3s, transform 0.2s; 
        }
        .btn-custom:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .btn-custom i {
            margin-right: 5px; 
        }
    </style>
</head>
HTML;
    }

    private function generateBody($profile)
    {
        return <<<HTML
<body>
    <div class="container">
        <div class="profile-card">
            <div class="text-center">
                <h1>Profile of Dr. {$profile->getName()}</h1>
            </div>
            <div class="card">
                <div class="img-wrapper">
                    <img src="https://www.auf.edu.ph/home/images/articles/bya.jpg" alt="Profile Image" class="img-fluid rounded-circle profile-img">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">About</h5>
                    <p class="card-text text-center">{$profile->getStory()}</p>
                    <div class="text-center">
                        <a href="mailto:contact@example.com" class="btn btn-custom mx-2">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                        <a href="https://linkedin.com/in/example" class="btn btn-custom mx-2">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
HTML;
    }

    private function generateFooter()
    {
        return <<<HTML
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgJFPTt1e0jtGkWap56jfs5j5pvI5iwDh2LDDp9Kakz0TOB6wJ6" crossorigin="anonymous"></script>
</body>
</html>
HTML;
    }

    public function render()
    {
        header('Content-Type: text/html');
        return $this->response;
    }
}
