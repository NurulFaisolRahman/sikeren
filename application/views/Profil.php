    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
			<div class="card mt-2">
				<div class="card-header bg-primary">
					<b>Profil</b>
				</div>
				<div class="card-body border border-primary">
					<div class="container bg-light">
						<div class="row">
							<div class="col-sm-4 my-2 text-center">
								<?php if ($Profil['Foto'] == '') { ?>
									<img src="<?=base_url('img/Avatar.png')?>" width="230px">
								<?php	} else { ?>
									<img src="<?=base_url('FotoDosen/'.$Profil['Foto'])?>" width="230px">
								<?php } ?>
								<div class="input-group input-group-sm my-2">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><b>Upload Foto Profil</b></span>
									</div>
									<input class="form-control" type="hidden" id="NamaFoto" value="<?=$Profil['Foto']?>">
									<input class="form-control" type="file" id="Foto" onchange="Upload()">
								</div>
								<button class="btn btn-sm btn-success text-white" data-toggle="modal" data-target="#ModalEditPassword"><b>Ganti Password</b></button>
								<button class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#ModalEditProfil"><b>Edit Profil</b></button>
								<?php if ($Profil['Sertifikat'] != "") { ?>
									<button LihatSertifikat="<?=base_url('DTPS/'.$Profil['Sertifikat'])?>" class="btn btn-sm btn-danger LihatSertifikat"><b>Sertifikat</b></i></button>  
								<?php } ?>
								<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditPejabat"><b>Pejabat PO-PAK</b></button>
								<div class="table-responsive my-2">
									<table class="table table-bordered table-striped">
										<thead class="bg-danger">
											<tr style="font-size: 12px;" class="text-center align-middle">
												<th style="width: 3%;" class="py-2">No</th>
												<th style="width: 25%;" class="py-2">Bidang</th>
												<th style="width: 20%;" class="py-2">Kredit</th>
												<th style="width: 20%;" class="py-2">Persentase</th>
												<th style="width: 20%;" class="py-2">Minimal</th>
											</tr>
										</thead>
										<tbody>
											<?php $Total = array_sum($KreditBidang)==0?1:array_sum($KreditBidang); ?>
											<tr style="font-size: 12px;" class="text-center align-middle font-weight-bold">	
												<td class="py-1">1</td>
												<td class="py-1" style="text-align: left;">PENDIDIKAN</td>
												<td class="py-1"><?=number_format($KreditBidang[3],2)?></td>
												<td class="py-1 <?=number_format($KreditBidang[3]/$Total*100,2)<45?'text-danger':'text-success';?>"><?=array_sum($KreditBidang)==0?'0%':number_format($KreditBidang[3]/array_sum($KreditBidang)*100,2).'%';?></td>
												<td class="py-1">45%</td>
											</tr>
											<tr style="font-size: 12px;" class="text-center align-middle font-weight-bold">	
												<td class="py-1">2</td>
												<td class="py-1" style="text-align: left;">PENELTIAN</td>
												<td class="py-1"><?=number_format($KreditBidang[0],2)?></td>
												<td class="py-1 <?=number_format($KreditBidang[0]/$Total*100,2)<35?'text-danger':'text-success';?>"><?=array_sum($KreditBidang)==0?'0%':number_format($KreditBidang[0]/array_sum($KreditBidang)*100,2).'%';?></td>
												<td class="py-1">35%</td>
											</tr>
											<tr style="font-size: 12px;" class="text-center align-middle font-weight-bold">	
												<td class="py-1">3</td>
												<td class="py-1" style="text-align: left;">PENGABDIAN</td>
												<td class="py-1"><?=number_format($KreditBidang[1],2)?></td>
												<td class="py-1 <?=number_format($KreditBidang[1]/$Total*100,2)<10?'text-danger':'text-success';?>"><?=array_sum($KreditBidang)==0?'0%':number_format($KreditBidang[1]/array_sum($KreditBidang)*100,2).'%';?></td>
												<td class="py-1">10%</td>
											</tr>
											<tr style="font-size: 12px;" class="text-center align-middle font-weight-bold">	
												<td class="py-1">4</td>
												<td class="py-1" style="text-align: left;">PENUNJANG</td>
												<td class="py-1"><?=number_format($KreditBidang[2],2)?></td>
												<td class="py-1 <?=number_format($KreditBidang[2]/$Total*100,2)<10?'text-danger':'text-success';?>"><?=array_sum($KreditBidang)==0?'0%':number_format($KreditBidang[2]/array_sum($KreditBidang)*100,2).'%';?></td>
												<td class="py-1">10%</td>
											</tr>
											<tr style="font-size: 12px;" class="text-center align-middle font-weight-bold">	
												<td class="py-1" colspan="2">Jumlah Kredit</td>
												<td class="py-1"><?=number_format(array_sum($KreditBidang),2)?></td>
												<td class="py-1">100%</td>
												<td class="py-1">100%</td>
											</tr>
										</tbody>
									</table>
								</div> 
							</div>
							<div class="col-sm-8 mt-2">
								<div class="row">
									<div class="col-sm-4 mt-2">
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>NIP</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['NIP']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>NIDN</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['NIDN']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Jenis Kelamin</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Gender']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<label class="input-group-text bg-primary"><b>Jabatan</b></label>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Jabatan']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Whatsapp</b></span>
											</div>
											<input type="text" class="form-control" value="<?='0'.$Profil['WA']?>" disabled>
										</div>
									</div>
									<div class="col-sm-8 mt-2">
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Nama</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Nama']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Nomor Seri Kartu Pegawai</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['KarPeg']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Tempat dan Tanggal Lahir</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Kelahiran']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<label class="input-group-text bg-primary"><b>Pangkat</b></label>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Pangkat']?>" disabled>
											<div class="input-group-prepend">
												<label class="input-group-text bg-primary"><b>Golongan</b></label>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Golongan']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Kredit Yang Belum Divalidasi Asesor</b></span>
											</div>
											<input type="text" class="form-control" value="<?=str_replace('.',',',number_format($KreditBaru,2))?>" disabled>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Semester</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Semester']?>" disabled>
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Tahun</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['Tahun']?>" disabled>
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Kredit Yang Telah Divalidasi Asesor</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['KreditLama']?>" disabled>
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Total Kredit</b></span>
											</div>
											<input type="text" class="form-control" value="<?=str_replace('.',',',number_format(($Profil['KreditLama']+$KreditBaru),2))?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Magister</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['S2']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Doktor</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['S3']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Bidang Keahlian</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['BidangKeahlian']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<label class="input-group-text bg-primary text-wrap"><b>Kesesuaian Bidang Keahlian dengan Kompetensi Inti Program Studi</b></label>
											</div>
											<input type="text" class="form-control" value="<?= $Profil['KesesuaianKompetensi'] == null ? '' : ($Profil['KesesuaianKompetensi'] == 1 ? 'Sesuai' : 'Tidak Sesuai');?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<label class="input-group-text bg-primary text-wrap"><b>Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</b></label>
											</div>
											<input type="text" class="form-control" value="<?= $Profil['KesesuaianBidang'] == null ? '' : ($Profil['KesesuaianBidang'] == 1 ? 'Sesuai' : 'Tidak Sesuai');?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<label class="input-group-text bg-primary"><b>Sertifikat Pendidik Profesional</b></label>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['SertifikatPendidik']?>" disabled>
										</div>
										<div class="input-group input-group-sm mb-2">
											<div class="input-group-prepend">
												<span class="input-group-text bg-primary"><b>Sertifikat Kompetensi/Profesi/Industri</b></span>
											</div>
											<input type="text" class="form-control" value="<?=$Profil['SertifikatKompetensi']?>" disabled>
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
		<div class="modal fade" id="ModalEditPejabat">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
						<?php 
							$Profil['Rektor'] == "" ? $Rektor = array("","") : $Rektor = explode("|",$Profil['Rektor']);
							$Profil['KetuaPAK'] == "" ? $KetuaPAK = array("","") : $KetuaPAK = explode("|",$Profil['KetuaPAK']);
							$Profil['Dekan'] == "" ? $Dekan = array("","") : $Dekan = explode("|",$Profil['Dekan']);
							$Profil['WakilDekan'] == "" ? $WakilDekan = array("","","","") : $WakilDekan = explode("|",$Profil['WakilDekan']);
						?>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Rektor</b></span>
							</div>
							<input type="text" class="form-control" id="Rektor" placeholder="Nama + Gelar" value="<?=$Rektor[0]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Nomor Induk Pegawai / NIP</b></span>
							</div>
							<input type="text" class="form-control" id="NipRektor" value="<?=$Rektor[1]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Ketua Tim Penilai Angka Kredit</b></span>
							</div>
							<input type="text" class="form-control" id="KetuaPAK" placeholder="Nama + Gelar" value="<?=$KetuaPAK[0]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Nomor Induk Pegawai / NIP</b></span>
							</div>
							<input type="text" class="form-control" id="NipKetuaPAK" value="<?=$KetuaPAK[1]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Dekan</b></span>
							</div>
							<input type="text" class="form-control" id="Dekan" placeholder="Nama + Gelar" value="<?=$Dekan[0]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Nomor Induk Pegawai / NIP</b></span>
							</div>
							<input type="text" class="form-control" id="NipDekan" value="<?=$Dekan[1]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Wakil Dekan I</b></span>
							</div>
							<input type="text" class="form-control" id="WakilDekan" placeholder="Nama + Gelar" value="<?=$WakilDekan[0]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Nomor Induk Pegawai / NIP</b></span>
							</div>
							<input type="text" class="form-control" id="NipWakilDekan" value="<?=$WakilDekan[1]?>">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label class="input-group-text bg-primary"><b>Golongan Wakil Dekan I</b></label>
							</div>
							<select class="custom-select" id="GolonganWakilDekan">
								<option value="Penata Muda/IIIa" <?=$WakilDekan[2]=='Penata Muda/IIIa'?'selected':''?>>IIIa</option>
								<option value="Penata Muda Tk. I/IIIb" <?=$WakilDekan[2]=='Penata Muda Tk. I/IIIb'?'selected':''?>>IIIb</option>
								<option value="Penata/IIIc" <?=$WakilDekan[2]=='Penata/IIIc'?'selected':''?>>IIIc</option>
								<option value="Penata Tk. I/IIId" <?=$WakilDekan[2]=='Penata Tk. I/IIId'?'selected':''?>>IIId</option>
								<option value="Pembina/IVa" <?=$WakilDekan[2]=='Pembina/IVa'?'selected':''?>>IVa</option>
								<option value="Pembina Tk. I/IVb" <?=$WakilDekan[2]=='Pembina Tk. I/IVb'?'selected':''?>>IVb</option>
								<option value="Pembina Utama Muda/IVc" <?=$WakilDekan[2]=='Pembina Utama Muda/IVc'?'selected':''?>>IVc</option>
								<option value="Pembina Utama Madya/IVd" <?=$WakilDekan[2]=='Pembina Utama Madya/IVd'?'selected':''?>>IVd</option>
								<option value="Pembina Utama/IVe" <?=$WakilDekan[2]=='Pembina Utama/IVe'?'selected':''?>>IVe</option>
							</select>
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label class="input-group-text bg-primary"><b>Jabatan Wakil Dekan I</b></label>
							</div>
							<select class="custom-select" id="JabatanWakilDekan">
								<option value="Asisten Ahli" <?=$WakilDekan[3]=='Asisten Ahli'?'selected':''?>>Asisten Ahli</option>
								<option value="Lektor" <?=$WakilDekan[3]=='Lektor'?'selected':''?>>Lektor</option>
								<option value="Lektor Kepala" <?=$WakilDekan[3]=='Lektor Kepala'?'selected':''?>>Lektor Kepala</option>
								<option value="Profesor" <?=$WakilDekan[3]=='Profesor'?'selected':''?>>Profesor</option>
							</select>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="NamaPejabat"><b>Simpan</b></button>
          </div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="ModalEditPassword">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary"><b>Password Baru</b></span>
							</div>
							<input type="password" class="form-control" id="EditPassword">
						</div>
					</div>
					<div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="GantiPassword"><b>Simpan</b></button>
          </div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="ModalEditProfil">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
								<div class="col-sm-5">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>NIP</b></span>
                    </div>
                    <input type="text" class="form-control" id="NIP" value="<?=$Profil['NIP']?>" data-inputmask='"mask": "999999999999999999"' data-mask>
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>NIDN</b></span>
                    </div>
                    <input type="text" class="form-control" id="NIDN" value="<?=$Profil['NIDN']?>" data-inputmask='"mask": "9999999999"' data-mask>
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary"><b>Golongan</b></label>
                    </div>
                    <select class="custom-select" id="Golongan">
                      <option value="Penata Muda/IIIa" <?=$Profil['Golongan']=='IIIa'?'selected':''?>>IIIa</option>
                      <option value="Penata Muda Tk. I/IIIb" <?=$Profil['Golongan']=='IIIb'?'selected':''?>>IIIb</option>
                      <option value="Penata/IIIc" <?=$Profil['Golongan']=='IIIc'?'selected':''?>>IIIc</option>
                      <option value="Penata Tk. I/IIId" <?=$Profil['Golongan']=='IIId'?'selected':''?>>IIId</option>
                      <option value="Pembina/IVa" <?=$Profil['Golongan']=='IVa'?'selected':''?>>IVa</option>
                      <option value="Pembina Tk. I/IVb" <?=$Profil['Golongan']=='IVb'?'selected':''?>>IVb</option>
                      <option value="Pembina Utama Muda/IVc" <?=$Profil['Golongan']=='IVc'?'selected':''?>>IVc</option>
                      <option value="Pembina Utama Madya/IVd" <?=$Profil['Golongan']=='IVd'?'selected':''?>>IVd</option>
                      <option value="Pembina Utama/IVe" <?=$Profil['Golongan']=='IVe'?'selected':''?>>IVe</option>
                    </select>
									</div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary"><b>Jabatan</b></label>
                    </div>
                    <select class="custom-select" id="Jabatan">
                      <option value="Asisten Ahli" <?=$Profil['Jabatan']=='Asisten Ahli'?'selected':''?>>Asisten Ahli</option>
                      <option value="Lektor" <?=$Profil['Jabatan']=='Lektor'?'selected':''?>>Lektor</option>
                      <option value="Lektor Kepala" <?=$Profil['Jabatan']=='Lektor Kepala'?'selected':''?>>Lektor Kepala</option>
                      <option value="Profesor" <?=$Profil['Jabatan']=='Profesor'?'selected':''?>>Profesor</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-7">
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama</b></span>
                    </div>
                    <input type="text" class="form-control" id="Nama" value="<?=$Profil['Nama']?>" placeholder="Input Nama + Gelar">
									</div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Kartu Pegawai</b></span>
                    </div>
                    <input type="text" class="form-control" id="KarPeg" value="<?=$Profil['KarPeg']?>" placeholder="Input Nomor Seri Kartu Pegawai">
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nomor Whatsapp</b></span>
										</div>
										<div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>+62</b></span>
                    </div>
                    <input type="text" class="form-control" id="WA" value="<?=$Profil['WA']?>">
									</div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary"><b>Jenis Kelamin</b></label>
                    </div>
                    <select class="custom-select" id="Gender">
                      <option value="Laki-Laki" <?=$Profil['Gender']=='Laki-Laki'?'selected':''?>>Laki-Laki</option>
                      <option value="Perempuan" <?=$Profil['Gender']=='Perempuan'?'selected':''?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tempat dan Tanggal Lahir</b></span>
                    </div>
                    <input type="text" class="form-control" id="Kelahiran" value="<?=$Profil['Kelahiran']?>" placeholder="Contoh : Situbondo 15 Juli 1996">
                  </div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Kredit Yang Divalidasi Asesor</b></span>
                    </div>
                    <input type="text" class="form-control" id="KreditLama" value="<?=$Profil['KreditLama']?>">
										<div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Semester</b></span>
                    </div>
                    <select class="custom-select" id="SemesterKredit">
											<option value="Genap" <?=$Profil['Semester']=='Genap'?'selected':''?>>Genap</option>
											<option value="Ganjil" <?=$Profil['Semester']=='Ganjil'?'selected':''?>>Ganjil</option>
                    </select>
										<div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tahun</b></span>
                    </div>
                    <input type="text" class="form-control" id="TahunKreditLama" value="<?=$Profil['Tahun']?>" data-inputmask='"mask": "9999"' data-mask value="20">
                  </div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Magister</b></span>
                    </div>
                    <input type="text" class="form-control" id="S2" value="<?=$Profil['S2']?>" placeholder="Input Jurusan + Universitas">
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Doktor</b></span>
                    </div>
                    <input type="text" class="form-control" id="S3" value="<?=$Profil['S3']?>" placeholder="Input Jurusan + Universitas">
									</div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bidang Keahlian</b></span>
                    </div>
                    <input type="text" class="form-control" id="BidangKeahlian" value="<?=$Profil['BidangKeahlian']?>">
                  </div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-wrap"><b>Kesesuaian Bidang Keahlian Dengan Kompetensi Inti Program Studi</b></label>
                    </div>
                    <select class="custom-select" id="KesesuaianKompetensi">
                      <option value="1" <?=$Profil['KesesuaianKompetensi']==1?'selected':''?>>Sesuai</option>
                      <option value="2" <?=$Profil['KesesuaianKompetensi']==2?'selected':''?>>Tidak Sesuai</option>
                    </select>
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-wrap"><b>Kesesuaian Bidang Keahlian Dengan Mata Kuliah Yang Diampu</b></label>
                    </div>
                    <select class="custom-select" id="KesesuaianBidang">
											<option value="1" <?=$Profil['KesesuaianBidang']==1?'selected':''?>>Sesuai</option>
                      <option value="2" <?=$Profil['KesesuaianBidang']==2?'selected':''?>>Tidak Sesuai</option>
                    </select>
									</div>
									<div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Sertifikat Pendidik Profesional</b></span> 
                    </div>
                    <input type="text" class="form-control" id="SertifikatPendidik" value="<?=$Profil['SertifikatPendidik']?>" placeholder="Input Nomor Sertifikat">
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Sertifikat Kompetensi/Profesi/Industri</b></span>
                    </div>
                    <input type="text" class="form-control" id="SertifikatKompetensi" value="<?=$Profil['SertifikatKompetensi']?>" placeholder="Input Bidang Sertifikasi & Lembaga Penerbit">
									</div>
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti Sertifikat</b></span>
										</div>
										<input class="form-control" type="hidden" id="SertifikatLama" value="<?=$Profil['Sertifikat']?>">
										<input class="form-control" type="file" id="Sertifikat">
										<div class="input-group-prepend">
											<button class="input-group-text bg-primary" id="CancelSertifikat"><b>X</b></button>
										</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="EditProfil"><b>Simpan</b></button>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathSertifikat" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url('bootstrap/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/popper.min.js')?>" ></script>
    <script src="<?=base_url('bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?=base_url('bootstrap/js/adminlte.min.js')?>"></script>
		<script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script> 
		<script> 
			jQuery(document).ready(function($) {
				"use strict";

				$('[data-mask]').inputmask()

				var BaseURL = '<?=base_url()?>';

				$("#PanduanPAK").click(function() {
          $('#JudulPanduan').html('Panduan PO-PAK')
					$('#PathPanduan').attr('src',BaseURL+'Panduan/PAK.pdf')		
          $('#ModalPanduan').modal("show")
				}) 

				$("#PanduanBKD").click(function() {
          $('#JudulPanduan').html('Panduan BKD')
					$('#PathPanduan').attr('src',BaseURL+'Panduan/BKD.pdf')		
          $('#ModalPanduan').modal("show")
				}) 

				$(document).on("click",".LihatSertifikat",function(){
					var Path = $(this).attr('LihatSertifikat')
          $('#PathSertifikat').attr('src',Path)		
          $('#ModalSertifikat').modal("show")
				}) 
				
				$("#pak").click(function() {
					var Tahun = $('#Tahun').val()
					var Pisah = Tahun.split('-')
					window.location = BaseURL + 'Dashboard/PAK/'+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))
					// var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang']
					// for (let i = 1; i < 5; i++) {
					// 	$.post(BaseURL+"Dashboard"+"/Lampiran/"+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))+'/'+PAK[i-1]).done(function(Respon) {
					// 		var array = JSON.parse(Respon)
					// 		var NomorLampiran = 1
					// 		array.forEach(function(object) {
					// 			if (object.Bukti != null) {
					// 				$('#LampiranPAK').attr('href',BaseURL+PAK[i-1]+'/'+object.Bukti)		
					// 				$('#LampiranPAK').attr('Download','Lampiran '+i+'.'+NomorLampiran+'.pdf') 
					// 				$('#LampiranPAK')[0].click()
					// 			}
					// 			NomorLampiran++;
					// 		})
					// 	}) 	
					// }
				}) 

				$("#CancelSertifikat").click(function() {
					$("#Sertifikat").val("")
				})

				$("#bkd").click(function() {
					var Tahun = $('#Tahun').val()
					var Pisah = Tahun.split('-')
					window.location = BaseURL + 'Dashboard/BKD/'+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))
					// var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang']
					// for (let i = 1; i < 5; i++) {
					// 	$.post(BaseURL+"Dashboard"+"/LampiranBKD/"+$('#Homebase').val()+'/'+$('#Semester').val()+'/'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[0]))+'-'+(isNaN(parseInt(Pisah[0]))? 0 : parseInt(Pisah[1]))+'/'+PAK[i-1]).done(function(Respon) {
					// 		var array = JSON.parse(Respon)
					// 		var NomorLampiran = 1
					// 		array.forEach(function(object) {
					// 			if (object.Bukti != null) {
					// 				$('#LampiranPAK').attr('href',BaseURL+PAK[i-1]+'/'+object.Bukti)		
					// 				$('#LampiranPAK').attr('Download','Lampiran '+i+'.'+NomorLampiran+'.pdf') 
					// 				$('#LampiranPAK')[0].click()
					// 			}
					// 			NomorLampiran++;
					// 		})
					// 	}) 	
					// }
				}) 

				$("#NamaPejabat").click(function() {
					var Data = { Rektor : $("#Rektor").val()+'|'+$("#NipRektor").val(),
											 KetuaPAK : $("#KetuaPAK").val()+'|'+$("#NipKetuaPAK").val(),
											 Dekan : $("#Dekan").val()+'|'+$("#NipDekan").val(),
											 WakilDekan : $("#WakilDekan").val()+'|'+$("#NipWakilDekan").val()+'|'+$("#GolonganWakilDekan").val()+'|'+$("#JabatanWakilDekan").val() }
					$.post(BaseURL+"Dashboard/NamaPejabat", Data).done(function(Respon) {
						if (Respon == '1') {
							alert('Nama Pejabat Berhasil Disimpan!')
							window.location = BaseURL + "Dashboard/Profil"
						}
						else {
							alert(Respon)
						}
					})
				})

				$("#GantiPassword").click(function() {
					if ($("#EditPassword").val() == "") {
						alert('Password Baru Tidak Boleh Kosong!')
					} else {
						var Data = { Password: $("#EditPassword").val() }
						$.post(BaseURL+"Dashboard/GantiPassword", Data).done(function(Respon) {
							if (Respon == '1') {
								alert('Password Berhasil Diganti')
								window.location = BaseURL + "Dashboard/Profil"
							}
							else {
								alert(Respon)
							}
						})
					}
				})

				$("#EditProfil").click(function() {
					if ($("#NIP").val().length != 18 || isNaN($("#NIP").val())) {
            alert('Mohon Isi NIP 18 Angka!')
          } else if ($("#NIDN").val().length != 10 || isNaN($("#NIDN").val())) {
            alert('Mohon Isi NIDN 10 Angka!')
          } else if ($("#WA").val()[0] != '8') {
            alert('Nomor Whatsapp Di Mulai Dari Angka 8 Tanpa 0 Diawal!')
          } else if ($("#Nama").val() === "") {
            alert('Mohon Isi Nama + Gelar!')
          } else if (isNaN(parseFloat($("#KreditLama").val().replace(',','.')))) {
						alert('Kredit Lama Belum Benar!')
					} else {  
						var Pangkat = $("#Golongan").val().split("/") 
						var fd = new FormData()
						fd.append('NIP',$("#NIP").val())
						fd.append('NIDN',$("#NIDN").val())
						fd.append('KarPeg',$("#KarPeg").val())
						fd.append('Nama',$("#Nama").val())
						fd.append('Gender',$("#Gender").val())
						fd.append('Kelahiran',$("#Kelahiran").val())
						fd.append('Pangkat',Pangkat[0])
						fd.append('Golongan',Pangkat[1])
						fd.append('Jabatan',$("#Jabatan").val())
						fd.append('Tahun',parseInt($("#TahunKreditLama").val()))
						fd.append('Semester',$("#SemesterKredit").val())
						fd.append('KreditLama',$("#KreditLama").val())
						fd.append('WA',$("#WA").val())
						fd.append('S2',$("#S2").val())
						fd.append('S3',$("#S3").val())
						fd.append('BidangKeahlian',$("#BidangKeahlian").val())
						fd.append('KesesuaianKompetensi',$("#KesesuaianKompetensi").val())
						fd.append('KesesuaianBidang',$("#KesesuaianBidang").val())
						fd.append('SertifikatPendidik',$("#SertifikatPendidik").val())
						fd.append('SertifikatKompetensi',$("#SertifikatKompetensi").val())
						fd.append("SertifikatLama", $('#SertifikatLama').val())
						fd.append("Sertifikat", $('#Sertifikat')[0].files[0])
						$.ajax({
							url: BaseURL+'Dashboard/EditProfil',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Dashboard/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })
			})

			function Upload() {
				var BaseURL = '<?=base_url()?>';
				var fd = new FormData()
				fd.append("file", $('#Foto')[0].files[0])
				fd.append("NamaFoto", $('#NamaFoto').val())
				$.ajax({
					url: BaseURL+'Dashboard/Foto',
					type: 'post',
					data: fd,
					contentType: false,
					processData: false,
					success: function(Respon){
						if (Respon == '1') {
							window.location = BaseURL + "Dashboard/Profil"
						}
						else {
							alert(Respon)
						}
					}
				})
			}
		</script>
</body>
</html>