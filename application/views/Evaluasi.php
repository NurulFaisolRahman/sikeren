<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalData"><i class="fa fa-plus"></i> <b>Input Data</b></button> 
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelPrestasiMahasiswa" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 5%;" class="text-center align-middle">No</th>
                              <th class="align-middle">Nama Dokumen</th>
                              <th style="width: 7%;" class="align-middle text-center ">Bukti</th>
                              <th style="width: 10%;" class="align-middle text-center ">Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Data as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NamaDokumen']?></td>
                                <td class="align-middle text-center">
                                  <button Data="<?=base_url('Evaluasi/'.$key['Bukti'])?>" class="btn btn-sm btn-primary Data"><i class="fas fa-download"></i></button>  
                                </td> 
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Id'].'|'.$key['NamaDokumen'].'|'.$key['Bukti']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Id'].'|'.$key['Bukti']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
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
    <div class="modal fade" id="ModalData">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Dokumen</b></span>
                    </div>
                    <input type="text" class="form-control" id="Nama" placeholder="Nama Dokumen + Tahun"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti</b></span>
										</div>
										<input class="form-control" type="file" id="Bukti">
                  </div>
                </div>
                <div class="col-sm-12">
                  <pre class="text-danger"><b>Bukti Yang Diupload Dalam Format Pdf</b></pre>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="Input"><b>Simpan <div id="LoadingInput" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="_ModalData">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Dokumen</b></span>
                    </div>
                    <input class="form-control" type="hidden" id="Id">
                    <input type="text" class="form-control" id="_Nama" placeholder="Nama Dokumen + Tahun"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti</b></span>
										</div>
                    <input class="form-control" type="file" id="_Bukti">
                    <input class="form-control" type="hidden" id="_Bukti_">
                  </div>
                </div>
                <div class="col-sm-12">
                  <pre class="text-danger"><b>Bukti Yang Diupload Dalam Format Pdf</b></pre>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="Edit"><b>Simpan <div id="LoadingEdit" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalDokumen">
      <div class="modal-dialog modal-xl">
          <div class="modal-body">
            <embed id="PathData" src="" type="application/pdf" width="100%" height="530"/>
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
		<script>
			jQuery(document).ready(function($) {
        "use strict";
        var BaseURL = '<?=base_url()?>'

        $(document).on("click",".Data",function(){
					var Path = $(this).attr('Data')
          $('#PathData').attr('src',Path)		
          $('#ModalDokumen').modal("show")
        }) 
        
        $('#TabelPrestasiMahasiswa').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [ 5, 10, 20, 30 ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
        })

        $(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
          var Pisah = Data.split("|")
          $("#Id").val(Pisah[0])
					$("#_Nama").val(Pisah[1])
					$("#_Bukti_").val(Pisah[2])
					$('#_ModalData').modal("show")
        })

        $(document).on("click",".Hapus",function(){
					var Data = $(this).attr('Hapus')
					var Pisah = Data.split("|");
					var Hapus = {Id: Pisah[0],Bukti: Pisah[1]}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?"); 
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Dashboard/HapusDokumen", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/DokumenEvaluasi"
							} else {
								alert(Respon)
							}
						})
					}
				})
        
        $("#Edit").click(function() {
          if ($("#_Nama").val() == "" ) {
            alert('Mohon Input Nama Dokumen!')
          } else if (!$('#_Bukti')[0].files[0] == false && $('#_Bukti')[0].files[0].type != "application/pdf") {
						alert('Input Dokumen Wajib Pdf!')
					} else {
            $("#Edit").attr("disabled", true);                              
            $("#LoadingEdit").show();
            var fd = new FormData()
            fd.append('Id',$("#Id").val())
            fd.append('NamaDokumen',$("#_Nama").val())
            fd.append("_Bukti", $('#_Bukti_').val())
            fd.append("Bukti", $('#_Bukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Dashboard/EditDokumen',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Data Berhasi Di Update!')
									window.location = BaseURL + "Dashboard/DokumenEvaluasi"
								}
								else {
                  alert(Respon)
                  $("#Edit").attr("disabled", false);                              
                  $("#LoadingEdit").hide();
								}
							}
						})
          }
        })

        $("#Input").click(function() {
          if ($("#Nama").val() == "" ) {
            alert('Mohon Input Nama Dokumen!')
          } else if (!$('#Bukti')[0].files[0] || $('#Bukti')[0].files[0].type != "application/pdf") {
						alert('Input Dokumen Wajib Pdf!')
					} else {
            $("#Input").attr("disabled", true);                              
            $("#LoadingInput").show();
            var fd = new FormData()
						fd.append('NamaDokumen',$("#Nama").val())
            fd.append("Bukti", $('#Bukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Dashboard/InputDokumen',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Dashboard/DokumenEvaluasi"
								}
								else {
                  alert(Respon)
                  $("#LoadingInput").hide();
                  $("#Input").attr("disabled", false);
								}
							}
						})
          }
        })
			})
		</script>
  </body>
</html>