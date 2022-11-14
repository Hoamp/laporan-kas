$(function(){

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Murid');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#nama').val('');
        $('#nisn').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');

    });


    $('.tampilModalUbah').on('click', function(){
        $('#formModalLabel').html('Ubah Data Murid');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.ss form').attr('action', 'http://localhost/phpmvc/public/murid/ubah');

        const id = $(this).data('id');
        
        // menjalankan ajax
        $.ajax({
            url: 'http://localhost/phpmvc/public/murid/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nisn').val(data.nisn);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });


    });

})