function recogerDataFormEdit(id="") {
    
    if (id != "") {
        var parametro = {
            "id":id
        };
        $.ajax({
            data: parametro,
            type: "POST",
            dataType: 'json',
            url: '../controlador/ajax.php',
            success: function(response)
            {   
                $("#modalEditId").val(response.id);
                $("#modalEditNombre").val(response.nombre);
                $("#modalEditApellidos").val(response.apellidos);
                $("#modalEditDescripcion").val(response.descripcion);
                $("#modalEditTelefonoPrincipal").val(response.telefono_principal);
                $("#modalEditTelefonoSecundario").val(response.telefono_secundario);
                $("#modalEditCorreo").val(response.correo_principal);
                console.log(response.id);
                array_values= response.id;
                //console.log("Estos son "+jsonData);
                /*response.forEach(function(elemento, indice, array) {
                    console.log(elemento, indice);
                })*/
 
                // user is logged in successfully in the back-end
                // let's redirect
                /*if (jsonData.success == "1")
                {
                    location.href = 'my_profile.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }*/
           }
       });
    }
}

/*(function() {
        var form = document.getElementById('eliminarContacto');
        console.log(form)

        
        form.addEventListener('submit', function(event) {
        // si es false entonces que no haga el submit
       
        }, false);
  })();*/
$(document).ready(function() {

    $('.toast').toast('show');

    $( ".btEliminarContacto" ).on( "click", function() {
        if (!confirm('Vas a eliminar este elemento, estas seguro de ello?')) {
            event.preventDefault();
        }
    });

    $("#Buscador").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tablaContactos tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
})