<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="../SIDP.css">
    <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="FormDaftar">
          <h2 class="form_title title">Daftar Akun</h2>
          <input class="form__input" type="text" placeholder="NIM" id="_NIM">
          <input class="form__input" type="text" placeholder="Nama" id="_Nama">
          <input class="form__input" type="password" placeholder="Password" id="_Password">
          <button class="form__button button" id="Daftar">Daftar</button>
        </form>
      </div>
      <div class="container b-container" id="b-container">
        <form class="form" id="FormLogin">>
          <h2 class="form_title title">Silahkan Masuk</h2>
          <input class="form__input" type="text" placeholder="NIM" id="NIM">
          <input class="form__input" type="password" placeholder="Password" id="Password">
          <button class="form__button button" id="Masuk">Masuk</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Selamat Datang</h2>
          <p class="switch__description description">Jika Anda Telah Memiliki Akun Silahkan Klik Tombol Masuk</p>
          <button class="switch__button button switch-btn">Masuk</button>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">Daftar Akun?</h2>
          <p class="switch__description description">Silahkan Klik Tombol Daftar</p>
          <button class="switch__button button switch-btn">Daftar</button>
        </div>
      </div>
    </div>
  </body>
</html>
<!-- partial -->
  <script  src="../SIDP.js"></script>
  <script src="<?=base_url('bootstrap/js/jquery.min.js')?>"></script>
  <script>
    $(document).ready(function(){
      var BaseURL = '<?=base_url()?>'
      $("#FormLogin").submit(function(e) {
          e.preventDefault()
      })
      $("#FormDaftar").submit(function(e) {
          e.preventDefault()
      })
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault()
          return false
        }
      })
      $("#Masuk").click(function() {
        var Akun = { NIM: $("#NIM").val(),
                     Password: $("#Password").val() } 
        $.post(BaseURL+"SMD/MhsMasuk", Akun).done(function(Respon) {
          if (Respon == '1') {
            window.location = BaseURL + "Mhs/Profil"
          }
          else {
            alert(Respon)
          }
        })                     
      })
      $("#Daftar").click(function() {
        if ($("#_NIM").val() === "" || isNaN($("#_NIM").val()) || $("#_NIM").val().length != 12) {
          alert('Mohon Input NIM 12 Digit Angka!')
        } else if ($("#_Nama").val() === "") {
          alert('Mohon Input Nama!')
        } else if ($("#_Password").val() === "") {
          alert('Mohon Input Password!')
        } else {
          var Mhs = { NIM: $("#_NIM").val(),
                      Nama: $("#_Nama").val(),
                      Password: $("#_Password").val() }
          $("#Daftar").attr("disabled", true);                              
          $.post(BaseURL+"SMD/MhsDaftar", Mhs).done(function(Respon) {
            if (Respon == '1') {
              window.location = BaseURL + "Mhs/Profil"
            } else {
              alert(Respon)
              $("#Daftar").attr("disabled", false);   
            }
          })
        }
      })
    })
  </script>
</body>
</html>