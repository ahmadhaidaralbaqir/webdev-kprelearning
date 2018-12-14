// countdownTimer();
function liveSearch(){
    let input,filter,tbody,tr,td,i;
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
        confirmButtonText: "Submit",
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
// function countdownTimer(){
//     // Set the date we're counting down to
//     let countDownDate = new Date("Jan 16, 2018 15:37:25").getTime();

//     // Update the count down every 1 second
//     let x = setInterval(function() {

//       // Get todays date and time
//       let now = new Date().getTime();
        
//       // Find the distance between now and the count down date
//       let distance = countDownDate - now;
        
//       // Time calculations for days, hours, minutes and seconds
//       let days = Math.floor(distance / (1000 * 60 * 60 * 24));
//       let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//       let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//       let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
//       // Output the result in an element with id="demo"
//       document.getElementById("timer").innerHTML = now;
        
//       // If the count down is over, write some text 
//       if (distance < 0) {
//         clearInterval(x);
//         document.getElementById("timer").innerHTML = "EXPIRED";
//       }
//     }, 1000);
// }