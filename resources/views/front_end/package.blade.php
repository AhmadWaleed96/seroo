<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/cms/css/main.css') }}">
    <title>SERO</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{ asset('public/cms/js/main.js') }}"></script>

</head>
<body style="background-color: #494a55;">

    <div class="background-image">
        <img src="{{ asset('storage/images/package/'.$packages->image) }}">
        <div class="bi-cover"></div>
        <a href="" class="package-close">X</a>
        <div class="package-price">$ {{ $packages->price }}</div>
        <div class="package-bottom">
            <div class="bi-desc">{{ $packages->entertainment }}</div>
            <div class="pdt-parent">
                <div class="package-duration">5 days</div>
                <div class="start-package-date">05 Octoper 2022</div>
            </div>
        </div>
    </div>

    <div class="package-content">

        <div class="package-content-text">
            <div class="package-name">{{ $packages->name }}</div>

            <div class="package-info">
                <span>Boulevard Riyadh City is one of the biggest zones in the season. Triple in size this year, each of the sub-areas features its own set of activities, restaurants, events, and outlets that are catered to all visitor.</span>
                <span>It is the largest city on the Arabian Peninsula, and receives around 5 million tourists each year, making it the 49th most visited city in the world and the 6th in the Middle East. Riyadh had a population of 7.6 million people in 2019, making it the most-populous city in Saudi Arabia, 3rd most populous in the Middle East, and 38th most populous in Asia .</span>
            </div>
        </div>

        <div class="ticket-btn-parent">
            <div class="buy-ticket-btn">Buy Tickets</div>
        </div>

    </div>
</body>
</html>
