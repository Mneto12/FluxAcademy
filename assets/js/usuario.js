async function uploadFile() {
    let formData = new FormData(); 
    formData.append("file", filechooser.files[0]);
    await fetch('../../modelo/usuarios/upload.php', {
      method: "POST", 
      body: formData
    }); 
}

function mostrarDetalles(id) {
       $.ajax({
           type: "GET",
           url: "../../modelo/usuarios/detalles.php",
           data: {idUsuario : id},
           success: function (response) {
             var jsonData = JSON.parse(response);
             console.log(jsonData)
             $("#cedulaDetalle").val(jsonData[0].cedula);
             $("#nombreDetalle").val(jsonData[0].nombre);
             $("#apellidoDetalle").val(jsonData[0].apellido);
             $("#generoDetalle").val(jsonData[0].genero);
             $("#fecha_nacimientoDetalle").val(jsonData[0].fecha_nacimiento);
             $("#nombre_usuarioDetalle").val(jsonData[0].nombre_usuario);
             $("#correoDetalle").val(jsonData[0].correo);
             $("#contrasenaDetalle").val(jsonData[0].contrasena);
             $("#preguntaDetalle").val(jsonData[0].pregunta);
             $("#respuestaDetalle").val(jsonData[0].respuesta);
             $("#imagenDetalle").attr("src","../../assets/img/"+jsonData[0].imagen);
           }
         })         
         ;
}

async function uploadFileEdit() {
      let formData = new FormData(); 
      formData.append("file", filechooserEdit.files[0]);
      await fetch('../../modelo/usuarios/upload.php', {
        method: "POST", 
        body: formData
      }); 
}
    
function GuadarEdit() {
      var blobFile = document.getElementById("filechooserEdit").files[0];
      $("#imagenEdit").val(blobFile.name);
            
      $.ajax({
        type: "POST",
        url: "../../modelo/usuarios/edit.php",
        data: $("#formEdit").serialize(),
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.success == "1") {
            alert("El registro fue actualizado");
            $("#modalEdit").modal("hide");
            document.getElementById("formEdit").reset();
            $("#contenido_principal").load('admin/listar_usuarios.php');
          } else {
            alert("Error debe completar todos los campos");
          }
        },
      });
  uploadFileEdit();
}
    
function EditUsuario(id) {
      
        $.ajax({
            type: "GET",
            url: "../../modelo/usuarios/detalles.php",
            
            data: {idUsuario : id},
            success: function (response) {
              var jsonData = JSON.parse(response);
             $("#idUsuarioEdit").val(jsonData[0].idUsuario);
             $("#cedulaEdit").val(jsonData[0].cedula);
             $("#nombreEdit").val(jsonData[0].nombre);
             $("#apellidoEdit").val(jsonData[0].apellido);
             $("#generoEdit").val(jsonData[0].genero);
             $("#fecha_nacimientoEdit").val(jsonData[0].fecha_nacimiento);
             $("#nombre_usuarioEdit").val(jsonData[0].nombre_usuario);
             $("#correoEdit").val(jsonData[0].correo);
             $("#contrasenaEdit").val(jsonData[0].contrasena);
             $("#imagenEdit").val(jsonData[0].imagen);
             $("#preguntaEdit").val(jsonData[0].pregunta);
             $("#respuestaEdit").val(jsonData[0].respuesta);

            }
          })         
          ;
}
    
function borrarUsuario(id) {
       if (confirm('¿Esta seguro que desea borrar el registro?')) {
          $.ajax({
             type: "POST",
             url: "../../modelo/usuarios/borrar.php",
             data: {idUsuario : id},
             success: function (response) {
               var jsonData = JSON.parse(response);
               if (jsonData.success == "1") {
                $("#contenido_principal").load('admin/listar_usuarios.php');
               } else {
                 alert("Error el registro no pudo ser eliminado");
               }
             },
           });
        }   
}