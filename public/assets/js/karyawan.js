$(document).on('click', '#edit-btn', function() {
    $('.modal-body #nomor-induk').val($(this).data('nik'));
    $('.modal-body #nama').val($(this).data('nama'));
    $('.modal-body #alamt').val($(this).data('alamat'));
    $('.modal-body #tgl-lahir').val($(this).data('lahir'));
    $('.modal-body #tgl-bergabung').val($(this).data('gabung'));
})

$(document).on('click', '#remove-btn', function() {
    $('.modal-body #nama-hapus').text($(this).data('nama'));
    $('#remove-yes').attr('href', 'karyawan/hapus/'+$(this).data('nik'));
})

$(document).on('click', '#cuti-btn', function() {
    $('.modal-body #nomor-induk').val($(this).data('nik'));
    $('.modal-body #nama').val($(this).data('nama'));
})
