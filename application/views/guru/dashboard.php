<?php if(!$this->session->userdata('username')){ 

  redirect('auth');
}else{
  ?>

  <!DOCTYPE html>
  <html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Porfolio</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
    <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="#home" class="navbar-brand page-scroll"><?php echo $this->session->userdata('username') ?></a>
        </div>
        

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('Auth/logout_user') ?>" class="page-scroll">Logout</a></li>
          </ul>
        </div>

      </div>
    </nav>
    <!-- akhir navbar -->
    
    <!-- jumbotron -->
    <div class="jumbotron text-center">
      <img src="<?php echo base_url('upload/foto_guru/').$this->session->userdata('foto') ?>" class="img-circle img-thumbnail">
			<h1>Welcome, <?php echo $this->session->userdata('nama') ?></h1>
			<h4 style="font-weight: bold; color: white">SISTEM RESERVASI LAB KOMPUTER</h4>
    </div>
    <!-- akhir jumbotron -->




    <!-- portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2>Daftar LAB Yang Tersedia</h2>
            <hr>
          </div>
        </div>

        <!-- daftar lab -->
        <div class="row">
          <?php foreach($data_lab as $lb ) :  ?>
            <div class="col-sm-4">
              <div  class="thumbnail">
                <img style="height: 300px" src="<?php echo base_url('upload/foto_lab/').$lb->foto ?>">
                <div class="card-body">
                  <div style="background-color: lightgrey; width : 100%; margin: auto; margin-top: 10px">
                    <table class="table">
											<tr>
												<td>Nama Lab<td>
												<td>:</td>
												<td><?php echo $lb->nama_lab ?></td>
											</tr>	
										</table>
									</div>
									<div style="text-align: center">
										<button <?php foreach($cek_booking as $value): echo $value->kode_lab === $lb->kode_lab ? "disabled" : null; break; endforeach ?>  type="button" data-id="<?php echo $lb->kode_lab ?>"  class="btn btn-sm btn-warning tombol-pengajuan" style="width: 220px">Request LAB</button>
										<button type="button" data-id="<?php echo $lb->kode_lab ?>" class="btn btn-sm btn-primary tombol-detail" style="width: 120px"><i class="fa fa-info"></i></button>
									</div>
								</div>
							</div>
						</div>
            <?php endforeach ?>
          </div>
				</div>

				<div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2>Daftar LAB Yang Telah di pesan</h2>
            <hr>
          </div>
        </div>

        <!-- daftar lab -->
        <div class="row">
          <?php foreach($labku as $lb ) :  ?>
            <div class="col-sm-4">
              <div  class="thumbnail">
                <img style="height: 300px" src="<?php echo base_url('upload/foto_lab/').$lb->foto ?>">
                <div class="card-body">
                  <div style="background-color: lightgrey; width : 100%; margin: auto; margin-top: 10px">
                    <table class="table">
											<tr>
												<td>Nama Lab<td>
												<td>:</td>
												<td><?php echo $lb->nama_lab ?></td>
											</tr>

											<?php foreach($cek_booking as $key => $cek): ?>
											<?php if($cek->kode_lab == $lb->kode_lab): ?>
											<tr>
												<td>Telah di pesan<td>
												<td>:</td>
												<td>Ya</td>
											</tr>
											<tr>
												<td>Sampai Tanggal<td>
												<td>:</td>
												<td><?= $cek->batas_pemakaian ?></td>
											</tr>
											<tr>
												<td>Nama Kelas<td>
												<td>:</td>
												<td><?= $cek->kelas ?></td>
											</tr>
											<tr>
												<td>Mata Pelajaran<td>
												<td>:</td>
												<td><?= $cek->mata_pelajaran ?></td>
											</tr>
											<?php break; elseif($key == count($cek_booking)-1): ?>
											<tr>
												<td>Telah di Pesan<td>
												<td>:</td>
												<td>Tidak</td>
											</tr>
											<tr>
												<td>Sampai Tanggal<td>
												<td>:</td>
												<td>-</td>
											</tr>
											<?php endif ?>
											<?php endforeach; ?>

											<?php if(empty(count($cek_booking))): ?>
											<tr>
												<td>Telah di booking<td>
												<td>:</td>
												<td>Belum</td>
											</tr>
											<tr>
												<td>Sampai Tanggal<td>
												<td>:</td>
												<td>-</td>
											</tr>
											<?php endif; ?>
										</table>
									</div>
									<div style="text-align: center">
										<button type="button" data-id="<?php echo $lb->kode_lab ?>" class="btn btn-sm btn-primary tombol-detail" style="width: 120px"><i class="fa fa-info"></i></button>
									</div>
								</div>
							</div>
						</div>
            <?php endforeach ?>
          </div>
				</div>
      </section>
      <br>
      <br>
      <!-- daftar lab -->


      <!-- contact -->
<!--       <section class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Contact</h2>
              <hr>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <form>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" class="form-control" placeholder="masukkan nama">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="masukkan email">
                </div>
                <div class="form-group">
                  <label for="telp">No Telepon</label>
                  <input type="tel" id="telp" class="form-control" placeholder="masukkan no telepon">
                </div>
                <select class="form-control">
                  <option>-- Pilih Kategori --</option>
                  <option>Web Design</option>
                  <option>Web Development</option>
                </select>
                <div class="form-group">
                  <label for="pesan">Pesan</label>
                  <textarea class="form-control" rows="10" placeholder="masukkan pesan"></textarea>
                </div>adeadada
adeadada


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url('assets/') ?>js/jquery.easing.1.3.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>
      <script src="<?php echo base_url('assets/') ?>js/script.js"></script>
      <script src="<?php echo base_url('assets/') ?>sweetalert/sweetalert2.all.min.js"></script>
      <!--   jquery -->
      <script type="text/javascript">
        $(document).ready(function(){
          //untuk nampilikan modal pengajuan
          $('.tombol-pengajuan').on('click', function(){
            let id = $(this).data('id');
            $('.penampung-pengajuan-lab').html(
              `  
              <style>
              form .bawah-request{
                display: flex;
                justify-content: space-around;
              }
              </style>
              <form id="form-pengajuan" name="form-pengajuan" style="margin: 20px">
              <div class="form-group">
              <input hidden required="" type="text" readonly name="kode_pengajuan" id="kode_pengajuan" value="<?php echo $kode ?>">
              </div>
              <div class="form-group">
              <input required="" hidden="" type="text" readonly name="kode_lab"  id="kode_lab" value="${id}">
              </div>
              <div class="form-group">
              <label for="kode_guru">Kode Guru</label>
              <input required="" type="text" readonly name="kode_guru" class="form-control" id="kode_guru" value="<?php echo $this->session->userdata('kode_guru') ?>">
							</div>
							<div class="form-group">
              <label for="sampai_jam">Nama Kelas</label>
							<select name="nama_kelas"  class="form-control">
							<?php foreach($kelas as $name_kelas): ?>
							<option value="<?= $name_kelas->nama_kelas ?>"><?= $name_kelas->nama_kelas ?></option>
							<?php endforeach; ?>
							</select>
							</div>
							<div class="form-group">
              <label for="sampai_jam">Mata Pelajaran</label>
							<select name="mata_pelajaran"  class="form-control">
							<?php foreach($pelajaran as $mata_pelajaran): ?>
							<option value="<?= $mata_pelajaran->mata_pelajaran ?>"><?= $mata_pelajaran->mata_pelajaran ?></option>
							<?php endforeach; ?>
							</select>
							</div>
              <div class="form-group">
              <label for="nama_guru">Nama</label>
              <input required="" type="text" name="nama_guru" class="form-control" id="nama_guru" value="<?php echo $this->session->userdata('nama') ?>">
              </div>
              <div class="form-group">
              <label for="nohp_guru">Nomer HP</label>
              <input required="" type="text" name="nohp_guru" class="form-control" id="nohp_guru" value="<?php echo $this->session->userdata('no_hp') ?>">
              </div>
              <div class="form-group">
              <label for="tanggal_pemakaian">Tanggal Pemakaian</label>
              <input required="" type="date" name="tanggal_pemakaian" class="form-control" id="tanggal_pemakaian" >
              </div>
              <div class="form-group">
              <label for="jam_pemakaian">Jam Pemakaian</label>
              <input required="" type="time" name="jam_pemakaian" min="09:00" max="21:00" class="form-control" id="jam_pemakaian" >
              </div>
              <div class="form-group">
              <label for="sampai_jam">Sampai Jam</label>
              <input required="" type="time" name="sampai_jam" min="09:00" max="21:00" class="form-control" id="sampai_jam" >
							</div>
              <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea name="keterangan" rows="3" class="form-control" id="keterangan"></textarea>
              </div>
              <div class="form-group">
              <label for="foto">Foto</label>
              <br>
              <img src="<?php echo base_url('upload/foto_guru/').$this->session->userdata('foto') ?>" width="100" class="img-thumbnail mb-2">
              <input type="file" name="foto" class="form-control" id="foto">
              <input type="text" hidden="" value="<?php echo $this->session->userdata('foto') ?>" name="foto_lama" >
              </div>
              <div class="bawah-request">
              <button style="width:168px" type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              <button style="width:168px"  class="btn btn-danger" type="reset">Reset</button>
              <button style="width:168px"  id="tombol-megajukan"  type="submit" class="btn btn-primary">Mengajukan</button>
              </div>
              </div>
              </form>
              `
              );
            $('#modal-pengajuan').modal('show');
          })
          //end pengajuan

          //ajax untuk untuk pengajuan lab
          $('.penampung-pengajuan-lab').on('submit','#form-pengajuan',function(e){
            e.preventDefault();
            let data = new FormData(document.forms['form-pengajuan']);
            
            $.ajax({
              url            : "<?php echo base_url('guru/mengajukan_lab') ?>",
              data           : data,
              processData    : false,
              contentType    : false,
              cache          : false,
              async          : true,
              dataType       : 'json',
              type           : 'post',
              success: function(hasil){
               $('#modal-pengajuan').modal('hide');
               if(hasil.pengajuan == false){
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                })
              }else{
                Swal.fire({
                  icon: 'success',
                  title: 'success',
                  text: 'Request Success, Kode Pengajuan : ' +  hasil.kode_pengajuan,
                  footer: `<a  class="btn btn-info" href="<?php echo base_url('admin/report_pdf_pengajuan/') ?>${hasil.id}">Cetak PDF?</a>`,
                }).then(()=>{
                  location.reload();
                })
              }

            }
          })
          })
          //edn ajax untk mengajukan

          //ajax menampilkan detail

          $('.tombol-detail').on('click', function(){
            let id =  $(this).data('id');
            let base_url = '<?php echo base_url() ?>';
            $.ajax({
              url       : base_url + 'guru/tampil_detail_lab/' + id ,
              type      : 'get',
              dataType  : 'json',
              success: function(hasil){
                $('.penampung-detail-lab').html(
                  `<table class="table table-striped  table-hover">
                  <tr>
                  <th>Kode LAB</th>
                  <td>:</td>
                  <td>${hasil.kode_lab}</td>
                  </tr>
                  <tr>
                  <th>Nama LAB</th>
                  <td>:</td>
                  <td>${hasil.nama_lab}</td>
                  </tr>
                  <tr>
                  <th>Fasilitas</th>
                  <td>:</td>
                  <td>${hasil.fasilitas}</td>
                  </tr>
                  <tr>
                  <th>Keterangan</th>
                  <td>:</td>
                  <td><textarea class="form-control"  readonly rows="3">${hasil.keterangan}</textarea></td>
                  </tr>
                  </table>`
                  );
                $('#modal-detail-lab').modal('show');
              }
            })
          })

          //end ajax menampilkan detail
        })
      </script>
      <!--  end jquery -->
    </body>
    </html>

    <!-- Modal request-->
    <div class="modal fade" id="modal-pengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Pengajuan LAB</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="penampung-pengajuan-lab">

          </div>
        </div>
      </div>
    </div>

    <!-- Modal detail -->
    <div class="modal fade" id="modal-detail-lab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             <h5 class="modal-title" id="exampleModalLabel">DETAIL LAB</h5>
          </div>
          <div class="penampung-detail-lab" style="margin:20px">

          </div>
        </div>
      </div>
    </div>

  <?php } ?>







