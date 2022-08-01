<?php session_start(); ?>
<html>

<head>
  <title>Generar Certificado</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">



      <center>
        <h1>GENERAR CERTIFICADO</h1>
      </center>


      <form method="POST" action="certificado.php">
        <div class="form-group">
          <label for="ced">Cedula: <span class="required">*</span></label>
          <input type="text" id="ced" name="ced" pattern="[0-9]{8}" placeholder="Ingrese su cedula" required autofocus autocomplete='off' class="form-control" />
          <br>
          <label for="ced">Curso: <span class="required">*</span></label>
          <select name="" id="">
          <option value="value1">Value 1</option>
          <option value="value2" selected>Value 2</option>
          <option value="value3">Value 3</option>
          </select>
          <br>
          <center>
            <input type="submit" value="Enviar y Consultar" class="btn btn-success" name="btn1">
          </center>

      </form>
    </div>






  </div>
  <div class="col-md-4"></div>
  </div>





</body>

</html>