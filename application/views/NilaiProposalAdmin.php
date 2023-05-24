<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-12 mt-2">
                      <a class="btn btn-success" href="<?=base_url('Admin/ExcelRekapProposal')?>"><b>Rekap Ujian Proposal</b></a>   
                    </div>
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelUjianSkripsi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 20%;" class="align-middle">Nama</th>
                              <th style="width: 20%;" class="align-middle">Dosen Pembimbing</th>
                              <th class="align-middle">Semester Tahun Ajaran</th>
                              <th style="width: 7%;" class="text-center align-middle">Nilai</th>
                              <th class="align-middle text-center">Rekap File</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($RekapNilai as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle">
                                  <?php $Bulan = explode("-",$key['TanggalUjianProposal']) ;
                                  if (intval($Bulan[1]) < 8) {
                                    if (intval($Bulan[1]) < 2) {
                                      echo 'GANJIL '.(intval($Bulan[0])-1).'/'.intval($Bulan[0]);
                                    } else {
                                      echo 'GENAP '.(intval($Bulan[0])-1).'/'.intval($Bulan[0]);
                                    }
                                  } else {
                                    if (intval($Bulan[1]) < 2) {
                                      echo 'GENAP '.intval($Bulan[0]).'/'.(intval($Bulan[0])+1);
                                    } else {
                                      echo 'GANJIL '.intval($Bulan[0]).'/'.(intval($Bulan[0])+1);
                                    }
                                  }
                                   ?>
                                  </td>
                                <td class="text-center align-middle">
                                  <a href="<?=base_url('Admin/BeritaAcaraUjianProposal/'.$key['NIM'])?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i></a>
                                </td> 
                                <td class="text-center align-middle">
                                  <button Judul="<?=base_url('Proposal/'.$key['PersetujuanJudul'])?>" class="btn btn-sm btn-warning Judul"><i class="fas fa-download"></i></button>  
                                  <button KRS="<?=base_url('Proposal/'.$key['KRS'])?>" class="btn btn-sm btn-primary KRS"><i class="fas fa-download"></i></button>  
                                  <button Transkrip="<?=base_url('Proposal/'.$key['Transkrip'])?>" class="btn btn-sm btn-success Transkrip"><i class="fas fa-download"></i></button>  
                                  <button Bimbingan="<?=base_url('Proposal/'.$key['KartuBimbinganProposal'])?>" class="btn btn-sm btn-info Bimbingan"><i class="fas fa-download"></i></button>  
                                  <button Plagiasi="<?=base_url('Proposal/'.$key['PlagiasiProposal'])?>" class="btn btn-sm btn-danger Plagiasi"><i class="fas fa-download"></i></button>  
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
    <div class="modal fade" id="ModalFile">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathFile" src="" type="application/pdf" width="100%" height="530"/>
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
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
			jQuery(document).ready(function($) {
				"use strict";

        $('#TabelUjianSkripsi').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [[ 5, 10, 20, 30, -1 ],[ 5, 10, 20, 30, "All"]],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
        })
        
        $(document).on("click",".Judul",function(){
					var Path = $(this).attr('Judul')
          $('#PathFile').attr('src',Path)		
          $('#ModalFile').modal("show")
        }) 

        $(document).on("click",".KRS",function(){
					var Path = $(this).attr('KRS')
          $('#PathFile').attr('src',Path)		
          $('#ModalFile').modal("show")
        }) 

        $(document).on("click",".Transkrip",function(){
					var Path = $(this).attr('Transkrip')
          $('#PathFile').attr('src',Path)		
          $('#ModalFile').modal("show")
        }) 

        $(document).on("click",".Bimbingan",function(){
					var Path = $(this).attr('Bimbingan')
          $('#PathFile').attr('src',Path)		
          $('#ModalFile').modal("show")
        }) 

        $(document).on("click",".Plagiasi",function(){
					var Path = $(this).attr('Plagiasi')
          $('#PathFile').attr('src',Path)		
          $('#ModalFile').modal("show")
        }) 

			})
		</script>
  </body>
</html>