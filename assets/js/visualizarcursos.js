function GuadarEdit() {

     $.ajax({
       type: "POST",
       url: "../../modelo/matricula/edit.php",
       data: $("#formEdit").serialize(),
       success: function (response) {
         var jsonData = JSON.parse(response);
         if (jsonData.success == "1") {
           alert("El registro fue actualizado");
           $("#modalEdit").modal("hide");
           document.getElementById("formEdit").reset();
           $("#contenido_principal").load('curso/cursousuario.php');
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
            $("#titulo").text((jsonData[0].nombre_curso));
            $("#video").attr("src","../../assets/img/"+jsonData[0].video);
          }
        })         
        ;
  }

  function cerrarVideo(id) {
     $("#video").attr("src","../../assets/img/"+"");
     $("#modalEdit").modal("close");
     document.getElementById("formEdit").reset();
     $("#contenido_principal").load('curso/cursosusuario.php');
  }

  