function GuadarEdit() {

     $.ajax({
       type: "POST",
       url: "../../modelo/matricula/edit.php",
       data: $("#formEdit").serialize(),
       success: function (response) {
         var jsonData = JSON.parse(response);
         if (jsonData.success == "1") {
           alert("La inscripción se ha realizado correctamente");
           $("#modalEdit").modal("hide");
           document.getElementById("formEdit").reset();
           $("#contenido_principal").load('curso/cursos.php');
         } else {
           alert("Error!: Usted ya esta inscrito en este curso.");
         }
       },
     });
   }
  
  function EditCurso(id) {
    
      $.ajax({
          type: "GET",
          url: "../../modelo/cursos/detalles.php",
          
          data: {idCurso : id},
          success: function (response) {
            var jsonData = JSON.parse(response);
            $("#idCursoEdit").val(jsonData[0].idCurso);
            $("#nombre_cursoEdit").val(jsonData[0].nombre_curso);
            $("#descripcionEdit").val(jsonData[0].descripcion);
            $("#duracionEdit").val(jsonData[0].duracion);

          }
        })         
        ;
  }
  