var BaseURL = '<?=base_url()?>';
$("#pak").click(function() {
  var Tahun = $('#Tahun').val()
  var Pisah = Tahun.split('-')
  window.location = BaseURL + 'Dashboard/PAK/'+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))
  var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang']
  for (let i = 1; i < 5; i++) {
    $.post(BaseURL+"Dashboard"+"/Lampiran/"+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))+'/'+PAK[i-1]).done(function(Respon) {
      var array = JSON.parse(Respon)
      var NomorLampiran = 1
      array.forEach(function(object) {
        if (object.Bukti != null) {
          $('#LampiranPAK').attr('href',BaseURL+PAK[i-1]+'/'+object.Bukti)		
          $('#LampiranPAK').attr('Download','Lampiran '+i+'.'+NomorLampiran+'.pdf') 
          $('#LampiranPAK')[0].click()
        }
        NomorLampiran++;
      })
    }) 	
  }
})