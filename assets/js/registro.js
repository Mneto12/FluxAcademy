function submitForm() {
  var blobFile = document.getElementById("filechooser").files[0];
  
  $("#imagen").val(blobFile.name);

    $.ajax({
      type: "POST",
      url: "../../modelo/usuarios/add.php",
      data: $("#formUsuario").serialize(),
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.success == "1") {
         alert("Se realizo el registro correctamente");
          document.getElementById("formUsuario").reset();
          location.href = "./login.php"
        } else {
          alert("Error debe completar todos los campos");
        }
      },
    });
    uploadFile();
  }

    
  async function uploadFile() {
    let formData = new FormData(); 
    formData.append("file", filechooser.files[0]);
    await fetch('../../modelo/usuarios/upload.php', {
      method: "POST", 
      body: formData
    }); 
  }
  