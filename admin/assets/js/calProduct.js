// $(document).ready(function() {
// });

function calWithStock(jumlahStock){
    var hargaPokok = document.getElementById("hpp").value; // mengambil nilai input hpp
    var hargaJual = document.getElementById("hj").value; // mengambil niali input hj

    // jika kosong maka digantikan dengan angka nol
    if(hargaPokok.length == 0 ){
        hargaPokok = 0;
    }
    
    // jika kosong maka digantikan dengan angka nol
    if(hargaJual.length == 0){
        hargaJual = 0;
    }

    var calHargaPokok = hargaPokok * jumlahStock; // kalkulasi harga pokok
    var calHargaJual = hargaJual * jumlahStock; // kalkulasi harga jual
    var calProfit = calHargaJual - calHargaPokok; // kalkulasi profit penjualan

    document.getElementById("khpp").value = formatRupiah(calHargaPokok);
    document.getElementById("khj").value = formatRupiah(calHargaJual);
    document.getElementById("kk").value = formatRupiah(calProfit);
}
function calWithHpp(hargaPokok){
    var jumlahStock = document.getElementById("jumlahStok").value; // mengambil nilai input stok
    var hargaJual = document.getElementById("hj").value; // mengambil niali input hj

    // jika kosong maka digantikan dengan angka nol
    if(jumlahStock.length == 0 ){
        jumlahStock = 0;
    }
    
    // jika kosong maka digantikan dengan angka nol
    if(hargaJual.length == 0){
        hargaJual = 0;
    }

    var calHargaPokok = hargaPokok * jumlahStock; // kalkulasi harga pokok
    var calHargaJual = hargaJual * jumlahStock; // kalkulasi harga jual
    var calProfit = calHargaJual - calHargaPokok; // kalkulasi profit penjualan

    document.getElementById("khpp").value = formatRupiah(calHargaPokok);
    document.getElementById("khj").value = formatRupiah(calHargaJual);
    document.getElementById("kk").value = formatRupiah(calProfit);
}
function calWithHj(hargaJual){
    var jumlahStock = document.getElementById("jumlahStok").value; // mengambil nilai input stok
    var hargaPokok = document.getElementById("hpp").value; // mengambil niali input hj

    // jika kosong maka digantikan dengan angka nol
    if(jumlahStock.length == 0 ){
        jumlahStock = 0;
    }
    
    // jika kosong maka digantikan dengan angka nol
    if(hargaPokok.length == 0){
        hargaPokok = 0;
    }

    var calHargaPokok = hargaPokok * jumlahStock; // kalkulasi harga pokok
    var calHargaJual = hargaJual * jumlahStock; // kalkulasi harga jual
    var calProfit = calHargaJual - calHargaPokok; // kalkulasi profit penjualan

    document.getElementById("khpp").value = formatRupiah(calHargaPokok);
    document.getElementById("khj").value = formatRupiah(calHargaJual);
    document.getElementById("kk").value = formatRupiah(calProfit);
}

/* Fungsi formatRupiah */
function formatRupiah(angka){
    var number_string = angka.toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? ',' : '';
        rupiah += separator + ribuan.join(',');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah + ".00";
}