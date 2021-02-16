<div class="content-wrapper">
      <!-- Main content --> 
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 mt-2">
                <ul class="nav nav-pills mb-2 border border-warning rounded bg-light" id="pills-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="pills-MonitoringPendidikan-tab" data-toggle="pill" href="#pills-MonitoringPendidikan" role="tab" aria-controls="pills-MonitoringPendidikan" aria-selected="true"><i class="nav-icon fas fa-users"></i><b> Monitoring Pendidikan</b></a>
                  </li>
                </ul>
                <div class="tab-content border border-warning rounded bg-light" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-MonitoringPendidikan" role="tabpanel" aria-labelledby="pills-MonitoringPendidikan-tab">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-4 mt-1 mb-1">       
                          <button type="button" id="TambahTarget" class="btn btn-primary" data-toggle="modal" data-target="#ModalTarget"><i class="fa fa-plus"></i> <b>Target Rencana Dosen</b></button>
                        </div>
                      </div>
                    </div>
                    <div class="container-fluid">
                      <div class="row align-items-center">
                        <div class="col-sm-12 my-2 ">     
                          <div class="table-responsive mb-2">
                            <table id="TabelMonitoringPendidikan" class="table table-bordered table-striped">
                              <thead class="bg-warning">
                                <tr>
                                  <th class="text-center align-middle">No</th>
                                  <th class="align-middle">NIP</th>
                                  <th class="align-middle">Nama</th>
                                  <th class="text-center align-middle">Home<br>base</th>
                                  <th class="text-center align-middle">Seme<br>ster</th>
                                  <th class="text-center align-middle">Tahun</th>
                                  <th class="text-center align-middle">Rencana<br>Dosen</th>
                                  <th class="text-center align-middle">Persen<br>tase</th>
                                  <th class="text-center align-middle">Realisasi<br>Dosen</th> 
                                  <th class="text-center align-middle">Status</th>
                                  <th class="text-center align-middle">Target Kajur</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $No = 1; foreach ($Rencana as $key) { ?>
                                  <tr>	
                                    <td class="text-center align-middle"><?=$No++?></td>
                                    <td class="align-middle"><?=$key['NIP']?></td>
                                    <td class="align-middle"><?=$Dosen[$No-2]['Nama']?></td>
                                    <td class="text-center align-middle"><?=$key['Jenjang']?></td>
                                    <td class="text-center align-middle"><?=$key['Semester']?></td>
                                    <td class="text-center align-middle"><?=$key['Tahun']?></td>
                                    <td class="text-center align-middle"><?=$key['TotalKredit']?></td>
                                    <td class="text-center align-middle"><?=round(($Realisasi[$No-2]/$key['TargetKajur']*100),2).' %'?></td> 
                                    <td class="text-center align-middle"><?=$Realisasi[$No-2]?></td>
                                    <td class="text-center align-middle">
                                      <?php if ($Realisasi[$No-2] == $key['TargetKajur']) { ?>
                                        <h4 class="text-primary mt-2"><b>=</b></h4>
                                        <?php } else if ($Realisasi[$No-2] > $key['TargetKajur']) { ?>
                                          <h4 class="text-success mt-2"><b>></b></h4>
                                        <?php } else if ($Realisasi[$No-2] < $key['TargetKajur']) { ?>
                                          <button Notif="<?=$Dosen[$No-2]['WA']."/".$key['NIP']."/".$Dosen[$No-2]['Nama']?>" class="btn btn-sm btn-success"><i class="fab fa-whatsapp"></i></button>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center align-middle">
                                      <?php echo $key['TargetKajur'];?>&nbsp;<button EditRencana="<?=$key['No']."/".$key['Jabatan']."/".$key['Jenjang']."/".$key['Semester']."/".$key['Tahun']."/".$key['KodeRencana']."/".$key['TotalKredit']."/".$key['TargetKajur']."/".$key['NIP']?>" class="btn btn-sm btn-primary EditRencana"><i class="fas fa-edit"></i></button>
                                      <button HapusRencana="<?=$key['No']?>" class="btn btn-sm btn-danger HapusRencana"><i class="fas fa-trash"></i></button>
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
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="modal fade" id="ModalTarget">
      <div class="modal-dialog">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Dosen</b></label>
              </div>
              <select class="custom-select" id="TargetDosen">	 									
                <?php foreach ($DaftarDosen as $key) { ?>
                  <option value="<?=$key['NIP'].'|'.$key['Jabatan']?>"><?=$key['Nama']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Homebase</b></label>
              </div>
              <select class="custom-select" id="HomebaseTarget">										
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
              </select>
            </div>
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Semester</b></label>
              </div>
              <select class="custom-select" id="SemesterTarget">										
                  <option value="Ganjil">Ganjil</option>
                  <option value="Genap">Genap</option>
              </select>
            </div>
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Tahun</b></label>
              </div>
              <input class="form-control" type="text" id="TahunTarget"  data-inputmask='"mask": "9999"' data-mask value="20">
            </div>
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary"><b>Target Rencana</b></span>
              </div>
              <input class="form-control" type="text" id="InputTarget" data-inputmask='"mask": "999"' data-mask>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="TambahTargetKajur"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditRencanaPendidikan">
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
                    <select class="custom-select" id="EditJenjangRencanaPendidikan">										
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
                    <select class="custom-select" id="EditSemesterRencanaPendidikan">										
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
                    <input class="form-control" type="hidden" id="NIPTarget">
                    <input class="form-control" type="hidden" id="TahunLama">
                    <input class="form-control" type="text" id="EditTahunRencanaPendidikan"  data-inputmask='"mask": "9999"' data-mask>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="table-responsive mb-2">
                    <table id="EditPENDIDIKAN" class="table table-bordered border-dark bg-light mb-1">
                      <thead>
                        <tr>
                          <th class='align-middle bg-warning'>No</th>
                          <th class='align-middle bg-warning'>Komponen Kegiatan</th>
                          <th class='align-middle bg-warning'>Kredit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td rowspan="3" class='text-center'>1</td>
                          <td class='align-middle'>Menyelesaikan pendidikan formal dan memperoleh ijazah</td>
                          <td rowspan="3" class='text-center align-middle'><b id="EditKreditSekolah">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditDoktor" onchange="EditDoktor()"> Doktor</label></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditMagister" onchange="EditMagister()"> Magister</label></td>
                        </tr>
                        <tr>
                          <td class='text-center'>2</td>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditDiklat" onchange="EditDiklat()"> Mengikuti Diklat Prajabatan Golongan III</label></td>
                          <td class='text-center align-middle'><b id="EditKreditDiklat">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="2" class='text-center'>3</td>
                          <td class='align-middle'>Melaksanakan perkuliahan / mengajar </td>
                          <td rowspan="2" class='text-center align-middle'><b id="EditKreditMengajar">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'>
                            <div class="input-group-sm mb-1">
                              <b>Jumlah sks :</b> <input disabled style="width: 50px;" oninput="EditMengajar()" class="form-control-sm" type="text" id="EditMengajar"  data-inputmask='"mask": "99"' data-mask> <b>sks</b>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class='text-center'>4</td>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditBimbingSeminar" onchange="EditBimbingSeminar()"> Membimbing seminar mahasiswa</label></td>
                          <td class='text-center align-middle'><b id="EditKreditBimbingSeminar">0</b></td>
                        </tr>
                        <tr>
                          <td class='text-center'>5</td>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditBimbingKKN" onchange="EditBimbingKKN()"> Membimbing KKN, Praktik Kerja Lapangan</label></td>
                          <td class='text-center align-middle'><b id="EditKreditBimbingKKN">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="9" class='text-center'>6</td>
                          <td class='align-middle'>Membimbing dalam menghasilkan disertasi / tesis / skripsi</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'>1. Pembimbing Utama</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><b>Disertasi :</b> <input disabled style="width: 50px;" oninput="EditDisertasiUtama()" class="form-control-sm" type="text" id="EditDisertasiUtama"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditDisertasiUtama">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Tesis :</b> <input disabled style="width: 50px;" oninput="EditTesisUtama()" class="form-control-sm" type="text" id="EditTesisUtama"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditTesisUtama">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Skripsi :</b> <input disabled style="width: 50px;" oninput="EditSkripsiUtama()" class="form-control-sm" type="text" id="EditSkripsiUtama"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditSkripsiUtama">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'>2. Pembimbing Pendamping</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><b>Disertasi :</b> <input disabled style="width: 50px;" oninput="EditDisertasiPendamping()" class="form-control-sm" type="text" id="EditDisertasiPendamping"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditDisertasiPendamping">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Tesis :</b> <input disabled style="width: 50px;" oninput="EditTesisPendamping()" class="form-control-sm" type="text" id="EditTesisPendamping"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditTesisPendamping">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Skripsi :</b> <input disabled style="width: 50px;" oninput="EditSkripsiPendamping()" class="form-control-sm" type="text" id="EditSkripsiPendamping"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditSkripsiPendamping">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="3" class='text-center'>7</td>
                          <td class='align-middle'>Bertugas sebagai penguji pada ujian akhir</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><b>Ketua penguji :</b> <input disabled style="width: 50px;" oninput="EditPengujiUtama()" class="form-control-sm" type="text" id="EditPengujiUtama"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengujiUtama">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Anggota penguji :</b> <input disabled style="width: 50px;" oninput="EditAnggotaPenguji()" class="form-control-sm" type="text" id="EditAnggotaPenguji"  data-inputmask='"mask": "99"' data-mask> <b>Lulusan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditAnggotaPenguji">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="2" class='text-center'>8</td>
                          <td class='align-middle'> Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk membimbing mahasiswa menghasilkan produk saintifik</label></td>
                          <td rowspan="2" class='text-center align-middle'><b id="EditKreditMembinaKegiatan">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Jumlah Kegiatan :</b> <input disabled style="width: 50px;" oninput="EditMembinaKegiatan()" class="form-control-sm" type="text" id="EditMembinaKegiatan"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                        </tr>
                        <tr>
                          <td rowspan="2" class='text-center'>9</td>
                          <td class='align-middle'> Mengembangkan program kuliah yang mempunyai nilai kebaharuan metode atau substansi</td>
                          <td rowspan="2" class='text-center align-middle'><b id="EditKreditMengembangkanProgram">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Jumlah Mata Kuliah :</b> <input disabled style="width: 50px;" oninput="EditMengembangkanProgram()" class="form-control-sm" type="text" id="EditMengembangkanProgram"  data-inputmask='"mask": "99"' data-mask> <b>Mata Kuliah</b></td>
                        </tr>
                        <tr>
                          <td rowspan="3" class='text-center'>10</td>
                          <td class='align-middle'>Mengembangkan bahan pengajaran / bahan kuliah yang mempunyai nilai kebaharuan</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><b>Jumlah Buku ajar :</b> <input disabled style="width: 50px;" oninput="EditBukuAjar()" class="form-control-sm" type="text" id="EditBukuAjar"  data-inputmask='"mask": "99"' data-mask> <b>Buku Ajar</b></td>
                          <td class='text-center align-middle'><b id="EditKreditBukuAjar">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Jumlah Produk Diktat, Modul, dll :</b> <input disabled style="width: 50px;" oninput="EditProdukPengajaran()" class="form-control-sm" type="text" id="EditProdukPengajaran"  data-inputmask='"mask": "99"' data-mask> <b>Produk</b></td>
                          <td class='text-center align-middle'><b id="EditKreditProdukPengajaran">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="2" class='text-center'>11</td>
                          <td class='align-middle'> Menyampaikan orasi ilmiah di tingkat perguruan tinggi</td>
                          <td rowspan="2" class='text-center align-middle'><b id="EditKreditOrasi">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Jumlah Orasi :</b> <input disabled style="width: 50px;" oninput="EditOrasi()" class="form-control-sm" type="text" id="EditOrasi"  data-inputmask='"mask": "99"' data-mask> <b>Orasi</b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="table-responsive mb-2">
                    <table class="table table-bordered border-dark bg-light mb-1">
                      <thead>
                        <tr>
                          <th class='align-middle bg-warning'>No</th>
                          <th class='align-middle bg-warning'>Komponen Kegiatan</th>
                          <th class='align-middle bg-warning'>Kredit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td rowspan="9" class='text-center'>12</td>
                          <td class='align-middle'>Menduduki jabatan pimpinan perguruan tinggi</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRektor" onchange="EditRektor()"> Rektor</label></td>
                          <td class='text-center align-middle'><b id="EditKreditRektor">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditWakilRektor" onchange="EditWakilRektor()"> Wakil rektor / dekan</label></td>
                          <td class='text-center align-middle'><b id="EditKreditWakilRektor">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditKetua" onchange="EditKetua()"> Ketua sekolah tinggi / pembantu dekan / asisten direktur program pasca sarjana / direktur politeknik / kepala LLDikti</label></td>
                          <td class='text-center align-middle'><b id="EditKreditKetua">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditPembantuKetua" onchange="EditPembantuKetua()"> Pembantu ketua sekolah tinggi/pembantu direktur politeknik</label></td>
                          <td class='text-center align-middle'><b id="EditKreditPembantuKetua">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditDirekturAkademi" onchange="EditDirekturAkademi()"> Direktur akademi</label></td>
                          <td class='text-center align-middle'><b id="EditKreditDirekturAkademi">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditPembantuDirekturPoliteknik" onchange="EditPembantuDirekturPoliteknik()"> Pembantu direktur politeknik, ketua jurusan / bagian pada universitas / institut / sekolah tinggi</label></td>
                          <td class='text-center align-middle'><b id="EditKreditPembantuDirekturPoliteknik">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditPembantuDirekturAkademi" onchange="EditPembantuDirekturAkademi()"> Pembantu direktur akademi / ketua jurusan / ketua prodipada universitas / politeknik / akademi, sekretaris jurusan / bagian pada universitas / institut / sekolah tinggi</label></td>
                          <td class='text-center align-middle'><b id="EditKreditPembantuDirekturAkademi">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditSekretaris" onchange="EditSekretaris()"> Sekretaris jurusan pada politeknik / akademi dan kepala laboratorium (bengkel) universitas / institut / sekolah tinggi / politeknik / akademi</label></td>
                          <td class='text-center align-middle'><b id="EditKreditSekretaris">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="3" class='text-center'>13</td>
                          <td class='align-middle'>Membimbing dosen yang mempunyai jabatan akademik lebih rendah</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><b>Pembimbing Pencangkokan :</b> <input disabled style="width: 50px;" oninput="EditPembimbingPencangkokan()" class="form-control-sm" type="text" id="EditPembimbingPencangkokan"  data-inputmask='"mask": "99"' data-mask> <b>Orang</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPembimbingPencangkokan">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Pembimbing Reguler :</b> <input disabled style="width: 50px;" oninput="EditPembimbingReguler()" class="form-control-sm" type="text" id="EditPembimbingReguler"  data-inputmask='"mask": "99"' data-mask> <b>Orang</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPembimbingReguler">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="3" class='text-center'>14</td>
                          <td class='align-middle'>Melaksanakan kegiatan detasering dan pencangkokan di luar institusi tempat bekerja</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><b>Detasering :</b> <input disabled style="width: 50px;" oninput="EditDetasering()" class="form-control-sm" type="text" id="EditDetasering"  data-inputmask='"mask": "99"' data-mask> <b>Orang</b></td>
                          <td class='text-center align-middle'><b id="EditKreditDetasering">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Pencangkokan :</b> <input disabled style="width: 50px;" oninput="EditPencangkokan()" class="form-control-sm" type="text" id="EditPencangkokan"  data-inputmask='"mask": "99"' data-mask> <b>Orang</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPencangkokan">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="8" class='text-center'>15</td>
                          <td class='align-middle'>Melaksanakan pengembangan diri untuk meningkatkan kompetensi</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td><b>Lebih dari 960 jam :</b> <input disabled style="width: 50px;" oninput="EditPengembangan960()" class="form-control-sm" type="text" id="EditPengembangan960"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengembangan960">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Antara 641-960 jam :</b> <input disabled style="width: 50px;" oninput="EditPengembangan641()" class="form-control-sm" type="text" id="EditPengembangan641"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengembangan641">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Antara 481-640 jam :</b> <input disabled style="width: 50px;" oninput="EditPengembangan481()" class="form-control-sm" type="text" id="EditPengembangan481"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengembangan481">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Antara 161-480 jam :</b> <input disabled style="width: 50px;" oninput="EditPengembangan161()" class="form-control-sm" type="text" id="EditPengembangan161"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengembangan161">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Antara 81-160 jam :</b> <input disabled style="width: 50px;" oninput="EditPengembangan81()" class="form-control-sm" type="text" id="EditPengembangan81"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengembangan81">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Antara 30-80 jam :</b> <input disabled style="width: 50px;" oninput="EditPengembangan30()" class="form-control-sm" type="text" id="EditPengembangan30"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengembangan30">0</b></td>
                        </tr>
                        <tr>
                          <td><b>Antara 10-30 jam :</b> <input disabled style="width: 50px;" oninput="EditPengembangan10()" class="form-control-sm" type="text" id="EditPengembangan10"  data-inputmask='"mask": "99"' data-mask> <b>Kegiatan</b></td>
                          <td class='text-center align-middle'><b id="EditKreditPengembangan10">0</b></td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="input-group mb-1" style="margin-left: 275px;width: 190px;">
                                  <div class="input-group-prepend">
                                    <label class="input-group-text bg-primary"><b>Input Target</b></label>
                                  </div>
                                  <input class="form-control" type="text" id="Target"  data-inputmask='"mask": "9999"' data-mask>
                                </div>
                              </div>
                            </div>
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
            <button type="submit" class="btn btn-success" id="SimpanEditRencanaPendidikan"><b>Simpan</b></button>
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
		<script>
			var EditJabatanRencanaPendidikan = ''
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

				$('#TabelMonitoringPendidikan').DataTable( {
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

        $('#TambahTargetKajur').click(function() {
          if (isNaN(parseInt($('#InputTarget').val()))) {
            alert('Target Rencana Belum Benar!')
          } else {
            var Pisah = $('#TargetDosen').val().split('|')
            var InputTarget = { TargetDosen: Pisah[0],
                                Jabatan: Pisah[1],
                                Jenjang: $('#HomebaseTarget').val(),
                                Semester: $('#SemesterTarget').val(),
                                Tahun: $('#TahunTarget').val(),
                                Kode: '0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0',
                                Target: parseInt($('#InputTarget').val()),
                                Bidang: 'RencanaPendidikan',}
            $.post(BaseURL+'Kajur/InputTarget', InputTarget).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + 'Kajur/Monitoring/Pendidikan'
              } else {
                alert(Respon)
              }
            }) 
          }
        })

        $('#SimpanEditRencanaPendidikan').click(function() {
          if (isNaN(parseInt($('#Target').val()))) {
            alert('Input Target Belum Benar!')
          } else {
            var InputTarget = { No:$("#NoEditRencana").val(),
                                NIP: $('#NIPTarget').val(),
                                JenjangLama: $('#JenjangLama').val(),
                                SemesterLama: $('#SemesterLama').val(),
                                TahunLama: $('#TahunLama').val(),
                                Jenjang: $('#EditJenjangRencanaPendidikan').val(),
                                Semester: $('#EditSemesterRencanaPendidikan').val(),
                                Tahun: $('#EditTahunRencanaPendidikan').val(),
                                Target:parseInt($('#Target').val()),
                                Bidang:'RencanaPendidikan'}
            $.post(BaseURL+'Kajur/EditTarget', InputTarget).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + 'Kajur/Monitoring/Pendidikan'
              } else {
                alert(Respon)
              }
            }) 
          }
        })

        $(document).on("click",".HapusRencana",function(){
					var Hapus = {No: $(this).attr('HapusRencana'),Bidang:'RencanaPendidikan'}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Kajur/HapusTarget", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + 'Kajur/Monitoring/Pendidikan'
							} else {
								alert(Respon)
							}
						});
					}
				});

        $(document).on("click",".EditRencana",function(){
					var Data = $(this).attr('EditRencana')
					var Pisah = Data.split("/")
					$("#NoEditRencana").val(Pisah[0])
					$("#EditJenjangRencanaPendidikan").val(Pisah[2])
					$("#JenjangLama").val(Pisah[2])
					$("#EditSemesterRencanaPendidikan").val(Pisah[3])
					$("#SemesterLama").val(Pisah[3])
					$("#EditTahunRencanaPendidikan").val(Pisah[4])
					$("#TahunLama").val(Pisah[4])
					var PisahKode = Pisah[5].split("|")
					if (PisahKode[0] == '1') {
						$('#EditDoktor').attr('checked', true)	
						$("#EditKreditSekolah").html(200)
					} else if (PisahKode[0] == '2') {
						$('#EditMagister').attr('checked', true)
						$("#EditKreditSekolah").html(150)
					}
					if (PisahKode[1] == '1') {
						$('#EditDiklat').attr('checked', true)	
						$("#EditKreditDiklat").html(3)
					}
					$('#EditMengajar').val(PisahKode[2])
					EditJabatanRencanaPendidikan = Pisah[1]
					if (Pisah[1] != "Asisten Ahli") {
						if (PisahKode[2] > 10) {
							$("#EditKreditMengajar").html(10+((PisahKode[2]-10)*0.5))
						} else {
							$("#EditKreditMengajar").html(PisahKode[2])
						}	
					} else {
						if (PisahKode[2] > 10) {
							$("#EditKreditMengajar").html(5+((PisahKode[2]-10)*0.25))
						} else {
							$("#EditKreditMengajar").html(PisahKode[2]*0.5)
						}	
					}
					if (PisahKode[3] == '1') {
						$('#EditBimbingSeminar').attr('checked', true)	
						$("#EditKreditBimbingSeminar").html(1)
					}
					if (PisahKode[4] == '1') {
						$('#EditBimbingKKN').attr('checked', true)	
						$("#EditKreditBimbingKKN").html(1)
					}
					$("#EditDisertasiUtama").val(PisahKode[5])
					$("#EditKreditDisertasiUtama").html(PisahKode[5]*2)
					$("#EditTesisUtama").val(PisahKode[6])
					$("#EditKreditTesisUtama").html(PisahKode[6]*0.5)
					$("#EditSkripsiUtama").val(PisahKode[7])
					$("#EditKreditSkripsiUtama").html(PisahKode[7]*0.125)
					$("#EditDisertasiPendamping").val(PisahKode[8])
					$("#EditKreditDisertasiPendamping").html(PisahKode[8]*1.5)
					$("#EditTesisPendamping").val(PisahKode[9])
					$("#EditKreditTesisPendamping").html((PisahKode[9]*2/6).toFixed(2))
					$("#EditSkripsiPendamping").val(PisahKode[10])
					$("#EditKreditSkripsiPendamping").html(PisahKode[10]*0.0625)					
					$("#EditPengujiUtama").val(PisahKode[11])
					$("#EditKreditPengujiUtama").html(PisahKode[11]*0.25)
					$("#EditAnggotaPenguji").val(PisahKode[12])
					$("#EditKreditAnggotaPenguji").html(PisahKode[12]*0.0625)
					$("#EditMembinaKegiatan").val(PisahKode[13])
					$("#EditKreditMembinaKegiatan").html(PisahKode[13])
					$("#EditMengembangkanProgram").val(PisahKode[14])
					$("#EditKreditMengembangkanProgram").html(PisahKode[14]*2)
					$("#EditBukuAjar").val(PisahKode[15])
					$("#EditKreditBukuAjar").html(PisahKode[15]*20)
					$("#EditProdukPengajaran").val(PisahKode[16])
					$("#EditKreditProdukPengajaran").html(PisahKode[16]*5)
					$("#EditOrasi").val(PisahKode[17])
					$("#EditKreditOrasi").html(PisahKode[17]*2.5)
					if (Pisah[1] == "Lektor Kepala" || Pisah[1] == "Profesor") {
						$("#EditPembimbingPencangkokan").val(PisahKode[18])
						$("#EditKreditPembimbingPencangkokan").html(PisahKode[18]*2)
						$("#EditPembimbingReguler").val(PisahKode[19])
						$("#EditKreditPembimbingReguler").html(PisahKode[19])
						$("#EditDetasering").val(PisahKode[20])
						$("#EditKreditDetasering").html(PisahKode[20]*5)
						$("#EditPencangkokan").val(PisahKode[21])
						$("#EditKreditPencangkokan").html(PisahKode[24]*4)
					} 
					if (PisahKode[22] == '1') {
						$('#EditRektor').attr('checked', true)	
						$("#EditKreditRektor").html(6)
					}
					else if (PisahKode[23] == '1') {
						$('#EditWakilRektor').attr('checked', true)	
						$("#EditKreditWakilRektor").html(5)
					}
					else if (PisahKode[24] == '1') {
						$('#EditKetua').attr('checked', true)	
						$("#EditKreditKetua").html(4)
					}
					else if (PisahKode[25] == '1') {
						$('#EditPembantuKetua').attr('checked', true)	
						$("#EditKreditPembantuKetua").html(4)
					}
					else if (PisahKode[26] == '1') {
						$('#EditDirekturAkademi').attr('checked', true)	
						$("#EditKreditDirekturAkademi").html(4)
					}
					else if (PisahKode[27] == '1') {
						$('#EditPembantuDirekturPoliteknik').attr('checked', true)	
						$("#EditKreditPembantuDirekturPoliteknik").html(3)
					}
					else if (PisahKode[28] == '1') {
						$('#EditPembantuDirekturAkademi').attr('checked', true)	
						$("#EditKreditPembantuDirekturAkademi").html(3)
					}
					else if (PisahKode[29] == '1') {
						$('#EditSekretaris').attr('checked', true)	
						$("#EditKreditSekretaris").html(3)
					}
					$("#EditPengembangan960").val(PisahKode[30])
					$("#EditKreditPengembangan960").html(PisahKode[30]*15)
					$("#EditPengembangan641").val(PisahKode[31])
					$("#EditKreditPengembangan641").html(PisahKode[31]*9)
					$("#EditPengembangan481").val(PisahKode[32])
					$("#EditKreditPengembangan481").html(PisahKode[32]*6)
					$("#EditPengembangan161").val(PisahKode[33])
					$("#EditKreditPengembangan161").html(PisahKode[33]*3)
					$("#EditPengembangan81").val(PisahKode[34])
					$("#EditKreditPengembangan81").html(PisahKode[34]*2)
					$("#EditPengembangan30").val(PisahKode[35])
					$("#EditKreditPengembangan30").html(PisahKode[35]*1)					
					$("#EditPengembangan10").val(PisahKode[36])
					$("#EditKreditPengembangan10").html(PisahKode[36]*0.5)
					$("#EditRencanaTotalKredit").html(Pisah[6])
          $("#Target").val(Pisah[7])
          $("#NIPTarget").val(Pisah[8])
					$('#ModalEditRencanaPendidikan').modal("show");
				})
			})
		</script>
  </body>
</html>