<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ @url("assets/css/style.css") }}">
  <title>Pokedex</title>
</head>

<body>

  <section class="wrapper">

    <header>
      <h1>Pokédex</h1>
      <nav>
        <ul>
          <li><a href="{{ @route('home') }}">Liste</a></li>
          <li><a href="/types">Types</a></li>
        </ul>
      </nav>
    </header>

    <main>
