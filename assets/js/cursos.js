function agregarCurso() {

  var blobFile = document.getElementById("filechooser").files[0];
  $("#imagen").val(blobFile.name);
  var blobFileVideo = document.getElementById("filechooserVideo").files[0];
  $("#video").val(blobFileVideo.name);

  $.ajax({
    type: "POST",
    url: "../../modelo/cursos/add.php",
    data: $("#formCursos").serialize(),
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.success == "1") {
       alert("Se realizo el registro correctamente");
        $("#modalForm").modal("hide");
        document.getElementById("formCursos").reset();
        $("#contenido_principal").load('admin/listar_cursos.php');
//location.reload();
      } else {
        alert("Error debe completar todos los campos");
      }
    },
  });
  uploadFile();
  uploadFileVideo();
}

async function uploadFile() {
  let formData = new FormData(); 
  formData.append("file", filechooser.files[0]);
  await fetch('../../modelo/cursos/upload.php', {
    method: "POST", 
    body: formData
  }); 
}

async function uploadFileVideo() {
  let formData = new FormData(); 
  formData.append("file", filechooserVideo.files[0]);
  await fetch('../../modelo/cursos/upload.php', {
    method: "POST", 
    body: formData
  }); 
}


  function mostrarDetalles(id) {
     $.ajax({
         type: "GET",
         url: "../../modelo/cursos/detalles.php",
         data: {idCurso : id},
         success: function (response) {
           var jsonData = JSON.parse(response);
           $("#nombre_cursoDetalle").val(jsonData[0].nombre_curso);
           $("#descripcionDetalle").val(jsonData[0].descripcion);
           $("#duracionDetalle").val(jsonData[0].duracion);
           $("#imagenDetalle").attr("src","../../assets/img/"+jsonData[0].imagen);
           
         }
       })         
       ;
  }
  
  
  function GuadarEdit() {
    var blobFile = document.getElementById("filechooserEdit").files[0];

    $("#imagenEdit").val(blobFile.name);

    var blobFileVideoEdit = document.getElementById("filechooserVideoEdit").files[0];
    $("#videoEdit").val(blobFileVideoEdit.name);
    
     $.ajax({
       type: "POST",
       url: "../../modelo/cursos/edit.php",
       data: $("#formEdit").serialize(),
       success: function (response) {
         var jsonData = JSON.parse(response);
         if (jsonData.success == "1") {
           alert("El registro fue actualizado");
           $("#modalEdit").modal("hide");
           document.getElementById("formEdit").reset();
           $("#contenido_principal").load('admin/listar_cursos.php');
         } else {
           alert("Error debe completar todos los campos");
         }
       },
     });
     uploadFileEdit();
     uploadFileVideoEdit();
   }
  

   async function uploadFileEdit() {
    let formData = new FormData(); 
    formData.append("file", filechooserEdit.files[0]);
    await fetch('../../modelo/cursos/upload.php', {
      method: "POST", 
      body: formData
    }); 
  }
  
  async function uploadFileVideoEdit() {
    let formData = new FormData(); 
    formData.append("file", filechooserVideoEdit.files[0]);
    await fetch('../../modelo/cursos/upload.php', {
      method: "POST", 
      body: formData
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
            $("#imagenEdit").val(jsonData[0].imagen);
            $("#videoEdit").val(jsonData[0].video);
          }
        })         
        ;
  }
  
  
  function borrarCurso(id) {
     if (confirm('¿Esta seguro que desea borrar el registro?')) {
        $.ajax({
           type: "POST",
           url: "../../modelo/cursos/borrar.php",
           data: {idCurso : id},
           success: function (response) {
             var jsonData = JSON.parse(response);
             if (jsonData.success == "1") {
              $("#contenido_principal").load('admin/listar_cursos.php');
             } else {
               alert("Error el registro no pudo ser eliminado");
             }
           },
         });
      }   
  }
  
  
  