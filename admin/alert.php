<div class="row">
    <div class="col-12">
        <div class="alert alert-primary mb-4">
            <p class="text-secondary">
            <?php
                $notif = $_GET["notif"];
                $status = $_GET["status"];
                if($notif == "tambah"){
                    if($status == "1")     echo "Data guru berhasil di tambahkan";
                    elseif($status == "2") echo "Data siswa berhasil di tambahkan";
                    elseif($status == "3") echo "Data kelas berhasil di tambahkan";
                    elseif($status == "4") echo "Data ajar berhasil di tambahkan";
                    elseif($status == "5") echo "Data Mapel berhasil di tambahkan";
                    else echo "ulah sok jail sql na geus di inject ku urang";
                }elseif($notif == "ubah"){
                    if($status == "1")     echo "Data guru berhasil di ubah";
                    elseif($status == "2") echo "Data siswa berhasil di ubah";
                    elseif($status == "3") echo "Data kelas berhasil di ubah";
                    elseif($status == "4") echo "Data ajar berhasil di ubah";
                    elseif($status == "5") echo "Data Mapel berhasil di ubah";
                    else echo "ulah sok jail sql na geus di inject ku urang";
                }elseif($notif == "hapus"){
                    if($status == "1")     echo "Data guru berhasil di hapus";
                    elseif($status == "2") echo "Data siswa berhasil di hapus";
                    elseif($status == "3") echo "Data kelas berhasil di hapus";
                    elseif($status == "4") echo "Data ajar berhasil di hapus";
                    elseif($status == "5") echo "Data Mapel berhasil di hapus";
                    else echo "ulah sok jail sql na geus di inject ku urang";

                }else echo "tidak ada notif";
            ?>
            </p>
        </div>
    </div>
</div>