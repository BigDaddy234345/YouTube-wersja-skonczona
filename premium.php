<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiał Premium</title>
     <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #0f0f0f;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
        }
        .video-container {
            max-width: 800px;
            width: 100%;
            aspect-ratio: 16 / 9; 
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<a href="index.php" class="logo" aria-label="Strona główna">
            <img src="images/img.jpg" alt="Logo" class="logo-dark">
            <span>Youtube</span>
            <span class="country-code">PL</span>
        </a>

    <h1>Ekskluzywny materiał Premium</h1>
    
    <div class="video-container">
        <iframe 
            src="https://www.youtube.com/embed/zUv0M-vV50s?si=6dmedZhTFiiBgCM_" 
            title="YouTube video player" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    </div>

</body>
</html>