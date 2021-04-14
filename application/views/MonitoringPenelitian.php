    <a id="Surat" href="Surat" download="Surat"></a>
    <div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 mt-2">
                <ul class="nav nav-pills mb-2 border border-warning rounded bg-light" id="pills-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="pills-MonitoringPenelitian-tab" data-toggle="pill" href="#pills-MonitoringPenelitian" role="tab" aria-controls="pills-MonitoringPenelitian" aria-selected="true"><i class="nav-icon fas fa-users"></i><b> Monitoring Penelitian</b></a>
                  </li>
                </ul>
                <div class="tab-content border border-warning rounded bg-light" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-MonitoringPenelitian" role="tabpanel" aria-labelledby="pills-MonitoringPenelitian-tab">
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
                            <table id="TabelMonitoringPenelitian" class="table table-bordered table-striped">
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
                                  <th class="text-center align-middle">Target<br>Kajur</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $No = 1; foreach ($Rencana as $key) { ?>
                                  <tr>	
                                    <td class="text-center align-middle"><?=$No++?></td>
                                    <td class="align-middle"><?=$key['NIP']?></td>
                                    <td class="align-middle"><?=$Dosen[0]['Nama']?></td>
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
      <div class="modal-dialog modal-dialog-centered">
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
    <div class="modal fade" id="ModalEditRencanaPenelitian">
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
                    <select class="custom-select" id="EditJenjangRencanaPenelitian">										
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
                    <select class="custom-select" id="EditSemesterRencanaPenelitian">										
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
                    <input class="form-control" type="text" id="EditTahunRencanaPenelitian"  data-inputmask='"mask": "9999"' data-mask>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="table-responsive mb-2">
                    <table id="EditPENELITIAN" class="table table-bordered border-dark bg-light mb-1">
                      <thead>
                        <tr>
                          <th class='align-middle bg-warning'>No</th>
                          <th class='align-middle bg-warning'> Komponen Kegiatan</th>
                          <th class='align-middle bg-warning'> Kredit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td rowspan="17" class='text-center'>1</td>
                          <td class='align-middle'>Menghasilkan karya ilmiah sesuai dengan bidang ilmunya : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'>a) Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL1" onchange="EditRencanaPNL1()"> 1) Buku Referensi</label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL1">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL2" onchange="EditRencanaPNL2()"> 2) Monograf</label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL2">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'>b) Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter) : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL3" onchange="EditRencanaPNL3()"> 1) Internasional</label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL3">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL4" onchange="EditRencanaPNL4()"> 2) Nasional</label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL4">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'>c) Hasil penelitian atau hasil pemikiran yang dipublikasikan : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL5" onchange="EditRencanaPNL5()"> 1) Jurnal internasional bereputasi (terindeks pada database internasional bereputasi dan berfaktor dampak) </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL5">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL6" onchange="EditRencanaPNL6()"> 2) Jurnal internasional terindeks pada basis data internasional bereputasi </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL6">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL7" onchange="EditRencanaPNL7()"> 3) Jurnal internasionalterindekspada basis data internasional di luar kategori 2 </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL7">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL8" onchange="EditRencanaPNL8()"> 4) a. Jurnal Nasional terakreditasi Dikti </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL8">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL9" onchange="EditRencanaPNL9()"> 4) b. Jurnal nasional terakreditasi Kemenristekdikti peringkat 1 dan 2 </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL9">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL10" onchange="EditRencanaPNL10()"> 5) a. Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB)  terindeks pada basis datayang diakui Kemenristekdikti, contohnya : CABI atau Index Copernicus International (ICI). b. Jurnal nasional terakreditasi peringkat 3 dan 4 </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL10">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL11" onchange="EditRencanaPNL11()"> 5) b. Jurnal Nasional berbahasa Indonesia terindeks pada basis data yang diakui Kemenristekdikti, contohnya : akreditasi peringkat 5 dan 6 </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL11">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL12" onchange="EditRencanaPNL12()"> 6) Jurnal Nasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL12">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL13" onchange="EditRencanaPNL13()"> 7) Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL13">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="4" class='text-center'>7</td>
                          <td class='align-middle'>Membuat rancangan dan karya teknologi yang tidak dipatenkan; rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum yang teragenda : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL14" onchange="EditRencanaPNL14()"> a). Tingkat Internasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL14">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL15" onchange="EditRencanaPNL15()"> b). Tingkat Nasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL15">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL16" onchange="EditRencanaPNL16()"> c). Tingkat Lokal </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL16">0</b></td>
                        </tr>
                        <tr>
                          <td class='text-center'>8</td>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL17" onchange="EditRencanaPNL17()"> Membuat rancangan dan karya seni yang tidak terdaftar HaKI *) </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL17">0</b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="table-responsive mb-2">
                    <table id="PENELITIAN" class="table table-bordered border-dark bg-light mb-1">
                      <thead>
                        <tr>
                          <th class='align-middle bg-warning'>No</th>
                          <th class='align-middle bg-warning'> Komponen Kegiatan</th>
                          <th class='align-middle bg-warning'> Kredit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td rowspan="16" class='text-center'>2</td>
                          <td class='align-middle'>Hasil penelitian atau hasil pemikiran yang didesiminasikan </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'> a. Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL18" onchange="EditRencanaPNL18()"> 1). Internasional terindeks pada Scimagojr dan Scopus </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL18">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL19" onchange="EditRencanaPNL19()"> 2). Internasional terindeks pada SCOPUS, IEEE Explore, SPIE </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL19">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL20" onchange="EditRencanaPNL20()"> 3). Internasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL20">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL21" onchange="EditRencanaPNL21()"> 4). Nasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL21">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'> b. Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL22" onchange="EditRencanaPNL22()"> 1). Internasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL22">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL23" onchange="EditRencanaPNL23()"> 2). Nasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL23">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'> c. Disajikan dalam seminar / simposium / lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL24" onchange="EditRencanaPNL24()"> 1). Internasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL24">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL25" onchange="EditRencanaPNL25()"> 2). Nasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL25">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'> d. Hasil penelitian / pemikiran yang tidak disajikan dalam seminar / simposium / lokakarya, tetapi dimuat dalam prosiding : </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL26" onchange="EditRencanaPNL26()"> 1). Internasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL26">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL27" onchange="EditRencanaPNL27()"> 2). Nasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL27">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL28" onchange="EditRencanaPNL28()"> e. Hasil penelitian / pemikiran yang disajikan dalam koran / majalah populer / umum </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL28">0</b></td>
                        </tr>
                        <tr>
                          <td class='text-center'>3</td>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL29" onchange="EditRencanaPNL29()"> Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL29">0</b></td>
                        </tr>
                        <tr>
                          <td class='text-center'>4</td>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL30" onchange="EditRencanaPNL30()"> Menerjemahkan / menyadur buku ilmiah yang diterbitkan (ber ISBN) </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL30">0</b></td>
                        </tr>
                        <tr>
                          <td class='text-center'>5</td>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL31" onchange="EditRencanaPNL31()"> Mengedit / menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN) </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL31">0</b></td>
                        </tr>
                        <tr>
                          <td rowspan="7" class='text-center'>6</td>
                          <td class='align-middle'>Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara nasional atau internasional </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL32" onchange="EditRencanaPNL32()"> a) Internasionalyang sudah diimplementasikan di industri (paling sedikit diakui oleh 4 Negara) </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL32">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL33" onchange="EditRencanaPNL33()"> b) Internasional (paling sedikit diakui oleh 4 Negara) </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL33">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL34" onchange="EditRencanaPNL34()"> c) Nasional (yang sudah diimplementasikan di industri) </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL34">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL35" onchange="EditRencanaPNL35()"> d) Nasional </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL35">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL36" onchange="EditRencanaPNL36()"> e) Nasional, dalam bentuk paten sederhana yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham ; </label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL36">0</b></td>
                        </tr>
                        <tr>
                          <td class='align-middle'><label><input disabled type="checkbox" id="EditRencanaPNL37" onchange="EditRencanaPNL37()"> f) Karya buku, desain industri, indikasi geografisyang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham;</label></td>
                          <td class='text-center align-middle'><b id="EditRencanaKreditPNL37">0</b></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <div class="row">
                                <div class="col-sm-auto">
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
            <button type="submit" class="btn btn-success" id="EditRencana"><b>Simpan</b></button>
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
			var EditJabatanRencanaPenelitian = ''
			jQuery(document).ready(function($) {
				"use strict";
				
        $('[data-mask]').inputmask()

				var BaseURL = '<?=base_url()?>';

        $("#pak").click(function() {
					if (isNaN($('#DariTahun').val()) || $('#DariTahun').val() == "") {
						alert('Input Tahun Dari Semester Belum Benar!')
					} else if (isNaN($('#HinggaTahun').val()) || $('#HinggaTahun').val() == "") {
						alert('Input Tahun Hingga Semester Belum Benar!')
					} else if ($('#DariTahun').val() > $('#HinggaTahun').val()) {
						alert('Input Tahun Dari Semester Harus Lebih Kecil Atau Sama Dengan Input Tahun Hingga Semester!')
					}	else {
						window.location = BaseURL + 'Dashboard/PAK/'+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())
						if (document.getElementById("BuktiExcel").checked) {
							var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang'] 
							for (let i = 1; i < 5; i++) {
								$.post(BaseURL+"Dashboard"+"/Lampiran/"+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())+'/'+PAK[i-1]).done(function(Respon) {
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
						}
					}
				}) 

				$("#bkd").click(function() {
					if (isNaN($('#DariTahun').val()) || $('#DariTahun').val() == "") {
						alert('Input Tahun Dari Semester Belum Benar!')
					} else if (isNaN($('#HinggaTahun').val()) || $('#HinggaTahun').val() == "") {
						alert('Input Tahun Hingga Semester Belum Benar!')
					} else if ($('#DariTahun').val() > $('#HinggaTahun').val()) {
						alert('Input Tahun Dari Semester Harus Lebih Kecil Atau Sama Dengan Input Tahun Hingga Semester!')
					}	else {
						window.location = BaseURL + 'Dashboard/BKD/'+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())
						if (document.getElementById("BuktiExcel").checked) {
							var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang']
							for (let i = 1; i < 5; i++) {
								$.post(BaseURL+"Dashboard"+"/LampiranBKD/"+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())+'/'+PAK[i-1]).done(function(Respon) {
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
						}	
					}
				})

				$('#TabelMonitoringPenelitian').DataTable( {
					dom:'lfrtip',
          "ordering": false,
          "lengthMenu": [ 5, 10, 20, 30 ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
				})

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
                                Bidang: 'RencanaPenelitian',}
            $.post(BaseURL+'Kajur/InputTarget', InputTarget).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + 'Kajur/Monitoring/Penelitian'
              } else {
                alert(Respon)
              }
            }) 
          }
        })

        $('#EditRencana').click(function() {
          if (isNaN(parseInt($('#Target').val()))) {
            alert('Input Target Belum Benar!')
          } else {
            var InputTarget = { No:$("#NoEditRencana").val(),
                                NIP: $('#NIPTarget').val(),
                                JenjangLama: $('#JenjangLama').val(),
                                SemesterLama: $('#SemesterLama').val(),
                                TahunLama: $('#TahunLama').val(),
                                Jenjang: $('#EditJenjangRencanaPenelitian').val(),
                                Semester: $('#EditSemesterRencanaPenelitian').val(),
                                Tahun: $('#EditTahunRencanaPenelitian').val(),
                                Target:parseInt($('#Target').val()),
                                Bidang:'RencanaPenelitian'}
            $.post(BaseURL+'Kajur/EditTarget', InputTarget).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + 'Kajur/Monitoring/Penelitian'
              } else {
                alert(Respon)
              }
            }) 
          }
        })

        $(document).on("click",".HapusRencana",function(){
					var Hapus = {No: $(this).attr('HapusRencana'),Bidang:'RencanaPenelitian'}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Kajur/HapusTarget", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + 'Kajur/Monitoring/Penelitian'
							} else {
								alert(Respon)
							}
						});
					}
				});

        
				
				$(document).on("click",".EditRencana",function(){
          <?php $Kredit = array(40,20,15,10,40,30,20,25,25,20,15,10,10,20,15,10,7,30,25,15,10,10,5,5,3,10,5,1,2,15,10,60,50,40,30,20,15); ?>
					var Data = $(this).attr('EditRencana')
					var Pisah = Data.split("/")
					$("#NoEditRencana").val(Pisah[0])
					$("#EditJenjangRencanaPenelitian").val(Pisah[2])
					$("#JenjangLama").val(Pisah[2])
					$("#EditSemesterRencanaPenelitian").val(Pisah[3])
					$("#SemesterLama").val(Pisah[3])
					$("#EditTahunRencanaPenelitian").val(Pisah[4])
					$("#TahunLama").val(Pisah[4])
					var PisahKode = Pisah[5].split("|")
          <?php 
            for ($i = 1; $i <= 37 ; $i++) {
              echo "if (PisahKode[".($i-1)."] == '1') {\n";
              echo "$('#EditRencanaPNL".$i."').attr('checked', true)\n";	
              echo "$('#EditRencanaKreditPNL".$i."').html(".$Kredit[$i-1].")\n}\n";
            } 
          ?>
					$("#EditRencanaTotalKredit").html(Pisah[6])
          $("#Target").val(Pisah[7])
          $("#NIPTarget").val(Pisah[8])
					$('#ModalEditRencanaPenelitian').modal("show");
				})
			})
		</script>
  </body>
</html>