// event pada saat link di tekan
$('.page-scroll').on('click', function(e){

    // ambil isi href
    var tujuan = $(this).attr('href');
    // tangkap elemen yang bersangkutan
    var elemenTujuan = $(tujuan);

    // pindahkan scroll
    $('body').animate({
    	scrollTop: elemenTujuan.offset().top - 50
    }, 1250, 'linear');

    e.preventDefault();

});