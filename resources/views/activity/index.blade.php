<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Our Activity</title>

    <style>

    body{
        font-family: Arial, sans-serif;
        background:#f5f6fa;
        margin:0;
        padding:40px;
    }

    h1{
        text-align:center;
        color:#003366;
    }

    .container{
        max-width:1200px;
        margin:auto;
    }

    .grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
        gap:25px;
    }

    .card{
        background:white;
        border-radius:10px;
        overflow:hidden;
        box-shadow:0 3px 10px rgba(0,0,0,.1);
    }

    .card img{
        width:100%;
        height:250px;
        object-fit:cover;
    }

    .card-body{
        padding:20px;
    }

    .tanggal{
        color:#777;
        font-size:14px;
    }

    </style>

</head>
<body>

<div class="container">

<h1>OUR ACTIVITY</h1>

<div class="grid">

@foreach($activities as $activity)

<div class="card">

<img src="{{ asset('assets/'.$activity->foto_kegiatan) }}">

<div class="card-body">

<h3>{{ $activity->nama_kegiatan }}</h3>

<p class="tanggal">
{{ $activity->tanggal_pelaksanaan }}
</p>

<p>
{{ $activity->deskripsi }}
</p>

</div>

</div>

@endforeach

</div>

</div>

</body>
</html>