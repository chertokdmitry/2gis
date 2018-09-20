<?php

return '
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>2 gis</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">2 gis справочник</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item"></li>
    </ul>
  </div>
</nav><br>
  <div class="container">
  <div>
<h3>Бизнес-центры по геолокации</h3>
<ul>
<li><a href="location/building/52.5200_13.4050">Germany</a></li>
<li><a href="location/building/55.7558_37.6173">Russia</a></li>
<li><a href="location/building/51.5074_0.1278">Great Britain</a></li>
</ul>

<h3>Фирмы по геолокации</h3>
<ul>
<li><a href="location/firm/52.5200_13.4050">Germany</a></li>
<li><a href="location/firm/55.7558_37.6173">Russia</a></li>
<li><a href="location/firm/51.5074_0.1278">Great Britain</a></li>
</ul>

<h3>Информация о бизнес-центрах</h3>
<ul>
<li><a href="v1/building">Список всех зданий</a></li>
<li><a href="v1/building/1">Здание с id=1</a></li>
<li><a href="v1/building/1?expand=firm">Все фирмы в здании 1</a></li>   
</ul>

<h3>Информация о фирмах</h3>
<ul>
<li><a href="v1/firm">Список всех фирм</a></li>
<li><a href="v1/firm/1">Фирма с id=1 </a></li>
</ul>

<h3>Информация о категориях</h3>
<ul>
<li><a href="v1/category">Список всех категорий</a></li>
<li><a href="v1/category/1">Категория с id=1 </a></li>
<li><a href="v1/category/1?expand=firm"> Фирмы categories = 1</a></li>
</ul>

<h3>Поиск</h3>
<ul>
<li>Поиск организации по названию

<form action="search/firm" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="search_firm" placeholder="Enter Rus">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br><br>
</li>
<li>Поиск организаций по категории

<form action="search/category" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="search_category" placeholder="Enter финансы">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form></li>

</ul>

</div>
';


