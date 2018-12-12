function liveSearch(){
    var input,filter,tbody,tr,td,i,
    input = document.getElementById("myInput");
    filter  = input.value.toUpperCase();
    tbody = document.getElementById("myTable");
    tr = tbody.getElementsByTagName("tr");

    for(i = 0; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[1];
        if(td){
            if(td.innerHTML.toUpperCase().indexOf(filter) >- 1){
                tr[i].style.display = "";
            }else{
                tr[i].style.display = "none";
            }
        }
    }
}
function dropdown(x) {
    x.classList.toggle("change");
}
function kembali(){
    window.history.back();
}
function ikutUlangan(x){
    let id_ulangan = x;
    swal({
        title: "Silahkan masukan kode token",
        type: "input",
        showCancelButton: false,
        confirmButtonText: "ASDASD",
        closeOnConfirm: false
    },function(inputValue){
        if (inputValue === false ) return false;
        if(inputValue === "") {
            swal("Perhatian","Kode token wajib di isi","error");
            return false;
        }
        $.ajax({
            url: "module/cekToken.php",
            type: "POST",
            data: "id_ulangan="+id_ulangan+"&kode_token="+inputValue,
            success:function(data){
                if(data == 1){
                    window.location="index.php?module=ulangan"
                }else{
                    swal("Perhatian","Kode token salah","error");
                }
            }
        });
    });
}
function submitJawaban(){
    let answer_question = $("#answer_question");
    console.log(answer_question);
}