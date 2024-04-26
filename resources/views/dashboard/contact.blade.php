<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            padding-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            background-color: #fff;
        }

        .form-group label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        #map {
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
        }

        .contact-info {
            margin-bottom: 30px;
        }

        .contact-info h3 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .contact-info p {
            font-size: 16px;
            line-height: 1.6;
        }

        .contact-info img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Contact Us</h1>
        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" onclick="history.go(-1);" class="btn btn-secondary mb-3"><i
                class="fas fa-arrow-left"></i>
            Kembali</a>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hubungi Kami</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pertanyaan:</label>
                                <textarea class="form-control" id="message" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Kontak</h3>
                    </div>
                    <div class="card-body">
                        <div class="contact-info">
                            <h3>Alamat Kantor</h3>
                            <p>Jl. Siliwangi No.41, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212</p>
                        </div>
                        <div class="contact-info">
                            <h3>Foto Kantor</h3>
                            <img src="zie.jpg" alt="Kantor" class="img-fluid">
                        </div>
                        <div class="contact-info">
                            <h3>Lokasi Kantor</h3>
                            <div id="map">
                                <!-- Google Maps Embed -->
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5332104245817!2d107.13410530845104!3d-6.826481393142879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68525760aaa209%3A0x4a4020b1836d1a1d!2sSMK%20Negeri%201%20Cianjur!5e0!3m2!1sid!2sid!4v1713841522506!5m2!1sid!2sid"
                                    width="100%" height="250" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
