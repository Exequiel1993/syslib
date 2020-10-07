$(function () {
    // open delete confirmation model
    $(document).on('click', '.delete-btn', function (event) {
        let articuloId = $(event.currentTarget).data('id');
        deleteItem(articuloUrl + articuloId, 'Articulo');
    });
});