$('#gantiPassword').on('show.bs.modal', function name(event) {
    let button = $(event.relatedTarget);
    let id = button.data('id');
    let modal = $(this);

    modal.find('.modal-body #id-user').val(id);
});