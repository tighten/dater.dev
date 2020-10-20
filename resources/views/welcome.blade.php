<html>
  <head>
    <title>dater.dev | A PHP date generator</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
    <link href="/css/main.css" media="all" rel="stylesheet" type="text/css">
    <script src="/js/main.js"></script>
    <script src="https://cdn.usefathom.com/script.js" site="XVJZKHLS" defer></script>
  </head>
  <body>
    <header>
      <h1>dater.dev</h1>
      <h2>
        A PHP
        <a href="https://www.php.net/manual/en/function.date.php">date</a>
        generator
      </h2>
    </header>

    <main>
      <input type="text" id="query" placeholder="e.g. 20 Oct 2020, 04:51"
        value="" autocomplete="off" autofocus />

      <div id="output" class="output">
        <span id="instructions">
          Enter a date in the format you need
        </span>

        <span id="strftime">
          $date = new DateTime('<span id="date"></span>');<br>
          echo $date->format("<strong id="directives"></strong>");
        </span>

        <p id="help">
        </p>
      </div>
    </main>

    <footer>
      <a href="https://github.com/tighten/dater.dev">GitHub</a>
      ·
      <a href="https://tighten.co">tighten.co</a>
    </footer>
  </body>
</html>
