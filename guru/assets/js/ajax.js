$("#login").on("submit",function(e){
        e.preventDefault();
        let username = $("#exampleInputEmail1").val();
        let password = $("#exampleInputPassword1").val();
        if(username == ""){
            swal("peringatan","username tidak boleh kosong","error");   
            return true;
        }else if(password == ""){
            swal("peringatan","password tidak boleh kosong","error");   
            return true;
        }else{
            $.ajax({
                url: "guru/module/auth/proses_login.php",
                type: "POST",
                dataType: "html",
                data: "username="+username+"&password="+password,
                success:function(data){
                    if(data == 2){
                        window.location ='guru/index.php'
                    }else if(data == 3){
                        window.location ='siswa/index.php'                        
                    }else{
                        swal("gagal","akun tidak di temuan","error");
                    }
                }
            });
        }  
});
// tampil bab
function tampilBab(){
    $.ajax({
        url: "module/bab/tampilBabAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $("#tabelBab").html(data);
        }
    });
}
// tambah bab
$("#tambahBab").click(function(){
    let nip = $("#nip").val();
    let namaBab = $("#example-bab-input-bab").val();
    let kodeKelas = $("#example-bab-input-kode_kelas").val();
    if(kodeKelas == null){
        swal("perhatian"," kelas  wajib di isi","error");
    }else if(namaBab == ""){
        swal("perhatian","nama bab wajib di isi","error");
    }else{
        $.ajax({
            url: "module/bab/tambahBab.php",
            data: "namaBab="+namaBab+"&nip="+nip+"&kodeKelas="+kodeKelas,
            type: "POST",
            dataType: "html",
            success:function(){
                tampilBab();
                swal("berhasil","data bab berhasil di tambahkan","success");
            }
        });
    }   
});

// hapus Bab
function hapusBab(x){
    let id_bab = x;
    $.ajax({
        url: "module/bab/hapusBab.php",
        type: "POST",
        data: "id_bab="+id_bab,
        dataType: "html",
        success:function(){
            tampilBab();
            swal("berhasil","data bab berhasil di hapus","success");
        }
    });
}
function tampilkanModalEditBab(x){
    let id_bab = x;
    $.ajax({
        url : "module/bab/modaleditbab.php",
        type: "POST",
        data: {id_bab:id_bab},
        dataType: "JSON",
        success:function(data){
            $('#example-bab-edit-id_bab').val(data.id_bab);
            $('#example-bab-edit-nama_bab').val(data.nama);
            $('#example-bab-edit-kode_kelas').val(data.kode_kelas);
            $('.modal-edit-bab').modal('show');   
        }
    });
}
// edit bab
$("#editBab").click(function(){
    let id_bab = $('#example-bab-edit-id_bab').val();
    let nama_bab = $('#example-bab-edit-nama_bab').val();
    let kodeKelas = $('#example-bab-edit-kode_kelas').val();
    if(kodeKelas == null){
        swal("perhatian","nama bab wajib di isi","error");
    }else if(nama_bab == ""){
        swal("perhatian","nama bab wajib di isi","error");
    }else{
        $.ajax({
            url: "module/bab/editBab.php",
            type: "POST",
            data: "id_bab="+id_bab+"&nama_bab="+nama_bab+"&kode_kelas="+kodeKelas,
            dataType: "html",
            success:function(){
                tampilBab();
                swal("berhasil","data bab berhasil di ubah","success");
            }
        });
    }
});
// tampil materi ajax 
function tampilMateri(){
    $.ajax({
        url: "module/materi/tampilMateriAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $("#tabelMateri").html(data);
        }
    });
}
$("#example-materi-input-kode_kelas").change(function(){
    let nip = $("#nip").val();
    let kode_kelas = $("#example-materi-input-kode_kelas").val();
    $.ajax({
        url: "module/materi/filterBab.php",
        type: "POST",
        data: "kode_kelas="+kode_kelas+"&nip="+nip,
        dataType: "html",
        success:function(data){
            $("#example-materi-input-id_bab").html(data);
        }
    });
});
// tambah materi 
$("#tambahMateri").click(function(){
   let id_bab = $("#example-materi-input-id_bab").val();
   let nama_materi = $("#example-materi-input-nama_materi").val();
   let isi_materi = $("#example-materi-input-isi_materi").val();
   let nip = $("#nip").val();
   if(id_bab == null){
    swal("perhatian","bab wajib di isi","error");
   }else if(nama_materi == ""){
    swal("perhatian","nama materi wajib di isi","error");
   }else if(isi_materi == ""){
    swal("perhatian","isi materi wajib di isi","error");
   }else{
        $.ajax({
            url: "module/materi/tambahMateri.php",
            type: "POST",
            data: "id_bab="+id_bab+"&nama_materi="+nama_materi+"&isi_materi="+isi_materi+"&nip="+nip,
            dataType: "html",
            success:function(data){
                tampilMateri();
                swal("berhasil","data materi berhasil di isi","success");
            }
        });
   }
});
// hapus materi 
function hapusMateri(x){
    let kode_materi = x;
    $.ajax({
        url : "module/materi/hapusMateri.php",
        type : "POST",
        data : "kode_materi="+kode_materi,
        dataType : "html",
        success:function(data){
            tampilMateri();
            swal("berhasil","data materi berhasil di hapus","success");
        }
    });
}
// menampilkan modal edit materi
function tampilkanModalEditMateri(x){  
    let kode_materi = x;
    $.ajax({
        url : "module/materi/modaleditmateri.php",
        type: "POST",
        data: {kode_materi:kode_materi},
        dataType: "JSON",
        success:function(data){
            $("#example-materi-edit-id_bab").val(data.id_bab);
            $("#example-materi-edit-kode_materi").val(data.kode_materi);
            $("#example-materi-edit-nama_materi").val(data.nama_materi);
            $("#example-materi-edit-isi_materi").val(data.isi_materi);
            $('.modal-edit-materi').modal('show');   
        }
    });
}
// edit materi
$("#editMateri").click(function(){
   let kode_materi = $("#example-materi-edit-kode_materi").val();
   let id_bab = $("#example-materi-edit-id_bab").val();
   let nama_materi =  $("#example-materi-edit-nama_materi").val();
   let isi_materi = $("#example-materi-edit-isi_materi").val();
   if(nama_materi ==""){
        swal("perhatian","nama materi wajib di isi","error");
   }else if(isi_materi ==""){
        swal("perhatian","isi materi wajib di isi","error");
   }else{
        $.ajax({
            url: "module/materi/editMateri.php",
            type: "POST",
            data: "kode_materi="+kode_materi+"&id_bab="+id_bab+"&nama_materi="+nama_materi+"&isi_materi="+isi_materi,
            dataType: "html",
            success:function(data){
                tampilMateri();
                swal("berhasil","data materi berhasil di ubah","success");
            }
        });
   }
});
function filterMateri(){
    let id_bab  = $("#id_bab").val();
    $.ajax({
        url : "module/materi/filterMateri.php",
        type: "POST",
        data : "id_bab="+id_bab,
        dataType : "html",
        success:function(data){
            $("#tabelMateri").html(data);
        }
    });
}
//tampil ulangan
function tampilUlangan(){
    $.ajax({
        url: "module/ulangan/tampilUlanganAjax.php",
        type: "POST",
        dataType: "html",
        success:function(data){
            $("#tabelUlangan").html(data);
        }
    });
}
$("#example-ulangan-input-kelas").on("change",function(){
    let nip = $("#nip").val();
    let kode_kelas = $("#example-ulangan-input-kelas").val();
    $.ajax({
        url: "module/ulangan/filterBab.php",
        type: "POST",
        data: "kode_kelas="+kode_kelas+"&nip="+nip,
        dataType: "html",
        success:function(data){
            $("#example-ulangan-input-id_bab").html(data);
        }
    });
});
// tambah ulangan 
$("#tambahUlangan").click(function(){
    let kode_token = $("#example-ulangan-input-kode_token").val();
    let nip = $("#nip").val();
    let id_bab = $("#example-ulangan-input-id_bab").val();
    let jenis_ulangan = $("#example-ulangan-input-jenis_ulangan").val();
    let tgl_ulangan = $("#example-ulangan-input-tgl_ulangan").val();
    let durasi_ulangan = $("#example-ulangan-input-durasi_ulangan").val();
    let kode_kelas = $("#example-ulangan-input-kelas").val();
    if(id_bab == null){
        swal("perhatian","nama bab perlu di isi","error");
    }else if(jenis_ulangan == null){
        swal("perhatian","jenis ulangan perlu di isi","error");

    }else if(kode_kelas == null){
        swal("perhatian","kelas ulangan perlu di isi","error");
    }else if(tgl_ulangan == null){
        swal("perhatian","tanggal ulangan perlu di isi","error");
    }else if(durasi_ulangan == ""){
        swal("perhatian","durasi ulangan perlu di isi","error");

    }else{
        $.ajax({
        url: "module/ulangan/tambahUlangan.php",
        type: "POST",
        data: "kode_token="+kode_token+"&id_bab="+id_bab+"&jenis_ulangan="+jenis_ulangan+"&tgl_ulangan="+tgl_ulangan+"&durasi_ulangan="+durasi_ulangan+"&nip="+nip+"&kode_kelas="+kode_kelas,
        dataType: "html",
        success:function(){
            tampilUlangan();
            swal("berhasil","Data ulangan berhasil di tambahkan","success");
        }
    });
    }
   
});
// hapus ulangan
function hapusUlangan(x){
    let id_ulangan = x;
    $.ajax({
        url: "module/ulangan/hapusUlangan.php",
        type: "POST",
        data: {id_ulangan:id_ulangan},
        dataType: "JSON",
        success:function(){
            tampilUlangan();
            swal("berhasil","data ulangan berhasil di hapus","success");
        }
    });
}
// menampilkan modal/popup edit ulangan 
function tampilkanModalEditUlangan(x){
    let id_ulangan =x;
    $.ajax({
        url: "module/ulangan/modaleditulangan.php",
        type: "POST",
        data: {id_ulangan:id_ulangan},  
        dataType: "JSON",
        success:function(data){
            $("#example-ulangan-edit-kode_token").val(data.kode_token);
            $("#example-ulangan-edit-id_ulangan").val(data.id_ulangan);
            $("#example-ulangan-edit-id_bab").val(data.id_bab);
            $("#example-ulangan-edit-jenis_ulangan").val(data.jenis_ulangan);
            $("#example-ulangan-edit-tgl_ulangan").val(data.tgl_ulangan);
            $("#example-ulangan-edit-durasi_ulangan").val(data.durasi_ulangan);
            $(".modal-edit-ulangan").modal("show");
        }

    });
}
// edit ulangan 
$("#editUlangan").click(function(){
    let id_ulangan = $("#example-ulangan-edit-id_ulangan").val();
    let id_bab = $("#example-ulangan-edit-id_bab").val();
    let jenis_ulangan = $("#example-ulangan-edit-jenis_ulangan").val();
    let tgl_ulangan = $("#example-ulangan-edit-tgl_ulangan").val();
    let durasi_ulangan = $("#example-ulangan-edit-durasi_ulangan").val();
    $.ajax({
        url: "module/ulangan/editUlangan.php",
        type: "POST",
        data: {id_ulangan:id_ulangan,id_bab:id_bab,jenis_ulangan:jenis_ulangan,tgl_ulangan:tgl_ulangan,durasi_ulangan:durasi_ulangan},
        dataType: "JSON",
        success:function(){
            tampilUlangan();
            swal("berhasil","data ulangan berhasil di ubah");
        }
    });
});

// aktifkan ulangan 
 function aktifkanUlangan(x){
    let id_ulangan = x;
    $.ajax({
        url: "module/ulangan/aktifkanUlangan.php",
        type: "POST",
        data: "id_ulangan="+id_ulangan,
        dataType: "html",
        success:function(data){
            tampilUlangan();
            swal("berhasil","ulangan berhasil di aktifkan","success");
        }
    });
 }
 // Nonaktifkan ulangan 
 function NonAktifkanUlangan(x){
    let id_ulangan = x;
    $.ajax({
        url: "module/ulangan/nonAktifkanUlangan.php",
        type: "POST",
        data: "id_ulangan="+id_ulangan,
        dataType: "html",
        success:function(data){
            tampilUlangan();
            swal("berhasil","ulangan berhasil di non aktifkan","success");
        }
    });
 }

 //
 $("#example-soal-select-kode_kelas").on("change",function(){
    let nip = $("#nip").val();
    let kode_kelas = $("#example-soal-select-kode_kelas").val();
    $.ajax({
        url: "module/soal/tampilUlangan.php",
        type: "POST",
        data: "kode_kelas="+kode_kelas+"&nip="+nip,
        dataType: "html",
        success:function(data){
             $("#example-soal-select-id_ulangan").html(data)
        }
    });
 }); 

 // 
 $("#example-soal-select-id_ulangan").on("change",function(){
    let id_ulangan = $("#example-soal-select-id_ulangan").val();
    $.ajax({
        url: "module/soal/tampilSoal.php",
        type: "POST",
        data: "id_ulangan="+id_ulangan,
        dataType: "html",
        success:function(data){
            $("#boxSoal").fadeIn();
            $("#tabelSoal").html(data);
        }
    });
 });
 $("#tambahSoal").click(function(){
    let id_ulangan = $("#example-soal-select-id_ulangan").val();
    let pertanyaan = $("#example-soal-input-pertanyaan").val();
    let pilihan_a = $("#example-soal-input-pilihan_a").val();
    let pilihan_b = $("#example-soal-input-pilihan_b").val();
    let pilihan_c = $("#example-soal-input-pilihan_c").val();
    let pilihan_d = $("#example-soal-input-pilihan_d").val();
    let kunci_jawaban = $("#example-soal-input-kunci_jawaban").val();
    if(pertanyaan == ""){
        swal("perhatian","isi pertanyaan wajib di isi","error");
    }else if(pilihan_a == ""){
        swal("perhatian","pilihan A wajib di isi","error");
    }else if(pilihan_b == ""){
        swal("perhatian","pilihan B wajib di isi","error");
    }else if(pilihan_c == ""){
        swal("perhatian","pilihan C wajib di isi","error");
    }else if(pilihan_d == ""){
        swal("perhatian","pilihan D wajib di isi","error");
    }else if(kunci_jawaban == ""){
        swal("perhatian","Kunci wajib di isi","error");
    }else{
        $.ajax({
            url: "module/soal/tambahSoal.php",
            type: "POST",
            data: {id_ulangan:id_ulangan,pertanyaan:pertanyaan,pilihan_a:pilihan_a,pilihan_b:pilihan_b,pilihan_c:pilihan_c,pilihan_d:pilihan_d,kunci_jawaban:kunci_jawaban},
            dataType: "JSON",
            success:function(){
                $.ajax({
                    url: "module/soal/tampilSoal.php",
                    type: "POST",
                    data: "id_ulangan="+id_ulangan,
                    dataType: "html",
                    success:function(data){
                        $("#example-soal-input-pertanyaan").val("");
                        $("#example-soal-input-pilihan_a").val("");
                        $("#example-soal-input-pilihan_b").val("");
                        $("#example-soal-input-pilihan_c").val("");
                        $("#example-soal-input-pilihan_d").val("");
                        $("#example-soal-input-kunci_jawaban").val("");  
                        swal("berhasil","data soal berhasil di tambahkan","success");
                        $("#tabelSoal").html(data);
                                      
                    }
                });
            } 
        });
    }
 });
 //hapus soal
function hapusSoal(x){
    let id_soal = x;
    let id_ulangan = $("#example-soal-select-id_ulangan").val();
    $.ajax({
        url: "module/soal/hapusSoal.php",
        type: "POST",
        data: "id_soal="+id_soal,
        dataType: "html",
        success:function(){
             $.ajax({
                    url: "module/soal/tampilSoal.php",
                    type: "POST",
                    data: "id_ulangan="+id_ulangan,
                    dataType: "html",
                    success:function(data){
                        swal("berhasil","data soal berhasil di hapus","success");
                        $("#tabelSoal").html(data);
                    }
                });
        }
    });
}

function tampilkanModalEditSoal(x){
    let id_soal = x;
    $.ajax({
        url: "module/soal/modaleditsoal.php",
        type: "POST",
        data: {id_soal:id_soal},
        dataType: "JSON",
        success:function(data){
            $("#example-soal-edit-id_soal").val(data.id_soal);
            $("#example-soal-edit-pertanyaan").val(data.isi_soal);
            $("#example-soal-edit-pilihan_a").val(data.pilihan_a);
            $("#example-soal-edit-pilihan_b").val(data.pilihan_b);
            $("#example-soal-edit-pilihan_c").val(data.pilihan_c);
            $("#example-soal-edit-pilihan_d").val(data.pilihan_d);
            $("#example-soal-edit-kunci_jawaban").val(data.jawaban);
            $(".modal-edit-soal").modal("show");
        }
    });
}
$("#editSoal").click(function(){
          let id_ulangan = $("#example-soal-select-id_ulangan").val();
          let id_soal =  $("#example-soal-edit-id_soal").val();
          let pertanyaan = $("#example-soal-edit-pertanyaan").val();
          let pilihan_a  =  $("#example-soal-edit-pilihan_a").val();
          let pilihan_b  = $("#example-soal-edit-pilihan_b").val();
          let pilihan_c  =  $("#example-soal-edit-pilihan_c").val();
          let pilihan_d  =   $("#example-soal-edit-pilihan_d").val();
          let kunci_jawaban =  $("#example-soal-edit-kunci_jawaban").val();
           if(pertanyaan == ""){
                swal("perhatian","isi pertanyaan wajib di isi","error");
            }else if(pilihan_a == ""){
                swal("perhatian","pilihan A wajib di isi","error");
            }else if(pilihan_b == ""){
                swal("perhatian","pilihan B wajib di isi","error");
            }else if(pilihan_c == ""){
                swal("perhatian","pilihan C wajib di isi","error");
            }else if(pilihan_d == ""){
                swal("perhatian","pilihan D wajib di isi","error");
            }else if(kunci_jawaban == ""){
                swal("perhatian","Kunci wajib di isi","error");
            }else{
                 $.ajax({
                        url: "module/soal/editSoal.php",
                        type: "POST",
                        data: {id_soal:id_soal,pertanyaan:pertanyaan,pilihan_a:pilihan_a,pilihan_b:pilihan_b,pilihan_c:pilihan_c,pilihan_d:pilihan_d,kunci_jawaban:kunci_jawaban},
                        dataType: "JSON",
                        success:function(){
                            $.ajax({
                                url: "module/soal/tampilSoal.php",
                                type: "POST",
                                data: "id_ulangan="+id_ulangan,
                                dataType: "html",
                                success:function(data){
                                    swal("berhasil","data soal berhasil di tambahkan","success");
                                    $("#tabelSoal").html(data);
                                }
                            });
                        } 
                    });
            }
         
});

