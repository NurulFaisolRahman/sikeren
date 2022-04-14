<div class="container-fluid">
	<div class="table-responsive mb-2 mt-2">
		<table id="TabelRencana" class="table table-bordered table-striped">
			<thead class="bg-warning">
				<tr>
					<th class="text-center align-middle">No</th> 
					<th class="text-center align-middle">Homebase</th>
					<th class="text-center align-middle">Semester</th>
					<th class="text-center align-middle">Tahun</th>
					<th class="text-center align-middle">Rencana</th>
					<th class="text-center align-middle">Persentase</th>
					<th class="text-center align-middle">Realisasi</th>
					<th class="text-center align-middle">Status</th>
					<th class="text-center align-middle">Target Kajur</th>
					<th class="text-center align-middle">Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $TotalRencana = $TotalRealisasi = 0; $No = 1; foreach ($Rencana as $key) { ?>
					<tr>	
						<td class="text-center align-middle"><?=$No++?></td>
						<td class="text-center align-middle"><?=$key['Jenjang']?></td>
						<td class="text-center align-middle"><?=$key['Semester']?></td>
						<td class="text-center align-middle"><?=$key['Tahun']?></td>
						<td class="text-center align-middle"><?=str_replace('.',',',$key['TotalKredit'])?></td>
						<td class="text-center align-middle"><?=round(($KreditRealisasi[$No-2]/$key['TargetKajur']*100),2).' %'?></td> 
						<td class="text-center align-middle"><?=str_replace('.',',',$KreditRealisasi[$No-2])?></td>
						<td class="text-center align-middle">
							<?php if ($KreditRealisasi[$No-2] == $key['TargetKajur']) { ?>
								<h4 class="text-primary mt-2"><b>=</b></h4>
								<?php } else if ($KreditRealisasi[$No-2] > $key['TargetKajur']) { ?>
									<h4 class="text-success mt-2"><b>></b></h4>
								<?php } else if ($KreditRealisasi[$No-2] < $key['TargetKajur']) { ?>
									<h4 class="text-danger mt-2"><b><</b></h4>
								<?php } ?>
						</td>
						<td class="text-center align-middle"><?=$key['TargetKajur']?></td>
						<td class="text-center align-middle">                          
							<button EditRencanaPengabdian="<?=$key['No']."/".$key['Jabatan']."/".$key['Jenjang']."/".$key['Semester']."/".$key['Tahun']."/".$key['KodeRencana']."/".$key['TotalKredit']."/".$key['TargetKajur']?>" class="btn btn-sm btn-warning EditRencanaPengabdian"><i class="fas fa-edit"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="ModalEditRencanaPengabdian">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-3 mt-1 mb-1">
								<div class="input-group mb-1">
									<div class="input-group-prepend">
										<label class="input-group-text bg-primary"><b>Homebase</b></label>
									</div>
									<input class="form-control" type="hidden" id="JenjangLama">
									<select class="custom-select" id="EditJenjangRencanaPengabdian" disabled>										
											<option value="S1">S1</option>
											<option value="S2">S2</option>
									</select>
								</div>
							</div> 
							<div class="col-sm-3 mt-1 mb-1">
								<div class="input-group mb-1">
									<div class="input-group-prepend">
										<label class="input-group-text bg-primary"><b>Semester</b></label>
									</div>
									<input class="form-control" type="hidden" id="SemesterLama">
									<select class="custom-select" id="EditSemesterRencanaPengabdian" disabled>										
											<option value="Ganjil">Ganjil</option>
											<option value="Genap">Genap</option>
									</select>
								</div>
							</div> 
							<div class="col-sm-3 mt-1 mb-1">
								<div class="input-group mb-1">
									<div class="input-group-prepend">
										<label class="input-group-text bg-primary"><b>Tahun</b></label>
									</div>
									<input class="form-control" type="hidden" id="NoEditRencana">
									<input class="form-control" type="hidden" id="TargetKajur">
									<input class="form-control" type="hidden" id="TahunLama">
									<input class="form-control" type="text" id="EditTahunRencanaPengabdian"  data-inputmask='"mask": "9999"' data-mask disabled>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="table-responsive mb-2">
									<table id="EditPengabdian" class="table table-bordered border-dark bg-light mb-1">
										<thead>
											<tr>
												<th class='align-middle bg-warning'>No</th>
												<th class='align-middle bg-warning'> Komponen Kegiatan</th>
												<th class='align-middle bg-warning'> Kredit</th>
											</tr>
										</thead>
										<tbody>
                    <tr>
												<td class='text-center'>1</td>
												<td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB1" onchange="EditRencanaPNB1()"> Menduduki jabatan pimpinan pada lembaga pemerintahan / pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester. </label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB1">0</b></td>
											</tr>
                      <tr>
												<td class='text-center'>2</td>
												<td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB2" onchange="EditRencanaPNB2()"> Melaksanakan pengembangan hasil pendidikan, dan penelitian yang dapat dimanfaatkan oleh masyarakat / industry setiap program. </label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB2">0</b></td>
											</tr>
                      <tr>
												<td rowspan="10" class='text-center'>3</td>
												<td class='align-middle'>Memberi latihan / penyuluhan / penataran / ceramah pada masyarakat, terjadwal / terprogram : </td>
												<td></td>
											</tr>
											<tr>
												<td class='align-middle'>1) Dalam satu semester atau lebih : </td>
												<td></td>
											</tr>
											<tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB3" onchange="EditRencanaPNB3()"> a) Tingkat Internasional, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB3">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB4" onchange="EditRencanaPNB4()"> b) Tingkat Nasional, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB4">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB5" onchange="EditRencanaPNB5()"> c) Tingkat Lokal, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB5">0</b></td>
                      </tr>
                      <tr>
												<td class='align-middle'>2) Kurang dari satu semester dan minimal satu bulan </td>
												<td></td>
											</tr>
											<tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB6" onchange="EditRencanaPNB6()"> a) Tingkat Internasional, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB6">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB7" onchange="EditRencanaPNB7()"> b) Tingkat Nasional, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB7">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB8" onchange="EditRencanaPNB8()"> c) Tingkat Lokal, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB8">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB9" onchange="EditRencanaPNB9()"> d) Insidental, tiap kegiatan / program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB9">0</b></td>
                      </tr>
                    </tbody>
									</table>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="table-responsive mb-2">
									<table id="Pengabdian" class="table table-bordered border-dark bg-light mb-1">
										<thead>
											<tr>
												<th class='align-middle bg-warning'>No</th>
												<th class='align-middle bg-warning'> Komponen Kegiatan</th>
												<th class='align-middle bg-warning'> Kredit</th>
											</tr>
										</thead>
										<tbody>
                      <tr>
												<td rowspan="4" class='text-center'>4</td>
												<td class='align-middle'>Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan </td>
												<td></td>
											</tr>
											<tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB10" onchange="EditRencanaPNB10()"> a. Berdasarkan bidang keahlian, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB10">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB11" onchange="EditRencanaPNB11()"> b. Berdasarkan penugasan lembaga terguruan tinggi, tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB11">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB12" onchange="EditRencanaPNB12()"> c. Berdasarkan fungsi / jabatan tiap program</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB12">0</b></td>
                      </tr>
                      <tr>
												<td class='text-center'>5</td>
												<td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB13" onchange="EditRencanaPNB13()"> Membuat / menulis karya pengabdian pada masyarakat yang tidak dipublikasikan, tiap karya </label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB13">0</b></td>
											</tr>
                      <tr>
												<td class='text-center'>6</td>
												<td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB14" onchange="EditRencanaPNB14()"> Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala / jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya </label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB14">0</b></td>
                      </tr>
                      <tr>
												<td rowspan="3" class='text-center'>7</td>
												<td class='align-middle'>Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)* </td>
												<td></td>
											</tr>
											<tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB15" onchange="EditRencanaPNB15()"> a. Editor / dewan penyunting / dewan redaksi jurnal ilmiah internasional </label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB15">0</b></td>
                      </tr>
                      <tr>
                        <td class='align-middle'><label><input type="checkbox" id="EditRencanaPNB16" onchange="EditRencanaPNB16()"> b. Editor / dewan penyunting / dewan redaksi jurnal ilmiah nasional</label></td>
												<td class='text-center align-middle'><b id="EditRencanaKreditPNB16">0</b></td>
                      </tr>
											<tr>
												<td colspan="2" class="text-right">
													<button type="button" id="TombolEditRencanaTotalKredit" class="btn btn-primary"><b>Total</b></button>
												</td>
												<td class="text-center align-middle"><b id="EditRencanaTotalKredit">0</b></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
					<button type="submit" class="btn btn-success" id="SimpanEditRencanaPengabdian"><b>Simpan</b></button>
				</div>
			</div>
		</div>
	</div>
</div>	