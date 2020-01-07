<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- FONT: LATO -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

  <!-- FONT: FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

  <!-- JS: JQUERY -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- JS: MOMENT -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/it.js"></script>

  <!-- JS: CHART-JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>

  <!-- JS: HANDLEBARS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.0/handlebars.min.js" charset="utf-8"></script>

  <!-- TEMPLATE: HANDLEBARS -->
  <script id="box-template" type="text/x-handlebars-template">
    <div class="box">
      <ul>
        <li>{{ title }}: {{ description }}</li>
      </ul>
    </div>
  </script>

  <!-- CSS: MY STYLE -->
  <link rel="stylesheet" href="style.css">

  <!-- JS: MY SCRIPT -->
  <script src="script.js" charset="utf-8"></script>

  <title>PHP CRUD</title>
</head>

<body>

  <form id="myForm">
    <label for="title">Titolo: </label>
    <input type="text" name="title" value="nuovo titolo"><br>
    <label for="description">Descrizione: </label>
    <input type="text" name="description" value="nuova descrizione"><br>
    <input type="submit" name="submit" value="nuova configurzione">
  </form>

  <div id="container"></div>

</body>

</html>