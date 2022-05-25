							<div class="row">
								<div class="col-sm-12">
									<a href="<?=base_url('Panduan/FormPersetujuanJudulProposal.doc')?>" class="btn btn-sm border-light btn-sm btn-primary"><i class="fa fa-file-word-o"> <b>Form Persetujuan Judul Proposal</b></i></a>  
									<?php if ($Mhs['DraftProposal'] == "") { ?>
										<button type="button" class="btn btn-sm btn-primary border-white" data-toggle="modal" data-target="#ModalInputProposal"><b>Ajukan Dosen Pembimbing</b></button>
									<?php } else { ?>
										<button Edit="<?=$Mhs['NIM']."|".$Mhs['Nama']."|".$Mhs['Gender']."|".$Mhs['Alamat']."|".$Mhs['HP']."|".$Mhs['Konsentrasi']."|".$Mhs['JudulProposal']."|".$Mhs['DraftProposal']."|".$Mhs['KRS']."|".$Mhs['Transkrip']."|".$Mhs['PersetujuanJudul']?>" class="btn btn-sm btn-warning border-light Edit text-white"><i class="fa fa-edit"> <b>Edit Data Proposal</b></i></button>
									<?php } ?>
									<?php if ($Mhs['StatusProposal'] == 'Disetujui Pembimbing') { ?>
										<a href="<?=base_url('Mhs/PersetujuanPembimbing')?>" class="btn btn-sm border-light btn-sm btn-danger"><i class="fa fa-file-pdf-o"> <b>Persetujuan Pembimbing</b></i></a>  
									<?php } ?>
									<div class="card-header bg-danger text-light">
										<b>Status Pengajuan Dosen Pembimbing</b>
									</div>
									<div class="card-body border border-light bg-warning p-2">
										<div class="table-responsive">
											<table class="table table-bordered bg-danger text-white mb-0">
												<thead>
													<tr>
														<th scope="col">Judul Proposal</th>
														<th scope="col" style="width: 7%;text-align: center;">Tanggal</th>
														<th scope="col" style="width: 15%;">Status</th>
														<th scope="col" style="width: 10%;text-align: center;">Data</th>
														<th scope="col" style="width: 25%;">Dosen Pembimbing</th>
													</tr>
												</thead>
												<tbody class="bg-primary">
													<?php if ($Mhs['DraftProposal'] != "") { ?>
														<tr>
															<td style="vertical-align: middle;"><?=$Mhs['JudulProposal']?></td>
															<td style="vertical-align: middle;text-align: center;"><?=$Mhs['TanggalProposal']?></td>
															<td style="vertical-align: middle;"><?=$Mhs['StatusProposal']?></td>
															<td style="text-align: center;">
																<button LihatPersetujuanJudul="<?=base_url('Proposal/'.$Mhs['PersetujuanJudul'])?>" class="btn btn-sm btn-primary border-light LihatPersetujuanJudul"><i class="fa fa-file-pdf-o"></i></button>  
																<button LihatKRS="<?=base_url('Proposal/'.$Mhs['KRS'])?>" class="btn btn-sm btn-warning border-light LihatKRS"><i class="fa fa-file-pdf-o"></i></button>  
																<button LihatTranskrip="<?=base_url('Proposal/'.$Mhs['Transkrip'])?>" class="btn btn-sm btn-success border-light LihatTranskrip"><i class="fa fa-file-pdf-o"></i></button>  
																<button LihatProposal="<?=base_url('Proposal/'.$Mhs['DraftProposal'])?>" class="btn btn-sm btn-danger border-light LihatProposal"><i class="fa fa-file-pdf-o"></i></button>  
															</td>
															<td style="vertical-align: middle;">
																<?php if ($Mhs['StatusProposal'] == 'Disetujui Pembimbing') { echo $Mhs['NamaPembimbing']; }?>
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
									<?php if ($Mhs['StatusProposal'] == 'Disetujui Pembimbing') { ?>
										<button type="button" class="btn btn-sm btn-primary border-white mt-2" data-toggle="modal" data-target="#ModalInputBimbingan"><i class="fa fa-plus"><b> Input Kartu Bimbingan</b></i></button>
									<?php } ?>
									<?php if (count($Bimbingan) > 0) { ?>
										<a href="<?=base_url('Mhs/KartuBimbingan')?>" class="btn btn-sm border-light btn-sm btn-danger mt-2"><i class="fa fa-file-pdf-o"> <b>Kartu Bimbingan</b></i></a>  
									<?php } ?>
									<div class="card-header bg-danger text-light mt-2">
										<b>Status Bimbingan Skripsi</b>
									</div>
									<div class="card-body border border-light bg-warning p-2">
										<div class="table-responsive">
											<table class="table table-bordered bg-primary text-white mb-0">
												<thead>
													<tr>
													<th scope="col" style="width: 4%;text-align: center;vertical-align: middle;">No</th>
														<th scope="col" style="width: 10%;text-align: center;vertical-align: middle;">Tanggal Bimbingan</th>
														<th scope="col" style="width: 30%;vertical-align: middle;">Masalah Yang Dibicarakan</th>
														<th scope="col" style="width: 23%;vertical-align: middle;">Catatan Mahasiswa</th>
														<th scope="col" style="width: 23%;vertical-align: middle;">Catatan Dosen</th>
														<th scope="col" style="width: 10%;text-align: center;vertical-align: middle;">Data</th>
													</tr>
												</thead>
												<tbody class="bg-danger">
													<?php $No = 1; foreach ($Bimbingan as $key) { ?>
														<tr>
															<td style="vertical-align: middle;text-align: center;"><?=$No++?></td>
															<td style="vertical-align: middle;"><?=$key['TanggalBimbingan']?></td>
															<td style="vertical-align: middle;"><?=$key['PoinBimbingan']?></td>
															<td style="vertical-align: middle;"><?=$key['CatatanMahasiswa']?></td>
															<td style="vertical-align: middle;"><?=$key['CatatanDosen']?></td>
															<td style="text-align: center;vertical-align: middle;">
																<?php if ($key['CatatanDosen'] == "") { ?>
																	<button EditBimbingan="<?=$key['Id'].'|'.$key['TanggalBimbingan'].'|'.$key['PoinBimbingan'].'|'.$key['CatatanMahasiswa'].'|'.$key['CatatanDosen'].'|'.$key['FileBimbingan']?>" class="btn btn-sm btn-warning border-light EditBimbingan"><i class="fa fa-edit"></i></button>
																	<button HapusBimbingan="<?=$key['Id'].'|'.$key['FileBimbingan']?>" class="btn btn-sm btn-danger border-light HapusBimbingan"><i class="fa fa-trash"></i></button>
																<?php } ?>
																	<button LihatFileBimbingan="<?=base_url('Proposal/'.$key['FileBimbingan'])?>" class="btn btn-sm btn-primary border-light LihatFileBimbingan"><i class="fa fa-file-pdf-o"></i></button>  
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
        <!-- /page content -->
      </div>
		</div>
		<style type="text/css">
			.input-group{margin-bottom: 3px;}
		</style>
		<div class="modal fade" id="ModalInputProposal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Pengajuan Dosen Pembimbing Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NIM" value="<?=$this->session->userdata('NIM')?>" disabled>
													</div>
												</div>
												<div class="col-lg-8">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Nama" value="<?=$this->session->userdata('Nama')?>">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Jenis Kelamin</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Gender">								
															<option value="Laki-Laki">Laki-Laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="col-lg-8"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Alamat</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Alamat">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Telpon/HP</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="HP">
													</div>
												</div>
												<div class="col-lg-8"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Konsentrasi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Konsentrasi">										
															<option value="Perencanaan Pembangunan">Perencanaan Pembangunan</option>
															<option value="Ekonomi Publik">Ekonomi Publik</option>
															<option value="Ekonomi Moneter & Perbankan">Ekonomi Moneter & Perbankan</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Judul Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="JudulProposal">
													</div>
												</div>
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Form Persetujuan Judul Proposal</b></span>
														</div>
														<input class="form-control" type="file" id="PersetujuanJudul">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Form Persetujuan Judul Proposal Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload KRS</b></span>
														</div>
														<input class="form-control" type="file" id="KRS">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload KRS Yang Telah Memprogram Skripsi Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Transkrip Nilai</b></span>
														</div>
														<input class="form-control" type="file" id="Transkrip">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Transkrip Nilai Dalam Format Pdf (Tidak Boleh Ada Nilai E & Nilai D/D+ Maksimal 2)</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Draft Proposal</b></span>
														</div>
														<input class="form-control" type="file" id="DraftProposal">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Draft Proposal Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="InputProposal"><b>AJUKAN&nbsp;<div id="LoadingInput" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalEditProposal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Edit Form Pengajuan Dosen Pembimbing Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_NIM" value="<?=$this->session->userdata('NIM')?>" disabled>
													</div>
												</div>
												<div class="col-lg-8">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_Nama" value="<?=$this->session->userdata('Nama')?>">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Jenis Kelamin</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="_Gender">								
															<option value="Laki-Laki">Laki-Laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="col-lg-8"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Alamat</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_Alamat">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Telpon/HP</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_HP">
													</div>
												</div>
												<div class="col-lg-8"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Konsentrasi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="_Konsentrasi">										
															<option value="Perencanaan Pembangunan">Perencanaan Pembangunan</option>
															<option value="Ekonomi Publik">Ekonomi Publik</option>
															<option value="Ekonomi Moneter & Perbankan">Ekonomi Moneter & Perbankan</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Judul Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_JudulProposal">
													</div>
												</div>
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Form Persetujuan Judul Proposal</b></span>
														</div>
														<input class="form-control" type="file" id="_PersetujuanJudul">
														<input class="form-control" type="hidden" id="_PersetujuanJudul_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Form Persetujuan Judul Proposal Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update KRS</b></span>
														</div>
														<input class="form-control" type="file" id="_KRS">
														<input class="form-control" type="hidden" id="_KRS_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload KRS Yang Telah Memprogram Skripsi Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Transkrip Nilai</b></span>
														</div>
														<input class="form-control" type="file" id="_Transkrip">
														<input class="form-control" type="hidden" id="_Transkrip_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Transkrip Nilai Dalam Format Pdf (Tidak Boleh Ada Nilai E & Nilai D/D+ Maksimal 2)</b></pre>
												</div>
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Draft Proposal</b></span>
														</div>
														<input class="form-control" type="file" id="_DraftProposal">
														<input class="form-control" type="hidden" id="_DraftPoposal_">
													</div>
													<pre class="text-danger mb-0"><b>* Update Draft Proposal Jika Ada Perubahan</b></pre>
												</div>  
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="EditProposal"><b>UPDATE&nbsp;<div id="LoadingEdit" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
													<?php $Pisah = explode(" ",$Mhs['StatusProposal']); if ($Pisah[0] == 'Ditolak') { ?>
														<button type="button" class="btn btn-sm btn-danger" id="AjukanProposal"><b>AJUKAN LAGI&nbsp;<div id="LoadingAjukan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalInputBimbingan">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Kartu Bimbingan Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Poin Bimbingan</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="PoinBimbingan">
													</div>
													<pre class="text-danger mb-0"><b>* Poin Singkat Yang Dibahas Saat Bimbingan Skripsi</b></pre>
												</div>
                        <div class="col-lg-12">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Catatan Mahasiswa</b></label>
														</div>
														<textarea class="form-control" id="CatatanMahasiswa" rows="2"></textarea>
													</div>
												</div>
												<div class="col-lg-5">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Bimbingan</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="TanggalBimbingan" value="<?=date('Y-m-d')?>">
													</div>
												</div>
												<div class="col-lg-7">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>File Bimbingan</b></span>
														</div>
														<input class="form-control" type="file" id="FileBimbingan">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload File Bimbingan Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="InputBimbingan"><b>SIMPAN&nbsp;<div id="LoadingInputBimbingan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalEditBimbingan">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Kartu Bimbingan Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Poin Bimbingan</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_PoinBimbingan">
													</div>
												</div>
                        <div class="col-lg-12">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Catatan Mahasiswa</b></label>
														</div>
														<textarea class="form-control" id="_CatatanMahasiswa" rows="2"></textarea>
													</div>
												</div>
												<div class="col-lg-5">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Bimbingan</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="_TanggalBimbingan">
													</div>
												</div>
												<div class="col-lg-7">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update File</b></span>
														</div>
                            <input class="form-control" type="file" id="_FileBimbingan">
                            <input class="form-control" type="hidden" id="_FileBimbingan_">
                            <input class="form-control" type="hidden" id="IdBimbingan">
													</div>
												</div>  
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="EditBimbingan"><b>SIMPAN&nbsp;<div id="LoadingEditBimbingan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalPersetujuanJudul">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathPersetujuanJudul" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
		<div class="modal fade" id="ModalKRS">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathKRS" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalTranskrip">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathTranskrip" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalProposal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathProposal" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalBimbingan">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathBimbingan" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url("vendors/jquery/dist/jquery.min.js")?>"></script>
   	<script src="<?=base_url("vendors/bootstrap/dist/js/bootstrap.bundle.min.js")?>"></script>
		<script src="<?=base_url("build/js/custom.min.js")?>"></script>
		<script>
			$(document).ready(function(){
				var BaseURL = '<?=base_url()?>'  

				$(document).on("click",".LihatPersetujuanJudul",function(){
					var Path = $(this).attr('LihatPersetujuanJudul')
          $('#PathPersetujuanJudul').attr('src',Path)		
          $('#ModalPersetujuanJudul').modal("show")
				}) 
				
				$(document).on("click",".LihatKRS",function(){
					var Path = $(this).attr('LihatKRS')
          $('#PathKRS').attr('src',Path)		
          $('#ModalKRS').modal("show")
				}) 

        $(document).on("click",".LihatTranskrip",function(){
					var Path = $(this).attr('LihatTranskrip')
          $('#PathTranskrip').attr('src',Path)		
          $('#ModalTranskrip').modal("show")
				}) 
        
        $(document).on("click",".LihatProposal",function(){
					var Path = $(this).attr('LihatProposal')
          $('#PathProposal').attr('src',Path)		
          $('#ModalProposal').modal("show")
				})

				$(document).on("click",".LihatFileBimbingan",function(){
					var Path = $(this).attr('LihatFileBimbingan')
          $('#PathBimbingan').attr('src',Path)		
          $('#ModalBimbingan').modal("show")
				})

				$("#InputProposal").click(function() {
					if ($("#Nama").val() === "") {
						alert('Input Nama Tidak Boleh Kosong!')
					} else if ($("#Alamat").val() === "") {
						alert('Input Alamat Tidak Boleh Kosong!')
					} else if ($("#HP").val() === "") {
						alert('Input Telepon/HP Tidak Boleh Kosong')
					} else if ($("#JudulProposal").val() === "") {
						alert('Input Judul Proposal Tidak Boleh Kosong')
					} else if (!$('#PersetujuanJudul')[0].files[0]) {
						alert('Wajib Input Form Persetujuan Judul Proposal!')
					} else if ($('#PersetujuanJudul')[0].files[0].type != "application/pdf") {
						alert('Input Form Persetujuan Judul Wajib Pdf!')
					} else if (!$('#KRS')[0].files[0]) {
						alert('Wajib Input KRS!')
					} else if ($('#KRS')[0].files[0].type != "application/pdf") {
						alert('Input KRS Wajib Pdf!')
					} else if (!$('#Transkrip')[0].files[0]) {
						alert('Wajib Input Transkrip!')
					} else if ($('#Transkrip')[0].files[0].type != "application/pdf") {
						alert('Input Transkrip Wajib Pdf!')
					} else if (!$('#DraftProposal')[0].files[0]) {
						alert('Wajib Input Draft Proposal!')
					} else if ($('#DraftProposal')[0].files[0].type != "application/pdf") {
						alert('Input Draft Proposal Wajib Pdf!')
					} else {
						var fd = new FormData()
						fd.append('Nama',$("#Nama").val())
						fd.append('Gender',$("#Gender").val())
						fd.append('Alamat',$("#Alamat").val())
						fd.append('HP',$("#HP").val())
						fd.append('Konsentrasi',$("#Konsentrasi").val())
						fd.append('JudulProposal',$("#JudulProposal").val())
						fd.append("PersetujuanJudul",$('#PersetujuanJudul')[0].files[0])
						fd.append("KRS",$('#KRS')[0].files[0])
						fd.append("Transkrip",$('#Transkrip')[0].files[0])
						fd.append("DraftProposal",$('#DraftProposal')[0].files[0])
						$.ajax({
							url: BaseURL+'Mhs/InputProposal',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#InputProposal").attr("disabled", true);                              
								$("#LoadingInput").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/DosPem"
								}
								else {
									alert(Respon)
									$("#LoadingInput").hide();
									$("#InputProposal").attr("disabled", false);                              
								}
							}
						})
					}
				})

				$(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("|")
					$("#_NIM").val(Pisah[0])
					$("#_Nama").val(Pisah[1])
					$("#_Gender").val(Pisah[2])
					$("#_Alamat").val(Pisah[3])
					$("#_HP").val(Pisah[4])
					$("#_Konsentrasi").val(Pisah[5])
					$("#_JudulProposal").val(Pisah[6])
					$("#_DraftPoposal_").val(Pisah[7])
					$("#_KRS_").val(Pisah[8])
					$("#_Transkrip_").val(Pisah[9])
					$("#_PersetujuanJudul_").val(Pisah[10])
					$('#ModalEditProposal').modal("show")
				})
				
				$("#EditProposal").click(function() {
					if ($("#_Nama").val() === "") {
						alert('Input Nama Tidak Boleh Kosong!')
					} else if ($("#_Alamat").val() === "") {
						alert('Input Alamat Tidak Boleh Kosong!')
					} else if ($("#_HP").val() === "") {
						alert('Input Telepon/HP Tidak Boleh Kosong')
					} else if ($("#_JudulProposal").val() === "") {
						alert('Input Judul Proposal Tidak Boleh Kosong')
					} else if (!$('#_PersetujuanJudul')[0].files[0] == false && $('#_PersetujuanJudul')[0].files[0].type != "application/pdf") {
						alert('Update Form Persetujuan Judul Proposal Wajib Pdf!')
					} else if (!$('#_KRS')[0].files[0] == false && $('#_KRS')[0].files[0].type != "application/pdf") {
						alert('Update KRS Wajib Pdf!')
					} else if (!$('#_Transkrip')[0].files[0] == false && $('#_Transkrip')[0].files[0].type != "application/pdf") {
						alert('Update Transkrip Wajib Pdf!')
					} else if (!$('#_DraftProposal')[0].files[0] == false && $('#_DraftProposal')[0].files[0].type != "application/pdf") {
						alert('Update Draft Proposal Wajib Pdf!')
					} else {
						var fd = new FormData()
						fd.append('Nama',$("#_Nama").val())
						fd.append('Gender',$("#_Gender").val())
						fd.append('Alamat',$("#_Alamat").val())
						fd.append('HP',$("#_HP").val())
						fd.append('Konsentrasi',$("#_Konsentrasi").val())
						fd.append('JudulProposal',$("#_JudulProposal").val())
						if (!$('#_PersetujuanJudul')[0].files[0] == false) {
							fd.append("PersetujuanJudul",$('#_PersetujuanJudul')[0].files[0])
							fd.append('_PersetujuanJudul_',$("#_PersetujuanJudul_").val())
						}
						if (!$('#_KRS')[0].files[0] == false) {
							fd.append("KRS",$('#_KRS')[0].files[0])
							fd.append('_KRS_',$("#_KRS_").val())
						}
						if (!$('#_Transkrip')[0].files[0] == false) {
							fd.append("Transkrip",$('#_Transkrip')[0].files[0])
							fd.append('_Transkrip_',$("#_Transkrip_").val())
						}
						if (!$('#_DraftProposal')[0].files[0] == false) {
							fd.append("DraftProposal",$('#_DraftProposal')[0].files[0])
							fd.append('_DraftPoposal_',$("#_DraftPoposal_").val())
						}
						$.ajax({
							url: BaseURL+'Mhs/EditProposal',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#EditProposal").attr("disabled", true);                              
								$("#LoadingEdit").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/DosPem"
								}
								else {
									alert(Respon)
									$("#LoadingEdit").hide();
									$("#EditProposal").attr("disabled", false);                              
								}
							}
						})
					}
				})

				$("#AjukanProposal").click(function() {
					if ($("#_Nama").val() === "") {
						alert('Input Nama Tidak Boleh Kosong!')
					} else if ($("#_Alamat").val() === "") {
						alert('Input Alamat Tidak Boleh Kosong!')
					} else if ($("#_HP").val() === "") {
						alert('Input Telepon/HP Tidak Boleh Kosong')
					} else if ($("#_JudulProposal").val() === "") {
						alert('Input Judul Proposal Tidak Boleh Kosong')
					} else if (!$('#_PersetujuanJudul')[0].files[0] == false && $('#_PersetujuanJudul')[0].files[0].type != "application/pdf") {
						alert('Update Form Persetujuan Judul Proposal Wajib Pdf!')
					} else if (!$('#_KRS')[0].files[0] == false && $('#_KRS')[0].files[0].type != "application/pdf") {
						alert('Update KRS Wajib Pdf!')
					} else if (!$('#_Transkrip')[0].files[0] == false && $('#_Transkrip')[0].files[0].type != "application/pdf") {
						alert('Update Transkrip Wajib Pdf!')
					} else if (!$('#_DraftProposal')[0].files[0] == false && $('#_DraftProposal')[0].files[0].type != "application/pdf") {
						alert('Update Draft Proposal Wajib Pdf!')
					} else {
						var fd = new FormData()
						fd.append('Nama',$("#_Nama").val())
						fd.append('Gender',$("#_Gender").val())
						fd.append('Alamat',$("#_Alamat").val())
						fd.append('HP',$("#_HP").val())
						fd.append('Konsentrasi',$("#_Konsentrasi").val())
						fd.append('JudulProposal',$("#_JudulProposal").val())
						if (!$('#_PersetujuanJudul')[0].files[0] == false) {
							fd.append("PersetujuanJudul",$('#_PersetujuanJudul')[0].files[0])
							fd.append('_PersetujuanJudul_',$("#_PersetujuanJudul_").val())
						}
						if (!$('#_KRS')[0].files[0] == false) {
							fd.append("KRS",$('#_KRS')[0].files[0])
							fd.append('_KRS_',$("#_KRS_").val())
						}
						if (!$('#_Transkrip')[0].files[0] == false) {
							fd.append("Transkrip",$('#_Transkrip')[0].files[0])
							fd.append('_Transkrip_',$("#_Transkrip_").val())
						}
						if (!$('#_DraftProposal')[0].files[0] == false) {
							fd.append("DraftProposal",$('#_DraftProposal')[0].files[0])
							fd.append('_DraftPoposal_',$("#_DraftPoposal_").val())
						}
						$.ajax({
							url: BaseURL+'Mhs/AjukanProposal',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#AjukanProposal").attr("disabled", true);                              
								$("#LoadingAjukan").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/DosPem"
								}
								else {
									alert(Respon)
									$("#LoadingAjukan").hide();
									$("#AjukanProposal").attr("disabled", false);                              
								}
							}
						})
					}
				})
				
				$("#InputBimbingan").click(function() {
					if ($("#PoinBimbingan").val() === "") {
						alert('Input Poin Bimbingan Tidak Boleh Kosong!')
					} else if ($("#TanggalBimbingan").val() === "") {
						alert('Input Tanggal Bimbingan Tidak Boleh Kosong!')
					} else if (!$('#FileBimbingan')[0].files[0]) {
						alert('Wajib Input File Bimbingan!')
					} else if ($('#FileBimbingan')[0].files[0].type != "application/pdf") {
						alert('Input File Bimbingan Wajib Pdf!')
					} else {
						var fd = new FormData()						
						fd.append('DosenPembimbing','<?=$Mhs['NIPPembimbing']?>')
						fd.append('PoinBimbingan',$("#PoinBimbingan").val())
						fd.append('CatatanMahasiswa',$("#CatatanMahasiswa").val())
						fd.append('TanggalBimbingan',$("#TanggalBimbingan").val())
						fd.append("FileBimbingan",$('#FileBimbingan')[0].files[0])
						$.ajax({
							url: BaseURL+'Mhs/InputBimbingan',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#InputBimbingan").attr("disabled", true);                              
								$("#LoadingInputBimbingan").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/DosPem"
								}
								else {
									alert(Respon)
									$("#LoadingInputBimbingan").hide();
									$("#InputBimbingan").attr("disabled", false);                              
								}
							}
						})
					}
				})

				$("#EditBimbingan").click(function() {
					if ($("#_PoinBimbingan").val() === "") {
						alert('Input Poin Bimbingan Tidak Boleh Kosong!')
					} else if ($("#_TanggalBimbingan").val() === "") {
						alert('Input Tanggal Bimbingan Tidak Boleh Kosong!')
					} else if (!$('#_FileBimbingan')[0].files[0] == false && $('#_FileBimbingan')[0].files[0].type != "application/pdf") {
						alert('Update File Bimbingan Wajib Pdf!')
					} else {
						var fd = new FormData()
						fd.append('Id',$("#IdBimbingan").val())
						fd.append('PoinBimbingan',$("#_PoinBimbingan").val())
						fd.append('CatatanMahasiswa',$("#_CatatanMahasiswa").val())
						fd.append('TanggalBimbingan',$("#_TanggalBimbingan").val())
						if (!$('#_KRS')[0].files[0] == false) {
							fd.append("FileBimbingan",$('#_FileBimbingan')[0].files[0])
							fd.append('_FileBimbingan_',$("#_FileBimbingan_").val())
						}
						$.ajax({
							url: BaseURL+'Mhs/EditBimbingan',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#EditBimbingan").attr("disabled", true);                              
								$("#LoadingEditBimbingan").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/DosPem"
								}
								else {
									alert(Respon)
									$("#LoadingEditBimbingan").hide();
									$("#EditBimbingan").attr("disabled", false);                              
								}
							}
						})
					}
				})

				$(document).on("click",".EditBimbingan",function(){
					var Data = $(this).attr('EditBimbingan')
					var Pisah = Data.split("|")
					$("#IdBimbingan").val(Pisah[0])
					$("#_TanggalBimbingan").val(Pisah[1])
					$("#_PoinBimbingan").val(Pisah[2])
					$("#_CatatanMahasiswa").val(Pisah[3])
					$("#_FileBimbingan_").val(Pisah[5])
					$('#ModalEditBimbingan').modal("show")
				})

				$(document).on("click",".HapusBimbingan",function(){
					var Data = $(this).attr('HapusBimbingan')
					var Pisah = Data.split("|");
					var Hapus = {Id: Pisah[0],FileBimbingan: Pisah[1]}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?"); 
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Mhs/HapusBimbingan", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Mhs/DosPem"
							} else {
								alert(Respon)
							}
						})
					}
				})

			})
		</script>
  </body>
</html>