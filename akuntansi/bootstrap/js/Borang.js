$("#DownloadBorang").click(function() {
  if (!isNaN($('#TS').val()) && $('#TS').val() != "") {
    window.location = 'Borang/'+$('#TS').val()+'/'+$('#Homebase').val() 
    // $.post(BaseURL+"Admin"+"/DTPS").done(function(Respon) {
    //   var array = JSON.parse(Respon) 
    //   array.forEach(function(object) {
    //     if (object.BuktiPendidik != null) {
    //       $('#LampiranDTPS').attr('href',BaseURL+'DTPS/'+object.BuktiPendidik)		
    //       $('#LampiranDTPS').attr('Download',object.BuktiPendidik) 
    //       $('#LampiranDTPS')[0].click()
    //     }
    //     if (object.BuktiKompetensi != null) {
    //       $('#LampiranDTPS').attr('href',BaseURL+'DTPS/'+object.BuktiKompetensi)		
    //       $('#LampiranDTPS').attr('Download',object.BuktiKompetensi) 
    //       $('#LampiranDTPS')[0].click()
    //     }
    //   })
    // }) 	
    // var KerjaSama = ['Pendidikan','Penelitian','Pengabdian']
    // for (let i = 0; i < 3; i++) {
    //   $.post(BaseURL+"Admin"+"/LampiranKerjaSama/"+KerjaSama[i]).done(function(Respon) {
    //     var array = JSON.parse(Respon) 
    //     var No = 1;
    //     array.forEach(function(object) {
    //       $('#LampiranKerjaSama').attr('href',BaseURL+'KerjaSama/'+object.Bukti)		
    //       $('#LampiranKerjaSama').attr('Download','Kerja Sama '+KerjaSama[i]+' '+No+'.pdf') 
    //       $('#LampiranKerjaSama')[0].click()
    //       No+=1;
    //     })
    //   }) 	
    // } 
  }
  else {
    alert('Input Tahun / TS Belum Benar!')
  }
})