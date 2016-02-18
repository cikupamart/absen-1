function kosong(){
document.getElementById('noid').value = "";
document.getElementById('nama').value = "";
document.getElementById('tpt_lahir').value = "";
document.getElementById('tgl_lahir').value = "";
document.getElementById('divisi').value = "";
document.getElementById('alamat').value = "";
document.getElementById('telp').value = "";
document.getElementById('foto_up').value = "";
document.getElementById('viewfot').src = "foto/no_foto.png";
document.getElementById('komen').value = "";
document.getElementById('ket').value = "";

}

function ganti(){
lokasi = document.getElementById('foto_up').value;
document.getElementById("msg2").innerHTML = "SETELAH SELESAI SEMUA TERISI, DAN ANDA YAKIN DENGAN DATA YANG ANDA MASUKAN, SILAHKAN TEKAN TOMBOL SIMPAN";

}

function playSound(soundfile) {
 document.getElementById("dummy").innerHTML="<embed src=\""+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
}

function inn_absen(){
		document.getElementById('finput').submit();

}




