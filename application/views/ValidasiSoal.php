    <link href="<?=base_url('summernote/summernote-bs4.min.css')?>" rel="stylesheet">
    <div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelRPS" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle">Dosen Pengampu</th>
                              <th class="align-middle">Nama Mata Kuliah</th>
                              <th class="align-middle">Bobot</th>
                              <th class="align-middle">Semester</th>
                              <th class="text-center align-middle">Tahun</th>
                              <th class="text-center align-middle">RPS</th>
                              <th class="text-center align-middle">UTS</th>
                              <th class="text-center align-middle">UAS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Soal as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaMK']?></td>
                                <td class="align-middle"><?=$key['BobotMK'].' sks'?></td>
                                <td class="align-middle"><?=$key['Semester']?></td>
                                <td class="align-middle text-center"><?=$key['Tahun']?></td>
                                <td class="text-center align-middle">
                                  <button Unduh="<?=$key['KodeMK']?>" class="btn btn-sm btn-warning Unduh"><i class="fas fa-eye"></i></button>
                                </td> 
                                <td class="text-center align-middle">
                                <?php if ($key['UTS'] != '1') { ?>
                                  <button UTS="<?=$key['Id']?>" class="btn btn-sm btn-primary UTS"><i class="fas fa-edit"></i></button>
                                <?php } ?>
                                  <button SoalUTS="<?=$key['Id']?>" class="btn btn-sm btn-success SoalUTS"><i class="fas fa-eye"></i></button>
                                </td> 
                                <td class="text-center align-middle">
                                <?php if ($key['UAS'] != '1') { ?>
                                  <button UAS="<?=$key['Id']?>" class="btn btn-sm btn-danger UAS"><i class="fas fa-edit"></i></button>
                                <?php } ?>
                                  <button SoalUAS="<?=$key['Id']?>" class="btn btn-sm btn-success SoalUAS"><i class="fas fa-eye"></i></button>
                                </td> 
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
        </section>
      </div>
    </div>
    <div class="modal fade" id="ModalSoal" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body" style="height: 500px;">
            <div class="container">
							<div class="row">
                <input class="form-control form-control-sm" type="hidden" id="IdSoal">
								<div class="col-sm-4">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Jenis Soal</b></span>
                    </div>
                    <select class="custom-select" id="Jenis" disabled>
                      <option value="UTS">UTS</option>
											<option value="UAS">UAS</option>
                    </select>
                  </div>
								</div>
								<div class="col-sm-4">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Sifat Ujian</b></span>
                    </div>
                    <input type="text" class="form-control" id="Sifat"> 
                  </div>
								</div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Waktu Ujian</b></span>
                    </div>
                    <input type="text" class="form-control" id="Waktu"> 
                  </div>
								</div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Mata Kuliah</b></span>
                    </div>
                    <select class="custom-select" id="SoalMK" disabled>
                      <?php foreach ($Soal as $key) { if ($key['Status'] == 3) { ?>
                        <option value="<?=$key['KodeMK']?>"><?=$key['NamaMK']?></option>
                      <?php }} ?>
                    </select>
                  </div>
								</div>
								<div class="col-sm-6">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Catatan</b></span>
                    </div>
                    <input type="text" class="form-control" id="Catatan"> 
                  </div>
								</div>
								<div class="col-sm-12">
                  <textarea id="Soal"></textarea>
                </div>
                <div class="col-sm-12 mt-0">
                  <div class="input-group input-group-sm">
                    <textarea style="width: 100%;" id="CatatanSoal" rows="3" placeholder="Catatan Koreksi Mengenai Soal"></textarea>
                  </div>
								</div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-primary" id="InputSoal"><b>Simpan <div id="LoadingInputSoal" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
            <button type="submit" class="btn btn-success" id="ValidasiSoal"><b>Validasi <div id="LoadingValidasiSoal" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url('bootstrap/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/popper.min.js')?>" ></script>
    <script src="<?=base_url('bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/adminlte.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/datatables/jquery.dataTables.js')?>"></script>
		<script src="<?=base_url('bootstrap/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
    <script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script src="<?=base_url("summernote/summernote-bs4.min.js")?>"></script>
    <script src="<?=base_url("sumernote/summernote-image-attributes.js")?>"></script>
    <script src="<?=base_url("sumernote/lang/es-ES.js")?>"></script>
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
      $(document).ready(function(){
        var BaseURL = '<?=base_url()?>'
        
        $('#Soal').summernote({
            height: 250,
            imageAttributes: {
              icon: '<i class="note-icon-pencil"/>',
              figureClass: 'figureClass',
              figcaptionClass: 'captionClass',
              captionText: 'Caption Goes Here.',
              manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
            },
            lang: 'en-US',
            popover: {
                image: [
                    ['remove', ['removeMedia']],
                    ['custom', ['imageAttributes']],
                ],
            },
            toolbar: [ ['image', ['picture']] ]
        }); 

        $('#TabelRPS').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [ [5, 10, 20, 30, -1], [5, 10, 20, 30, "All"] ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
        })

        $(document).on("click",".SoalUTS",function(){
					window.location = BaseURL + "Dashboard/Soal/" + $(this).attr('SoalUTS') + "/TENGAH"
        })
        
        $(document).on("click",".SoalUAS",function(){
					window.location = BaseURL + "Dashboard/Soal/" + $(this).attr('SoalUAS') + "/AKHIR"
				})

        $(document).on("click",".Unduh",function(){
          window.location = BaseURL + "Dashboard/UnduhRPS/" + $(this).attr('Unduh')
				})

        $(document).on("click",".UTS",function(){
					$.post(BaseURL+"Dashboard/GetSoal/"+$(this).attr('UTS')).done(function(Respon) {
            var Data = JSON.parse(Respon)
            $("#IdSoal").val(Data.Id)
            $("#Jenis").val('UTS')
            $("#Sifat").val(Data.SifatUTS)
            $("#Waktu").val(Data.WaktuUTS)
            $("#SoalMK").val(Data.KodeMK)
            $("#Catatan").val(Data.CatatanUTS)
            $('#Soal').summernote('code',Data.SoalUTS)
            $("#CatatanSoal").val(Data.EvaluasiUTS)
            $("#ModalSoal").modal('show')
					})
				})

        $(document).on("click",".UAS",function(){
					$.post(BaseURL+"Dashboard/GetSoal/"+$(this).attr('UAS')).done(function(Respon) {
            var Data = JSON.parse(Respon)
            $("#IdSoal").val(Data.Id)
            $("#Jenis").val('UAS')
            $("#Sifat").val(Data.SifatUAS)
            $("#Waktu").val(Data.WaktuUAS)
            $("#SoalMK").val(Data.KodeMK)
            $("#Catatan").val(Data.CatatanUAS)
            $('#Soal').summernote('code',Data.SoalUAS)
            $("#CatatanSoal").val(Data.EvaluasiUAS)
            $("#ModalSoal").modal('show')
					})
				})

        $("#InputSoal").click(function() {
          Jenis = $("#Jenis").val()
          if (Jenis == 'UTS') {
            var Soal = { Id: $("#IdSoal").val(),
                         EvaluasiUTS: $("#CatatanSoal").val() }
          } else {
            var Soal = { Id: $("#IdSoal").val(),
                         EvaluasiUAS: $("#CatatanSoal").val() }
          }
          $("#InputSoal").attr("disabled", true);                              
          $("#LoadingInputSoal").show();
          $.post(BaseURL+"Dashboard/InputSoal", Soal).done(function(Respon) {
            if (Respon == '1') {
              alert('Data Berhasil Di Simpan!')
              window.location = BaseURL + "Dashboard/ValidasiSoal"
            } else {
              alert(Respon)
              $("#LoadingInputSoal").hide();
              $("#InputSoal").attr("disabled", false);   
            }
          })
        })

        $("#ValidasiSoal").click(function() {
          Jenis = $("#Jenis").val()
          if (Jenis == 'UTS') {
            var Soal = { Id: $("#IdSoal").val(),
                         UTS: '1' }
          } else {
            var Soal = { Id: $("#IdSoal").val(),
                         UAS: '1' }
          }
          $("#ValidasiSoal").attr("disabled", true);                              
          $("#LoadingValidasiSoal").show();
          var Konfirmasi = confirm("Yakin Ingin Validasi?");
      		if (Konfirmasi == true) {
            $.post(BaseURL+"Dashboard/InputSoal", Soal).done(function(Respon) {
              if (Respon == '1') {
                alert('Data Berhasil Di Simpan!')
                window.location = BaseURL + "Dashboard/ValidasiSoal"
              } else {
                alert(Respon)
                $("#LoadingValidasiSoal").hide();
                $("#ValidasiSoal").attr("disabled", false);   
              }
            })
          }
        })
        
      })
    </script>
  </body>
</html>