$(document).ready(function () {

    $(".remover-producto").click(function () {
        var id = $(this).data("producto");
        var result = confirm("Desea eliminar el producto?");
        if (result) {
            eliminar(id);
        }
    });

});

function eliminar(id) {

    $.ajax({
        method: "GET",
        url: "/mvc/index.php/producto/eliminar?id=" + id
    })
    .done(function (datos) {
        datos = JSON.parse(datos);

        if (datos.ok) {
            alert(datos.ok);
            $("#producto_" + id).remove();
        } else {
            alert("Error: " + datos.error);
        }
    })
    .fail(function () {
        alert('Error inesperado!');
    });
}
