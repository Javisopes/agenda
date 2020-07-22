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
           }
       });
    }
}

$(document).ready(function() {


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