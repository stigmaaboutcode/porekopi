$(document).ready(function() {
    if($('#provinsi').val() != ""){
        $.ajax({
            type:'post',
            url:'apiviews/api_kab_kota.php?prov_id='+$('#provinsi').val(),
            success:function(hasil_kab){
                $("#kab_data").html(hasil_kab);
            }
        })
    }

    if($('#kab').val() != ""){
        var prov = $("#provinsi").val();
        $.ajax({
            type:'post',
            url:'apiviews/api_kec.php?kab_id='+$('#kab').val()+'&prov_id='+prov,
            success:function(hasil_kec){
                $("#kec_data").html(hasil_kec);
            }
        })
    }
});

function viewKab(str) {
    $.ajax({
        type:'post',
        url:'apiviews/api_kab_kota.php?prov_id='+str,
        success:function(hasil_kab){
            $("#kab_data").html(hasil_kab);
        }
    })
    if($('#kab').val() != ""){
        $.ajax({
            type:'post',
            url:'apiviews/api_kec.php?kab_id='+$('#kab').val()+'&prov_id='+str,
            success:function(hasil_kec){
                $("#kec_data").html(hasil_kec);
            }
        })
    }
}
function viewKec(str) {
    var prov = $("#provinsi").val();
    $.ajax({
        type:'post',
        url:'apiviews/api_kec.php?kab_id='+str+'&prov_id='+prov,
        success:function(hasil_kec){
            $("#kec_data").html(hasil_kec);
        }
    })
}