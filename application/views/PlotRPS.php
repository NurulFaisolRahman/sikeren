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
                              <th class="align-middle">Nama Dosen</th>
                              <th class="align-middle">Kode MK</th>
                              <th class="align-middle">Nama Mata Kuliah</th>
                              <th class="align-middle">Bobot</th>
                              <th class="align-middle">Semester</th>
                              <th class="align-middle">Lihat</th>
                              <th class="align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($RPS as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['KodeMK']?></td>
                                <td class="align-middle"><?=$key['NamaMK']?></td>
                                <td class="align-middle"><?=$key['BobotMK'].' sks'?></td>
                                <td class="align-middle"><?=$key['Semester']?></td>
                                <td class="align-middle">
                                  <button Edit="<?=$key['KodeMK']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                </td>
                                <td class="align-middle">
                                  <?php if ($key['Status'] == 1) { ?>
                                    <button Valid="<?=$key['Id']?>" class="btn btn-sm btn-primary Valid"><i class="fas fa-check"></i></button>
                                    <button Tolak="<?=$key['Id']?>" class="btn btn-sm btn-danger Tolak"><i class="fas fa-times"></i></button> 
                                  <?php } else if ($key['Status'] == 3) { ?>
                                    <button Unduh="<?=$key['KodeMK']?>" class="btn btn-sm btn-success Unduh"><i class="fas fa-download"></i></button> 
                                  <?php } ?>
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
                              <!-- <option value="S2">S2</option> -->
                            </select>
                          </td>
                          <input class="form-control form-control-sm" type="hidden" id="KodeMKLama">
                          <td><input class="form-control form-control-sm" type="text" id="EditNamaMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKodeMK" disabled></td>
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
                          <td>Koordinator Program Studi</td>
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
                        <!-- <tr>
                          <td><b>Nama Dosen Pengampu</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditDosenPengampu" rows="3"></textarea></td>
                        </tr> -->
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
                            <td>
                              <textarea class="form-control form-control-sm" id="EditSubCPMK<?=$i?>" rows="10"></textarea>
                              <div class="row">
                                <div class="col-4">
                                  <?php for ($j=1; $j <= 5; $j++) { ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?='A'.$i.$j?>" name="EditA<?=$i?>" id="EditA<?=$i.$j?>">
                                      <label class="form-check-label" for="EditA<?=$i.$j?>"><?='A'.$j?></label>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="col-4">
                                  <?php for ($j=1; $j <= 6; $j++) { ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?='C'.$i.$j?>" name="EditC<?=$i?>" id="EditC<?=$i.$j?>">
                                      <label class="form-check-label" for="EditC<?=$i.$j?>"><?='C'.$j?></label>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="col-4">
                                  <?php for ($j=1; $j <= 5; $j++) { ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?='P'.$i.$j?>" name="EditP<?=$i?>" id="EditP<?=$i.$j?>">
                                      <label class="form-check-label" for="EditP<?=$i.$j?>"><?='P'.$j?></label>
                                    </div>
                                  <?php } ?>
                                </div>
                              </div>
                            </td>
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
          "lengthMenu": [ [5, 10, 20, 30, -1], [5, 10, 20, 30, "All"] ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
        })

        $(document).on("click",".Valid",function(){
					var Valid = {Id: $(this).attr('Valid')}
          var Konfirmasi = confirm("Yakin Ingin Validasi RPS?");
      		if (Konfirmasi == true) {
            $.post(BaseURL+"Dashboard/KPSValidasiRPS", Valid).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/PlotRPS"
              } else {
                alert(Respon)
              }
            })
          }
				})

        $(document).on("click",".Tolak",function(){
					var Tolak = {Id: $(this).attr('Tolak')}
          var Konfirmasi = confirm("Yakin Ingin Menolak RPS?");
      		if (Konfirmasi == true) {
            $.post(BaseURL+"Dashboard/KPSTolakRPS", Tolak).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/PlotRPS"
              } else {
                alert(Respon)
              }
            })
          }
				})

        $(document).on("click",".Edit",function(){
          $.post(BaseURL+"Dashboard/GetRPS/"+$(this).attr('Edit')).done(function(Respon) {
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
            $("#EditCPL").val(Data.CPL.split("<br/>").join("\n"))
            $("#EditCPM").val(Data.CPM.split("<br/>").join("\n"))
            $("#EditDeskripsi").val(Data.Deskripsi.split("<br/>").join("\n"))
            $("#EditBahanKajian").val(Data.BahanKajian.split("<br/>").join("\n"))
            $("#EditReferensiUtama").val(Data.ReferensiUtama.split("<br/>").join("\n"))
            $("#EditReferensiPendudukung").val(Data.ReferensiPendudukung.split("<br/>").join("\n"))
            // $("#EditDosenPengampu").val(Data.DosenPengampu.split("<br/>").join("\n"))
            $("#EditMKPrasyarat").val(Data.MKPrasyarat.split("<br/>").join("\n"))
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
              $("#EditSubCPMK"+i).val(Minggu[i-1][0].split('|')[0].split("<br/>").join("\n"))
              T = Minggu[i-1][0].split('|')
              for (let j = 1; j < T.length; j++) {
                if (T[j] != "") {
                  $("#Edit"+T[j]).attr('checked', true);
                }
              }
              $("#EditMateriPembelajaran"+i).val(Minggu[i-1][1].split("<br/>").join("\n"))
              $("#EditMetodePembelajaran"+i).val(Minggu[i-1][2].split("<br/>").join("\n"))
              $("#EditEstimasiWaktu"+i).val(Minggu[i-1][3].split("<br/>").join("\n"))
              $("#EditPenugasan"+i).val(Minggu[i-1][4].split("<br/>").join("\n"))
              $("#EditKriteria"+i).val(Minggu[i-1][5].split("<br/>").join("\n"))
              $("#EditIndikator"+i).val(Minggu[i-1][6].split("<br/>").join("\n"))
              $("#EditBobot"+i).val(Minggu[i-1][7].split("<br/>").join("\n"))
            }
            $('#ModalEditRPS').modal("show")
          })
				})

        $(document).on("click",".Unduh",function(){
          window.location = BaseURL + "Dashboard/UnduhRPS/" + $(this).attr('Unduh')
				})
      })
    </script>
  </body>
</html>