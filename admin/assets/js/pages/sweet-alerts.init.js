var flash = $('#flash').data('flash');
if(flash == "success"){
    Swal.fire({
        title: 'Berhasil!',
        text: 'Data berhasil disimpan',
        icon: 'success',
        confirmButtonText: 'Oke'
    })
}

$(document).on('click', '#delete', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    Swal.fire({
        title: 'Hapus Data!',
        text: 'Apakah Anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00a65a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if(result.isConfirmed){
            window.location = link;
        }
    });

});