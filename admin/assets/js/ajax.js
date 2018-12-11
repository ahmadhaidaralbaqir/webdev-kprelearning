
// login
$("#login").on('submit',function(e){
    e.preventDefault();
    let username = $("#exampleInputUsername1").val();
    let password = $("#exampleInputPassword1").val();
    if(username ==""){
        swal("peringatan","username wajib di isi","error");
        return true;
    }
    if(password ==""){
        swal("peringatan","password wajib di isi","error");
        return true;
    }
    
    $.ajax({
        url : "module/authentication/proses_login.php",
        data: "username="+username+"&password="+password,
        type: "POST",
        dataType: "html",
        success:function(data){
            if(data == 1){
                window.location = "index.php"
            }else{
                swal('error',"username atau password salah");
            }
        }
    });
});
// data table
$(document).ready(function(){
    $('.dataTable').DataTable();
});
// pencarian data 

// tampil guru
function tampilGuru(){
    $.ajax({
        url : "module/guru/tampilGuruAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $('#tabelGuru').html(data);
        }
    });
}
// proses tambah guru
$("#tambahGuru").click(function(){
    let id_user = $("#example-text-input-id_user-guru").val();
    let nip = $("#example-text-input-nip").val();
    let nama = $("#example-name-input-nama").val();
    let username = $("#example-username-input-username").val();
    let password = $("#example-password-input-password").val();
    let telepon = $("#example-tlp-input-telepon").val();
    if(nip ==""){
        swal("peringatan","nip wajib di isi");
        return true;
    }
    if(nama ==""){
        swal("peringatan","nama wajib di isi");
        return true;
    }
    if(username ==""){
        swal("peringatan","username wajib di isi");
        return true;
    }
    if(password ==""){
        swal("peringatan","password wajib di isi");
        return true;
    }
    if(telepon ==""){
        swal("peringatan","telepon wajib di isi");
        return true;
    }
    $.ajax({
        url: "module/guru/tambahGuru.php",
        data: "id_user="+id_user+"&nip="+nip+"&nama="+nama+"&username="+username+"&password="+password+"&telepon="+telepon,
        type: "POST",
        dataType: "html",
        success:function(){
            swal('succes',"berhasil menambahkan data guru");
                tampilGuru();
        }
    }); 
});
// hapus guru
function hapusGuru(x){
    let id_user = x;
    $.ajax({
        url: "module/guru/hapusGuru.php",
        type: "POST",
        dataType: "html",
        data: "id_user="+id_user,
        success:function(){
            tampilGuru();
            swal("berhasil","data guru berhasil di hapus");
        }
    });
}

// tampil siswa
function tampilSiswa(){
    $.ajax({
        url : "module/siswa/tampilSiswaAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $('#tabelSiswa').html(data);
        }
    });
}
// tambah data siswa
$("#tambahSiswa").click(function(){
    let id_user = $("#example-text-input-id_user-siswa").val();
    let nisn = $("#example-text-input-nisn").val();
    let nama = $("#example-name-input-name").val();
    let username = $("#example-username-input-siswa").val();
    let password = $("#example-password-input-siswa").val();
    let kelas = $("#example-kls-input-kls").val();
    if(nisn ==""){
        swal("peringatan","nisn wajib di isi");
        return true;
    }
    if(nama ==""){
        swal("peringatan","nama wajib di isi");
        return true;
    }
    if(username ==""){
        swal("peringatan","username wajib di isi");
        return true;
    }
    if(password ==""){
        swal("peringatan","password wajib di isi");
        return true;
    }
    if(kelas == ""){
        swal("peringatan","kelas wajib di isi");
        return true;
    }
    $.ajax({
        url: "module/siswa/tambahSiswa.php",
        data: "id_user="+id_user+"&nisn="+nisn+"&nama="+nama+"&username="+username+"&password="+password+"&kelas="+kelas,
        type: "POST",
        dataType: "html",
        success:function(){
            tampilSiswa();
            swal('succes',"berhasil menambahkan data siswa");
        }
    });
});

// hapus siswa
function hapusSiswa(x){
    let id_user = x;
    $.ajax({
        url: "module/siswa/hapusSiswa.php",
        type: "POST",
        dataType: "html",
        data: "id_user="+id_user,
        success:function(){
            tampilSiswa();
            swal("berhasil","data siswa berhasil di hapus");
        }
    });
}
// tambah kelas 
$('#tambahKelas').click(function(){
    let nama_kelas = $("#example-name-input-kelas").val();
    if(nama_kelas == ""){
        swal('peringatan',"nama kelas wajib di isi");
        return true;
    }
    $.ajax({
        url: "module/kelas/tambahKelas.php",
        type: "POST",
        data: "nama_kelas="+nama_kelas,
        dataType: "html",
        success:function(){
            tampilKelas();
            swal('berhasil','data kelas berhasil di tambahkan');
        }
    });
});
// tampil kelas
function tampilKelas(){
    $.ajax({
        url : "module/kelas/tampilKelasAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $('#tabelKelas').html(data);
        }
    });
}
// hapus kelas
function hapusKelas(x){
    let kode_kelas = x;
    $.ajax({
        url: "module/kelas/hapusKelas.php",
        type: "POST",
        data: "kode_kelas="+kode_kelas,
        dataType: "html",
        success:function(){
            tampilKelas();
            swal("berhasil","data kelas berhasil di hapus");
        }
    });

}
// menampilkan modal edit kelas
$('.tampilkanModalEditKelas').on('click',function(){
    let kode_kelas = $(this).attr('id');
    $.ajax({
        url: "module/kelas/modaleditkelas.php",
        type: "POST",
        data: {kode_kelas:kode_kelas},
        dataType: "JSON",
        success:function(data){
            $("#example-name-edit-kode-kelas").val(data.kode_kelas);
            $("#example-name-edit-nama-kelas").val(data.nama_kelas);
            $('.modal-edit-kelas').modal('show');
        }
    });
});
// edit Kelas
function tampilkanModalEditKelas(x){
    let kode_kelas = x;
    $.ajax({
        url: "module/kelas/modaleditkelas.php",
        type: "POST",
        data: {kode_kelas:kode_kelas},
        dataType: "JSON",
        success:function(data){
            $("#example-name-edit-kode-kelas").val(data.kode_kelas);
            $("#example-name-edit-nama-kelas").val(data.nama_kelas);
            $('.modal-edit-kelas').modal('show');
        }
    });
}
$('#editKelas').click(function(e){
    e.preventDefault();
    let kode_kelas = $("#example-name-edit-kode-kelas").val();
    let nama_kelas = $("#example-name-edit-nama-kelas").val();

    if(nama_kelas == ""){
        swal('peringatan','nama kelas wajib di isi');
    }else{
        $.ajax({
            url: "module/kelas/editKelas.php",
            type: "POST",
            data: "kode_kelas="+kode_kelas+"&nama_kelas="+nama_kelas,
            dataType: "html",
            success:function(){
                tampilKelas();
                swal("berhasil","data kelas berhasil di ubah");
            }
        });
    }
});

// tampil Ajar
function tampilAjar(){
    $.ajax({
        url : "module/ajar/tampilAjarAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $('#tabelAjar').html(data);
        }
    });
}

// tambah ajar
$("#tambahAjar").click(function(){
    let nip = $("#nip").val();
    let kode_kelas = $("#kode_kelas").val();
    let kode_mapel = $("#kode_mapel").val();
    let tahun_ajaran = $("#tahun_ajaran").val();
    if(nip == null){
        swal("peringatan","nama guru wajib di isi");
    }else if(kode_kelas == null){
        swal("peringatan","kelas  wajib di isi");
    }else if(kode_mapel == null){
        swal("peringatan","mapel wajib di isi");
    }else if(tahun_ajaran == null){
        swal("peringatan","tahu ajaran wajib di isi");
    }else{
        $.ajax({
            url : "module/ajar/tambahAjar.php",
            type: "POST",
            data: "nip="+nip+"&kode_kelas="+kode_kelas+"&kode_mapel="+kode_mapel+"&tahun_ajaran="+tahun_ajaran,
            dataType: "html",
            success:function(){
                tampilAjar();
                swal("berhasil","data ajar berhasil di tambahkan");
            }
        });
    }
});
// hapus ajar
function hapusAjar(x){
    let id_ajar = x;
    $.ajax({
        url: "module/ajar/hapusAjar.php",
        type: "POST",
        data: "id_ajar="+id_ajar,
        dataType: "html",
        success:function(){
            tampilAjar();
            swal("berhasil","data ajar berhasil di hapus");
        }
    });
}
// menampilkan modal edit ajar
$('.tampilkanModalEditAjar').on('click',function(){
    let id_ajar = $(this).attr('id');
    $.ajax({
        url: "module/ajar/modaleditajar.php",
        type: "POST",
        data: {id_ajar:id_ajar},
        dataType: "JSON",
        success:function(data){
            $("#edit-id_ajar").val(data.id_ajar);
            $("#edit-nip").val(data.nip);
            $("#edit-kode_kelas").val(data.kode_kelas);
            $("#edit-kode_mapel").val(data.kode_mapel);
            $("#edit-tahun_ajaran").val(data.tahun_ajaran);
            $('.modal-edit-ajar').modal('show');
        }
    });
});

function tampilkanModalEditAjar(x){
    let id_ajar = x;
    $.ajax({
        url: "module/ajar/modaleditajar.php",
        type: "POST",
        data: {id_ajar:id_ajar},
        dataType: "JSON",
        success:function(data){
            $("#edit-nip").val(data.nip);
            $("#edit-kode_kelas").val(data.kode_kelas);
            $("#edit-kode_mapel").val(data.kode_mapel);
            $("#edit-tahun_ajaran").val(data.tahun_ajaran);
            $('.modal-edit-ajar').modal('show');
        }
    });
}
// edit ajar
$('#editAjar').click(function(){
    let id_ajar = $("#edit-id_ajar").val();
    let nip = $("#edit-nip").val();
    let kode_kelas = $("#edit-kode_kelas").val();
    let kode_mapel = $("#edit-kode_mapel").val();
    let tahun_ajaran = $("#edit-tahun_ajaran").val();
    if(nip == null){
        swal("peringatan","nama guru wajib di isi");
    }else if(kode_kelas == null){
        swal("peringatan","kelas  wajib di isi");
    }else if(kode_mapel == null){
        swal("peringatan","mapel wajib di isi");
    }else if(tahun_ajaran == null){
        swal("peringatan","tahu ajaran wajib di isi");
    }else{
        $.ajax({
            url : "module/ajar/editAjar.php",
            type: "POST",
            data: "id_ajar="+id_ajar+"&nip="+nip+"&kode_kelas="+kode_kelas+"&kode_mapel="+kode_mapel+"&tahun_ajaran="+tahun_ajaran,
            dataType: "html",
            success:function(){
                tampilAjar();
                swal("berhasil","data ajar berhasil di edit");
            }
        });
    }
});
// tampil mapel
function tampilMapel(){
    $.ajax({
        url : "module/mapel/tampilMapelAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $('#tabelMapel').html(data);
        }
    });
}
// tambah mapel
$("#tambahMapel").click(function(){
    let nama_mapel = $("#example-text-input-mapel").val();
    if(nama_mapel == null){
        swal("peringatan","nama mapel wajib di isi");
    }else{
        $.ajax({
            url : "module/mapel/tambahMapel.php",
            type: "POST",
            data: "nama_mapel="+nama_mapel,
            dataType: "html",
            success:function(){
                tampilMapel();
                swal("berhasil","data mapel berhasil di tambahkan");
            }
        });
    }
});
// hapus mapel
function hapusMapel(x){
    kode_mapel = x;
    $.ajax({
        url: "module/mapel/hapusMapel.php",
        type: "POST",
        data: "kode_mapel="+kode_mapel,
        dataType: "html",
        success:function(){
            tampilMapel();
            swal('berhasil','data mapel berhasil di hapus');
        }
    });
}
// menampilkan modal edit mapel
$('.tampilKanModalEditMapel').click(function(){
    let kode_mapel = $(this).attr("id");
    $.ajax({
        url : "module/mapel/modaleditmapel.php",
        type: "POST",
        data: {kode_mapel:kode_mapel},
        dataType: "JSON",
        success:function(data){
            $('#example-text-edit-kode_mapel').val(data.kode_mapel);
            $('#example-text-edit-nama_mapel').val(data.nama_mapel);
            $('.modal-edit-mapel').modal('show');   
        }
    });
});
function tampilKanModalEditMapel(x){
    let kode_mapel = x;
    $.ajax({
        url : "module/mapel/modaleditmapel.php",
        type: "POST",
        data: {kode_mapel:kode_mapel},
        dataType: "JSON",
        success:function(data){
            $('#example-text-edit-kode_mapel').val(data.kode_mapel);
            $('#example-text-edit-nama_mapel').val(data.nama_mapel);
            $('.modal-edit-mapel').modal('show');   
        }
    });
}
// edit mapel
$("#editMapel").click(function(){
    let kode_mapel = $('#example-text-edit-kode_mapel').val();
    let nama_mapel = $('#example-text-edit-nama_mapel').val();
    if(nama_mapel == ""){
        swal('peringatan','nama mapel wajib di isi');
        return true;
    }else{
        $.ajax({
            url : "module/mapel/editMapel.php",
            type: "POST",
            data: "kode_mapel="+kode_mapel+"&nama_mapel="+nama_mapel,
            dataType: "html",
            success:function(){
                tampilMapel();
                swal("berhasil","data mapel berhasil di edit");
            }
        });
    }
});
