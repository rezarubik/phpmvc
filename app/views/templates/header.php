<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?php echo $data['title']; ?></title>
    <!-- data title ngambi dari controller  -->
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo "BASEURL"; ?>">PHP MVC</a>
            <button class="navbar-toggler" type="button" name="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?php echo BASEURL; ?>">Home <span class="sr-only">(currnent)</span></a>
                    <a class="nav-item nav-link" href="<?php echo BASEURL; ?>/about">About</a>
                    <a class="nav-item nav-link" href="<?php echo BASEURL; ?>/mahasiswa">Mahasiswa</a>
                </div>
            </div>
        </div>
    </nav> 