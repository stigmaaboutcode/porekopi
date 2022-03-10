var flash = $('#flash').data('flash');
if(flash == "success"){
    Swal.fire({
        title: 'Berhasil!',
        text: 'Data berhasil disimpan',
        icon: 'success',
        confirmButtonText: 'Oke'
    })
}