// For Add -> wait for change of value selected
$('#inputAlamatKota').on('change', function (e) {
    // console.log(e);
    var kota_id = e.target.value;
    console.log(kota_id);
    $.get(window.location.href + '/districts?city_id=' + kota_id, function (data) {
        console.log(data);
        $('#inputAlamatkecamatan').empty();
        $('#inputAlamatkecamatan').append('<option value="0" disable="true" selected="true">Pilih Kecamatan</option>');

        $('#inputAlamatDesa').empty();
        $('#inputAlamatDesa').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

        $.each(data, function (index, districtsObj) {
            $('#inputAlamatKecamatan').append('<option value="' + districtsObj.id + '">' + districtsObj.name + '</option>');
        })
    });
});

$('#inputAlamatKecamatan').on('change', function (e) {
    console.log(e);
    var distrik_id = e.target.value;
    console.log(distrik_id);
    $.get(window.location.href + '/villages?district_id=' + distrik_id, function (data) {
        console.log(data);
        $('#inputAlamatDesa').empty();
        $('#inputAlamatDesa').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

        $.each(data, function (index, villagesObj) {
            $('#inputAlamatDesa').append('<option value="' + villagesObj.id + '">' + villagesObj.name + '</option>');
            console.log("|" + villagesObj.id + "|" + villagesObj.district_id + "|" + villagesObj.name);
        })
    });
});

// For Update -> doesn't need to wait user select the option, bcz its compare by 'alamat'
$(document).ready(function() {
    var kota_id = $('#editAlamatKota').val();
    var distrik_id = $('#distrik_id').val();
    var desa_id = $('#desa_id').val();
    // console.log(kota_id, distrik_id, desa_id);
    
    $.get(window.location.href + '/districts?city_id=' + kota_id, function (data) {
        // console.log(data);
        $('#editAlamatkecamatan').empty();
        $('#inputAlamatkecamatan').append('<option value="0" disable="true" selected="true">Pilih Kecamatan</option>');

        $('#editAlamatDesa').empty();
        $('#editAlamatDesa').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

        $.each(data, function (index, districtsObj) {
            var selected = districtsObj.id == distrik_id ? 'selected' : '';
            $('#editAlamatKecamatan').append('<option value="' + districtsObj.id + '" ' + selected + '>' + districtsObj.name + '</option>');
        });
    });
    
    $.get(window.location.href + '/villages?district_id=' + distrik_id, function (data) {
        // console.log(data);

        $('#editAlamatDesa').empty();
        $('#editAlamatDesa').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

        $.each(data, function (index, villagesObj) {
            var selected = villagesObj.id == desa_id ? 'selected' : '';
            $('#editAlamatDesa').append('<option value="' + villagesObj.id + '" ' + selected + '>' + villagesObj.name + '</option>');
        });
    });
});
