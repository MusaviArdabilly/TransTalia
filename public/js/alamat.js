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