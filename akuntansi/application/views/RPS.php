    <div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputRPS"><i class="fa fa-plus"></i> <b>Input RPS</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelRPS" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle">Homebase</th>
                              <th class="align-middle">Kode MK</th>
                              <th class="align-middle">Nama Mata Kuliah</th>
                              <th class="align-middle">Semester</th>
                              <th class="align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($RPS as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Homebase']?></td>
                                <td class="align-middle"><?=$key['KodeMK']?></td>
                                <td class="align-middle"><?=$key['NamaMK']?></td>
                                <td class="align-middle"><?=$key['Semester']?></td>
                                <td class="align-middle">
                                  <button Edit="<?=$key['KodeMK']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['KodeMK']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
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
    <div class="modal fade" id="ModalInputRPS">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body bg-primary">
            <div class="container">
              <div class="row my-1">
                <div class="col-12 my-1">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td>Homebase</td>
                          <td style="width: 30%;">Nama Mata Kuliah</td>
                          <td>Kode Mata Kuliah</td>
                          <td>Bobot (sks)</td>
                          <td>Semester</td>
                          <td style="width: 20%;">Tanggal Penyusunan</td>
                        </tr>
                        <tr>
                          <td>
                            <select class="custom-select custom-select-sm" id="HomebaseRPS">
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                            </select>
                          </td>
                          <td><input class="form-control form-control-sm" type="text" id="NamaMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="KodeMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="BobotMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="Semester"></td>
                          <td><input class="form-control form-control-sm" type="text" id="TanggalPenyusunan"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td>Otorisasi</td>
                          <td>Koordinator Pengembang RPS</td>
                          <td>Koordinator Bidang Keahlian</td>
                          <td>Ketua Program Studi</td>
                        </tr>
                        <tr>
                          <td><input class="form-control form-control-sm" type="text" id="Otorisasi"></td>
                          <td><input class="form-control form-control-sm" type="text" id="KoordinatorPengembang"></td>
                          <td><input class="form-control form-control-sm" type="text" id="KoordinatorBidang"></td>
                          <td><input class="form-control form-control-sm" type="text" id="Kaprodi"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td style="width: 20%;" rowspan="4">Capaian Pembelajaran (CP)</td>
                          <td>CPL-Prodi (Capaian Pembelajaran Lulusan Program Studi) Yang Di Bebankan Pada Mata Kuliah</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="CPL" rows="15"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td>CPMK (Capaian Pembelajaran Mata Kuliah)</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="CPM" rows="7"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Deskripsi Singkat Mata Kuliah</b></td>
                          <td><textarea class="form-control form-control-sm" id="Deskripsi" rows="3"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Bahan Kajian / Materi Pembelajaran</b></td>
                          <td><textarea class="form-control form-control-sm" id="BahanKajian" rows="10"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td style="width: 20%;" rowspan="4">Daftar Referensi</td>
                          <td>Referensi Utama</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="ReferensiUtama" rows="3"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td>Referensi Pendudukung</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="ReferensiPendudukung" rows="3"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Nama Dosen Pengampu</b></td>
                          <td><textarea class="form-control form-control-sm" id="DosenPengampu" rows="3"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Mata Kuliah Prasyarat (Jika Ada)</b></td>
                          <td><textarea class="form-control form-control-sm" id="MKPrasyarat" rows="1"></textarea></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;" class="text-center">
                          <td rowspan="2" style="width: 5%;vertical-align: middle;">Minggu Ke</td>
                          <td rowspan="2" style="width: 17%;vertical-align: middle;">Sub-CPMK (Kemampuan<br>Akhir Yang Di Rencanakan)</td>
                          <td rowspan="2" style="width: 14%;vertical-align: middle;">Bahan Kajian<br>(Materi Pembelajaran)</td>
                          <td rowspan="2" style="width: 20%;vertical-align: middle;">Bentuk & Metode Pembelajaran [Media & Sumber Belajar]</td>
                          <td rowspan="2" style="width: 5%;vertical-align: middle;">Estimasi Waktu</td>
                          <td rowspan="2" style="width: 15%;vertical-align: middle;">Pengalaman Belajar Mahasiswa (Penugasan)</td>
                          <td colspan="3" class="text-center">Penilaian</td>
                        </tr>
                        <tr>
                          <td class="text-center" style="width: 10%;"><b>Kriteria & Bentuk</b></td>
                          <td class="text-center" style="vertical-align: middle;"><b>Indikator</b></td>
                          <td class="text-center" style="width: 4%;"><b>Bobot (%)</b></td>
                        </tr>
                        <?php for ($i=1; $i < 17; $i++) { ?>
                          <tr>
                            <td class="text-center"><b><?=$i?></b></td>
                            <td><textarea class="form-control form-control-sm" id="SubCPMK<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="MateriPembelajaran<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="MetodePembelajaran<?=$i?>" rows="10"></textarea></td>
                            <td><input type="text" class="form-control form-control-sm" id="EstimasiWaktu<?=$i?>"></td>
                            <td><textarea class="form-control form-control-sm" id="Penugasan<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="Kriteria<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="Indikator<?=$i?>" rows="10"></textarea></td>
                            <td><input type="text" class="form-control form-control-sm" id="Bobot<?=$i?>"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger d-flex mx-auto" id="InputRPS"><b>Simpan <div id="LoadingInput" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
              </div>                              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditRPS">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body bg-primary">
            <div class="container">
              <div class="row my-1">
                <div class="col-12 my-1">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td>Homebase</td>
                          <td style="width: 30%;">Nama Mata Kuliah</td>
                          <td>Kode Mata Kuliah</td>
                          <td>Bobot (sks)</td>
                          <td>Semester</td>
                          <td style="width: 20%;">Tanggal Penyusunan</td>
                        </tr>
                        <tr>
                          <td>
                            <select class="custom-select custom-select-sm" id="EditHomebaseRPS">
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                            </select>
                          </td>
                          <input class="form-control form-control-sm" type="hidden" id="KodeMKLama">
                          <td><input class="form-control form-control-sm" type="text" id="EditNamaMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKodeMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditBobotMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditSemester"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditTanggalPenyusunan"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td>Otorisasi</td>
                          <td>Koordinator Pengembang RPS</td>
                          <td>Koordinator Bidang Keahlian</td>
                          <td>Ketua Program Studi</td>
                        </tr>
                        <tr>
                          <td><input class="form-control form-control-sm" type="text" id="EditOtorisasi"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKoordinatorPengembang"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKoordinatorBidang"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKaprodi"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td style="width: 20%;" rowspan="4">Capaian Pembelajaran (CP)</td>
                          <td>CPL-Prodi (Capaian Pembelajaran Lulusan Program Studi) Yang Di Bebankan Pada Mata Kuliah</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditCPL" rows="15"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td>CPMK (Capaian Pembelajaran Mata Kuliah)</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditCPM" rows="7"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Deskripsi Singkat Mata Kuliah</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditDeskripsi" rows="3"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Bahan Kajian / Materi Pembelajaran</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditBahanKajian" rows="10"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td style="width: 20%;" rowspan="4">Daftar Referensi</td>
                          <td>Referensi Utama</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditReferensiUtama" rows="3"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td>Referensi Pendudukung</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditReferensiPendudukung" rows="3"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Nama Dosen Pengampu</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditDosenPengampu" rows="3"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Mata Kuliah Prasyarat (Jika Ada)</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditMKPrasyarat" rows="1"></textarea></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;" class="text-center">
                          <td rowspan="2" style="width: 5%;vertical-align: middle;">Minggu Ke</td>
                          <td rowspan="2" style="width: 17%;vertical-align: middle;">Sub-CPMK (Kemampuan<br>Akhir Yang Di Rencanakan)</td>
                          <td rowspan="2" style="width: 14%;vertical-align: middle;">Bahan Kajian<br>(Materi Pembelajaran)</td>
                          <td rowspan="2" style="width: 20%;vertical-align: middle;">Bentuk & Metode Pembelajaran [Media & Sumber Belajar]</td>
                          <td rowspan="2" style="width: 5%;vertical-align: middle;">Estimasi Waktu</td>
                          <td rowspan="2" style="width: 15%;vertical-align: middle;">Pengalaman Belajar Mahasiswa (Penugasan)</td>
                          <td colspan="3" class="text-center">Penilaian</td>
                        </tr>
                        <tr>
                          <td class="text-center" style="width: 10%;"><b>Kriteria & Bentuk</b></td>
                          <td class="text-center" style="vertical-align: middle;"><b>Indikator</b></td>
                          <td class="text-center" style="width: 4%;"><b>Bobot (%)</b></td>
                        </tr>
                        <?php for ($i=1; $i < 17; $i++) { ?>
                          <tr>
                            <td class="text-center"><b><?=$i?></b></td>
                            <td><textarea class="form-control form-control-sm" id="EditSubCPMK<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="EditMateriPembelajaran<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="EditMetodePembelajaran<?=$i?>" rows="10"></textarea></td>
                            <td><input type="text" class="form-control form-control-sm" id="EditEstimasiWaktu<?=$i?>"></td>
                            <td><textarea class="form-control form-control-sm" id="EditPenugasan<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="EditKriteria<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="EditIndikator<?=$i?>" rows="10"></textarea></td>
                            <td><input type="text" class="form-control form-control-sm" id="EditBobot<?=$i?>"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger d-flex mx-auto" id="EditRPS"><b>Simpan <div id="LoadingEdit" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
              </div>                              
            </div>
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
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
      $(document).ready(function(){
        var BaseURL = '<?=base_url()?>'
        $('#TabelRPS').DataTable( {
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
        $("#InputRPS").click(function() {
          if ($("#KodeMK").val() === "") {
            alert('Input Kode Mata Kuliah Tidak Boleh Kosong!')
          } else {
            var Minggu = []
            for (let i = 1; i < 17; i++) {
              Minggu[i] = $("#SubCPMK"+i).val()+'$'+$("#MateriPembelajaran"+i).val()+'$'+$("#MetodePembelajaran"+i).val()+'$'+$("#EstimasiWaktu"+i).val()+'$'+$("#Penugasan"+i).val()+'$'+$("#Kriteria"+i).val()+'$'+$("#Indikator"+i).val()+'$'+$("#Bobot"+i).val()
            }
            var RPS = { Homebase: $("#HomebaseRPS").val(),
                        NamaMK: $("#NamaMK").val(),
                        KodeMK: $("#KodeMK").val(),
                        BobotMK: $("#BobotMK").val(),
                        Semester: $("#Semester").val(),
                        TanggalPenyusunan: $("#TanggalPenyusunan").val(),
                        Otorisasi: $("#Otorisasi").val(),
                        KoordinatorPengembang: $("#KoordinatorPengembang").val(),
                        KoordinatorBidang: $("#KoordinatorBidang").val(),
                        Kaprodi: $("#Kaprodi").val(),
                        CPL: $("#CPL").val(),
                        CPM: $("#CPM").val(),
                        Deskripsi: $("#Deskripsi").val(),
                        BahanKajian: $("#BahanKajian").val(),
                        ReferensiUtama: $("#ReferensiUtama").val(),
                        ReferensiPendudukung: $("#ReferensiPendudukung").val(),
                        DosenPengampu: $("#DosenPengampu").val(),
                        MKPrasyarat: $("#MKPrasyarat").val(),
                        Minggu1: Minggu[1],Minggu9: Minggu[9],
                        Minggu2: Minggu[2],Minggu10: Minggu[10],
                        Minggu3: Minggu[3],Minggu11: Minggu[11],
                        Minggu4: Minggu[4],Minggu12: Minggu[12],
                        Minggu5: Minggu[5],Minggu13: Minggu[13],
                        Minggu6: Minggu[6],Minggu14: Minggu[14],
                        Minggu7: Minggu[7],Minggu15: Minggu[15],
                        Minggu8: Minggu[8],Minggu16: Minggu[16] }
            $("#InputRPS").attr("disabled", true);                              
            $("#LoadingInput").show();
            $.post(BaseURL+"Admin/InputRPS", RPS).done(function(Respon) {
              if (Respon == '1') {
                alert('Data RPS Berhasil Di Simpan!')
                window.location = BaseURL + "Admin/RPS"
              } else {
                alert(Respon)
                $("#LoadingInput").hide();
                $("#InputRPS").attr("disabled", false);   
              }
            })
          }
        })
        $(document).on("click",".Edit",function(){
          $.post(BaseURL+"Admin/GetRPS/"+$(this).attr('Edit')).done(function(Respon) {
            var Data = JSON.parse(Respon)
            $("#EditHomebaseRPS").val(Data.Homebase)
            $("#EditNamaMK").val(Data.NamaMK)
            $("#KodeMKLama").val(Data.KodeMK)
            $("#EditKodeMK").val(Data.KodeMK)
            $("#EditBobotMK").val(Data.BobotMK)
            $("#EditSemester").val(Data.Semester)
            $("#EditTanggalPenyusunan").val(Data.TanggalPenyusunan)
            $("#EditOtorisasi").val(Data.Otorisasi)
            $("#EditKoordinatorPengembang").val(Data.KoordinatorPengembang)
            $("#EditKoordinatorBidang").val(Data.KoordinatorBidang)
            $("#EditKaprodi").val(Data.Kaprodi)
            $("#EditCPL").val(Data.CPL)
            $("#EditCPM").val(Data.CPM)
            $("#EditDeskripsi").val(Data.Deskripsi)
            $("#EditBahanKajian").val(Data.BahanKajian)
            $("#EditReferensiUtama").val(Data.ReferensiUtama)
            $("#EditReferensiPendudukung").val(Data.ReferensiPendudukung)
            $("#EditDosenPengampu").val(Data.DosenPengampu)
            $("#EditMKPrasyarat").val(Data.MKPrasyarat)
            var Minggu = []
            Minggu[0] = Data.Minggu1.split('$')
            Minggu[1] = Data.Minggu2.split('$')
            Minggu[2] = Data.Minggu3.split('$')
            Minggu[3] = Data.Minggu4.split('$')
            Minggu[4] = Data.Minggu5.split('$')
            Minggu[5] = Data.Minggu6.split('$')
            Minggu[6] = Data.Minggu7.split('$')
            Minggu[7] = Data.Minggu8.split('$')
            Minggu[8] = Data.Minggu9.split('$')
            Minggu[9] = Data.Minggu10.split('$')
            Minggu[10] = Data.Minggu11.split('$')
            Minggu[11] = Data.Minggu12.split('$')
            Minggu[12] = Data.Minggu13.split('$')
            Minggu[13] = Data.Minggu14.split('$')
            Minggu[14] = Data.Minggu15.split('$')
            Minggu[15] = Data.Minggu16.split('$')
            for (let i = 1; i < 17; i++) {
              $("#EditSubCPMK"+i).val(Minggu[i-1][0])
              $("#EditMateriPembelajaran"+i).val(Minggu[i-1][1])
              $("#EditMetodePembelajaran"+i).val(Minggu[i-1][2])
              $("#EditEstimasiWaktu"+i).val(Minggu[i-1][3])
              $("#EditPenugasan"+i).val(Minggu[i-1][4])
              $("#EditKriteria"+i).val(Minggu[i-1][5])
              $("#EditIndikator"+i).val(Minggu[i-1][6])
              $("#EditBobot"+i).val(Minggu[i-1][7])
            }
            $('#ModalEditRPS').modal("show")
          })
				})
        $("#EditRPS").click(function() {
					if ($("#EditKodeMK").val() === "") {
            alert('Input Kode Mata Kuliah Tidak Boleh Kosong!')
          } else {
            var Minggu = []
            for (let i = 1; i < 17; i++) {
              Minggu[i] = $("#EditSubCPMK"+i).val()+'$'+$("#EditMateriPembelajaran"+i).val()+'$'+$("#EditMetodePembelajaran"+i).val()+'$'+$("#EditEstimasiWaktu"+i).val()+'$'+$("#EditPenugasan"+i).val()+'$'+$("#EditKriteria"+i).val()+'$'+$("#EditIndikator"+i).val()+'$'+$("#EditBobot"+i).val()
            }
            var RPS = { Homebase: $("#EditHomebaseRPS").val(),
                        NamaMK: $("#EditNamaMK").val(),
                        KodeMK: $("#EditKodeMK").val(),
                        KodeMKLama: $("#KodeMKLama").val(),
                        BobotMK: $("#EditBobotMK").val(),
                        Semester: $("#EditSemester").val(),
                        TanggalPenyusunan: $("#EditTanggalPenyusunan").val(),
                        Otorisasi: $("#EditOtorisasi").val(),
                        KoordinatorPengembang: $("#EditKoordinatorPengembang").val(),
                        KoordinatorBidang: $("#EditKoordinatorBidang").val(),
                        Kaprodi: $("#EditKaprodi").val(),
                        CPL: $("#EditCPL").val(),
                        CPM: $("#EditCPM").val(),
                        Deskripsi: $("#EditDeskripsi").val(),
                        BahanKajian: $("#EditBahanKajian").val(),
                        ReferensiUtama: $("#EditReferensiUtama").val(),
                        ReferensiPendudukung: $("#EditReferensiPendudukung").val(),
                        DosenPengampu: $("#EditDosenPengampu").val(),
                        MKPrasyarat: $("#EditMKPrasyarat").val(),
                        Minggu1: Minggu[1],Minggu9: Minggu[9],
                        Minggu2: Minggu[2],Minggu10: Minggu[10],
                        Minggu3: Minggu[3],Minggu11: Minggu[11],
                        Minggu4: Minggu[4],Minggu12: Minggu[12],
                        Minggu5: Minggu[5],Minggu13: Minggu[13],
                        Minggu6: Minggu[6],Minggu14: Minggu[14],
                        Minggu7: Minggu[7],Minggu15: Minggu[15],
                        Minggu8: Minggu[8],Minggu16: Minggu[16] }
            $("#EditRPS").attr("disabled", true);                              
            $("#LoadingEdit").show();
            $.post(BaseURL+"Admin/UpdateRPS", RPS).done(function(Respon) {
              if (Respon == '1') {
                alert('Data RPS Berhasil Di Update!')
                window.location = BaseURL + "Admin/RPS"
              } else {
                alert(Respon)
                $("#LoadingEdit").hide();
                $("#EditRPS").attr("disabled", false);   
              }
            })
          }
				})
        $(document).on("click",".Hapus",function(){
					var Hapus = {KodeMK: $(this).attr('Hapus')}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Admin/HapusRPS", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/RPS"
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