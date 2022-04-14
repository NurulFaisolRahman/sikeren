<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 mt-2">
                <ul class="nav nav-pills mb-2 border border-warning rounded bg-light" id="pills-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="pills-KreditDosen-tab" data-toggle="pill" href="#pills-KreditDosen" role="tab" aria-controls="pills-KreditDosen" aria-selected="true"><i class="nav-icon fas fa-users"></i><b> Kredit Dosen</b></a>
                  </li>
                </ul>
                <div class="tab-content border border-warning rounded bg-light" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-KreditDosen" role="tabpanel" aria-labelledby="pills-KreditDosen-tab">
                    <div class="container-fluid">
                      <div class="row align-items-center">
                        <div class="col-sm-12 my-2 ">     
                          <div class="table-responsive mb-2">
                            <table id="TabelKreditDosen" class="table table-bordered table-striped">
                              <thead class="bg-warning">
                                <tr>
                                  <th class="text-center align-middle">No</th>
                                  <th class="align-middle">NIP</th>
                                  <th class="align-middle">Nama</th>
                                  <th class="text-center align-middle">Pangkat</th>
                                  <th class="text-center align-middle">Golongan</th> 
                                  <th class="text-center align-middle">Jabatan</th>
                                  <th class="text-center align-middle">Kredit Lama</th>
                                  <th class="text-center align-middle">Kredit Baru</th>
                                  <th class="text-center align-middle">Total Kredit</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $No = 1; foreach ($Dosen as $key) { ?>
                                  <tr>	
                                    <td class="text-center align-middle"><?=$No++?></td>
                                    <td class="align-middle"><?=$key['NIP']?></td>
                                    <td class="align-middle"><?=$key['Nama']?></td>
                                    <td class="text-center align-middle"><?=$key['Pangkat']?></td>
                                    <td class="text-center align-middle"><?=$key['Golongan']?></td>
                                    <td class="text-center align-middle"><?=$key['Jabatan']?></td>
                                    <td class="text-center align-middle"><?=str_replace('.',',',$key['KreditLama'])?></td>
                                    <td class="text-center align-middle"><?=str_replace('.',',',$KreditBaru[$No-2])?></td>
                                    <td class="text-center align-middle"><?=str_replace('.',',',($key['KreditLama']+$KreditBaru[$No-2]))?></td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <script src="<?=base_url('bootstrap/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/popper.min.js')?>" ></script>
    <script src="<?=base_url('bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?=base_url('bootstrap/js/adminlte.min.js')?>"></script>
		<script src="<?=base_url('bootstrap/datatables/jquery.dataTables.js')?>"></script>
		<script src="<?=base_url('bootstrap/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
		<script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
		<script>
			var EditJabatanRencanaPenunjang = ''
			jQuery(document).ready(function($) {
				"use strict";
				
        $('[data-mask]').inputmask()

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

        $("#bkd").click(function() {
					var Tahun = $('#Tahun').val()
					var Pisah = Tahun.split('-')
					window.location = BaseURL + 'Dashboard/BKD/'+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))
					var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang']
					for (let i = 1; i < 5; i++) {
						$.post(BaseURL+"Dashboard"+"/LampiranBKD/"+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))+'/'+PAK[i-1]).done(function(Respon) {
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

				$('#TabelKreditDosen').DataTable( {
					dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [ 5, 10, 20, 30 ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
				});
			})
		</script>
  </body>
</html>