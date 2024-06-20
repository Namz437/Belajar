<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">​
    <title>Gambar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fafafa;
        }

        .header {
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 10px;
            justify-content: center;
        }

        .photo {
            width: calc(33.333% - 20px);
            margin: 10px;
            overflow: hidden;
            position: relative;
        }

        .photo img {
            width: 100%;
            height: auto;
            display: block;
        }

        .photo-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo:hover .photo-overlay {
            opacity: 1;
        }

        @media screen and (max-width: 768px) {
            .photo {
                width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 480px) {
            .photo {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">​
    <div class="container-fluid">​
      <div class="navbar-header">​
        <a class="navbar-brand" href="/">Pemrograman Web 2</a>​
      </div>​
      <ul class="nav navbar-nav">​
        <li><a href="/projects">Projects</a></li>​
        <li><a href="/about">About</a></li>​
        <li class="active"><a href="/gambar">Gambar</a></li>​
      </ul>​
    </div>​
  </nav>​
    <div class="header">
        <h1>Gambar Tentang Kami</h1>
    </div>

    <div class="container">
        <div class="photo">
            <img src="https://via.placeholder.com/300" alt="Photo 1">
            <div class="photo-overlay">Gambar 1</div>
        </div>
        <div class="photo">
            <img src="https://via.placeholder.com/300" alt="Photo 2">
            <div class="photo-overlay">Gambar 2</div>
        </div>
        <div class="photo">
            <img src="https://via.placeholder.com/300" alt="Photo 3">
            <div class="photo-overlay">Gambar 3</div>
        </div>
        <div class="photo">
            <img src="https://via.placeholder.com/300" alt="Photo 4">
            <div class="photo-overlay">Gambar 4</div>
        </div>
        <div class="photo">
            <img src="https://via.placeholder.com/300" alt="Photo 5">
            <div class="photo-overlay">Gambar 5</div>
        </div>
        <div class="photo">
            <img src="https://via.placeholder.com/300" alt="Photo 6">
            <div class="photo-overlay">Gambar 6</div>
        </div>
    </div>

</body>
</html>
