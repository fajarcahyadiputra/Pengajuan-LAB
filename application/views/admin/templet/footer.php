  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
          <b><a href="" target="_blank">diri sendiri</a></b>
        </span>
      </div>
    </div>
  </footer>
  <!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/ruang-admin.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/datatable/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url('assets/') ?>sweetalert/sweetalert2.all.min.js"></script>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
    //datatable
    var table = $('#datatable').DataTable({

    });
    //end datatable

    //ajax untuk tambah data guru

    $('#form-guru').on('submit', function(e){
      e.preventDefault();
      let data = new FormData(document.forms['form-guru']);

      $.ajax({
        url         : base_url + 'admin/tambah_data_guru',
        contentType : false,
        processData : false,
        cache       : false,
        async       : true,
        data        : data,
        type        : 'post',
        dataType    : 'json',
        success: function(hasil){

          if(hasil.insert == true){
            Swal.fire({
              icon: 'success',
              title: 'Berhasil...',
              text: 'Selamat Data Berhasil Di masukan!',
            })
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Data Gagal Di masukan!',
            })
          }
          setTimeout(function(){
            location.reload(); 
          },800);

        }
      })
    })
    //end ajax tambah data guru

    //ajax untuk delete data guru
    $('#datatable').on('click','#tombol-hapusguru', function(){
      let id = $(this).data('id');
      let foto  = $(this).data('foto');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url      : base_url + 'admin/hapus_data_guru/' + id + '/' + foto,
            type     : 'get',
            dataType : 'json',
            success: function(hasil){
             if(hasil.delete == true){
              Swal.fire(
                'Terhapus',
                'Data Berhasil Di hapus',
                'success'
                )
            }else{
              Swal.fire(
                'Oops!',
                'Data gagal Di Hapus.',
                'error'
                )
            }
            setTimeout(function(){
              location.reload(); 
            },800);
          }
        })
        }
      })
    })
    //end ajax hapus data guru

    //ajax untuk tampil edit 
    $('#datatable').on('click', '#tombol-editguru', function(){
      let id    = $(this).data('id');

      $.ajax({
        url       : base_url + 'admin/tampil_dataeditguru/' + id,
        type      : 'get',
        dataType  : 'json',
        success: function(hasil){
          $('.penampung-edit-guru').html(
           `<form id="form-edit-guru" method="post" name="form-edit-guru">
           <div class="form-group">
           <label for="kode_guru">Kode Guru</label>
           <input hidden="" type="text" id="id" name="id" class="form-control" value="${hasil.id}">
           <input required="" type="text" id="kode_guru" name="kode_guru" class="form-control" value="${hasil.kode_guru}">
           </div>
           <div class="form-group">
           <label for="nama_guru">Nama Guru</label>
           <input required type="text" name="nama_guru" class="form-control" id="nama_guru" value="${hasil.nama_guru}"> 
           </div>
           <div class="form-group">
           <label for="email">Email</label>
           <input required  type="text" id="email" name="email" class="form-control" value="${hasil.email}">
           </div>
           <div class="form-group">
           <label for="apakah_aktif">Apakah Aktif</label>
           <input required  type="text" hidden="" name="aktif_lama"  value="${hasil.apakah_aktif}">
           <select required id="apakah_aktif" name="apakah_aktif" class="form-control">
           <option disabled="" selected="">Apakah aktif?</option>
           <option value="aktif">Aktif</option>
           <option value="tidak">Tidak</option>
           </select>
           </div>
           <div class="form-group">
           <label for="password">Password</label>
           <input  type="text" id="password" name="password" class="form-control" value="${hasil.password}">
           </div>
           <div class="form-group">
           <label for="no_hp">NO HP</label>
           <input required type="text" id="no_hp" name="no_hp" class="form-control" value="${hasil.no_hp}">
           </div>
           <div class="form-group">
           <img class="mb-3" src="../upload/foto_guru/${hasil.foto}" width="100" alt="">
           <input  type="file" id="foto" name="foto" class="form-control">
           <input  type="text" hidden="" id="foto_lama" name="foto_lama" class="form-control" value="${hasil.foto}">
           </div>
           <button style="width:140px" type="submit" class="btn btn-primary ml-2 mb-3" id="tombol-edit-guru">Edit</button>
           <button style="width:140px" type="reset" class="btn btn-danger tombol-reset ml-2 mb-3">Reset</button>
           <button style="width:140px" type="button" class="btn btn-secondary tombol-close ml-2 mb-3" data-dismiss="modal">Close</button>
           </form>`
           );
          $('#modal-edit-guru').modal('show');
        }
      })
    })
    //end ajax tampil data guru

    //ajax  edit data guru
    $('.penampung-edit-guru').on('submit','#form-edit-guru', function(e){
      e.preventDefault();

      let data = new FormData(document.forms['form-edit-guru']);

      $.ajax({
        url         : base_url + 'admin/ubah_data_guru',
        data        : data,
        dataType    : 'json',
        processData : false,
        contentType : false,
        cache       : false,
        async       : true,
        type        : 'post',
        success: function(hasil){
          $('#modal-edit-guru').modal('hide');
          if(hasil.edit == true){
            Swal.fire({
              icon: 'success',
              title: 'Berhasil...',
              text: 'Selamat Data Berhasil Di edit!',
            })
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Data Gagal Di edit!',
            })
          }
          setTimeout(function(){
            location.reload(); 
          },800);
        }
      })
    })
    //edn ajax untuk edit data guru

    //ajax untuk tambah data lab
    $('#form-lab').on('submit', function(e){
      e.preventDefault();
      let data = new FormData(document.forms['form-lab']);

      $.ajax({
        url         : base_url + 'admin/tambah_data_lab',
        data        : data,
        processData : false,
        cache       : false,
        async       : true,
        contentType : false,
        dataType    : 'json',
        type        : 'post',
        success: function(hasil){
          $('#modal-lab').modal('hide');
          if(hasil.insert == true){
            Swal.fire({
              icon: 'success',
              title: 'Berhasil...',
              text: 'Selamat Data Berhasil Di masukan!',
            })
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Data Gagal Di masukan!',
            })
          }
          setTimeout(function(){
            location.reload(); 
          },800);
          
        }
      })
    })
    //edn ajax untuk tambah data lab

    //ajax untuk hapus data lab
    $('#datatable').on('click','#tombol-hapuslab', function(){
      let id    = $(this).data('id');
      let foto  = $(this).data('foto');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url       : base_url + 'admin/hapus_data_lab/' + id  + '/' + foto,
            type      : 'get',
            dataType  : 'json',
            success: function(hasil){
             if(hasil.delete == true){
              Swal.fire(
                'Terhapus',
                'Data Berhasil Di hapus',
                'success'
                )
            }else{
              Swal.fire(
                'Oops!',
                'Data gagal Di Hapus.',
                'error'
                )
            }
            setTimeout(function(){
              location.reload(); 
            },800);
          }
        })
        }
      })
    })
    //emd ajax hapus data lab

    //ajax untuk tampil edit data lab
    $('#datatable').on('click','#tombol-editlab', function(){
      let id = $(this).data('id');

      $.ajax({
        url     : base_url + 'admin/tampil_data_edit_lab/' + id,
        type    : 'get',
        dataType: 'json',
        success: function(hasil){
          $('.penampung-edit-lab').html(

            `<form id="form-edit-lab" method="post" name="form-lab">
            <div class="form-group">
            <label for="kode_lab">Kode LAB</label>
            <input required="" type="text" id="kode_lab" name="kode_lab" class="form-control" value="${hasil.kode_lab}" >
            <input required="" hidden="" type="text" id="id" name="id" class="form-control" value="${hasil.id}" >
            </div>
            <div class="form-group">
            <label for="nama_lab">Nama LAB</label>
            <input type="text" required name="nama_lab" class="form-control" id="nama_lab" value="${hasil.nama_lab}"> 
            </div>
            <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <input  required type="text" id="fasilitas" name="fasilitas" class="form-control" value="${hasil.fasilitas}">
            </div>
            <div class="form-group">
            <label for="apakah_aktif">Apakah Aktif</label>
            <input required  type="text" hidden="" name="aktif_lama"  value="${hasil.apakah_aktif}">
            <select id="apakah_aktif" name="apakah_aktif" class="form-control">
            <option disabled="" selected="">Apakah aktif?</option>
            <option value="aktif">Aktif</option>
            <option value="tidak">Tidak</option>
            </select>
            </div>
            <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan" rows="3" cols="10">${hasil.keterangan}</textarea>
            </div>
            <div class="form-group">
            <img class="mb-3" src="../upload/foto_lab/${hasil.foto}" width="100" alt="">
            <input  type="file" id="foto" name="foto" class="form-control">
            <input hidden="" type="text" id="foto_lama" name="foto_lama" class="form-control" value="${hasil.foto}">
            </div>
            <button style="width:140px" type="submit"  class="btn btn-primary ml-2" id="edit-data-lab">Edit</button>
            <button style="width:140px" type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
            <button style="width:140px" type="button" class="btn btn-secondary tombol-close ml-2" data-dismiss="modal">Close</button>
            </form>`

            );
          $('#modal-edit-lab').modal('show');
        }
      })
    })
    //end ajax tampil edit lab

    //ajax edit data lab
    $('.penampung-edit-lab').on('submit','#form-edit-lab', function(e){
      e.preventDefault();

      let data  = new  FormData(document.forms['form-edit-lab']);

      $.ajax({
        url             : base_url + 'admin/edit_data_lab',
        data            : data,
        dataType        : 'json',
        type            : 'POST',
        contentType     : false,
        processData     : false,
        cache           : false,
        async           : true,
        success: function(hasil){
          $('#modal-edit-lab').modal('hide');
          if(hasil.edit == true){
            Swal.fire({
              icon: 'success',
              title: 'Berhasil...',
              text: 'Selamat Data Berhasil Di edit!',
            })
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Data Gagal Di edit!',
            })
          }
          setTimeout(function(){
            location.reload(); 
          },800);
        }
      })
    })
    //end edit data lab

    //ajax untuk delete pengajuan
    $('#datatable').on('click','#tombol-hapuspengajuan', function(){
      let id = $(this).data('id');
      

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url : base_url + 'admin/hapus_datapengajuan/' + id,
            type : 'get',
            dataType : 'json',
            success: function(hasil){
             if(hasil.delete == true){
              Swal.fire(
                'Terhapus',
                'Data Berhasil Di hapus',
                'success'
                )
            }else{
              Swal.fire(
                'Oops!',
                'Data gagal Di Hapus.',
                'error'
                )
            }
            setTimeout(function(){
              location.reload(); 
            },800);
          }
        })

        }
      })

    })
    //end ajax untuk delete data pengajuan

    //ajax tampil detail riwayat pengajuan
    $('#datatable').on('click', '#tombol-detail-riwayat-pengajuan', function(){
      let id = $(this).data('id');

      $.ajax({
        url : base_url + 'admin/detail_riwayat_pengajuanlab/' + id,
        type : 'get',
        dataType : 'json',
        success: function(hasil){
          $('#modal-detai-riwayat-pengajuan').modal('show');
          $('.penampung-detail-riwayat-pengajuan').html(`

            <table class="table table-striped  table-hover">
            <tr>
            <th>Kode Pengajuan</th>
            <td>:</td>
            <td>${hasil.kode_pengajuan}</td>
            </tr>
            <tr>
            <th>Kode LAB</th>
            <td>:</td>
            <td>${hasil.kode_lab}</td>
            </tr>
            <tr>
            <th>Kode Guru</th>
            <td>:</td>
            <td>${hasil.kode_guru}</td>
            </tr>
            <tr>
            <th>Nama Guru</th>
            <td>:</td>
            <td>${hasil.nama_guru}</td>
            </tr>
            <tr>
            <th>Tanggal Pengajuan</th>
            <td>:</td>
            <td>${hasil.tanggal_pengajuan}</td>
            </tr>
            <tr>
            <th>Tanggal Pemakaian</th>
            <td>:</td>
            <td>${hasil.tanggal_pemakaian}</td>
            </tr>
            <tr>
            <th>Batas Pemakaian</th>
            <td>:</td>
            <td>${hasil.batas_pemakaian}</td>
            </tr>
            <tr>
            <th>NO Handphone</th>
            <td>:</td>
            <td>${hasil.nohp_guru}</td>
            </tr>
            <tr>
            <th>Keterangan</th>
            <td>:</td>
            <td><textarea rows="3" class="form-control" readonly>${hasil.keterangan}</textarea></td>
            </tr>
            </table>

            `)
        }
      })
    })
    //end ajax untuk menampilkan data riwayat pembelian

    //ajax untuk hapus riwayat pengajuan lab
    $('#datatable').on('click', '#tombol-hapus-riwayat-pengajuan', function(){
      let id = $(this).data('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url : base_url + 'admin/hapus_riwayat_pengajuan/' + id,
            type : 'get',
            dataType : 'json',
            success: function(hasil){
              console.log(hasil)
              if(hasil.delete == true){
                Swal.fire(
                  'Terhapus',
                  'Data Berhasil Di hapus',
                  'success'
                  )
              }else{
                Swal.fire(
                  'Oops!',
                  'Data gagal Di Hapus.',
                  'error'
                  )
              }
              setTimeout(function(){
                location.reload(); 
              },800);
            }
          })

        }
      })

    })
    //end ajax untuk hapus riwayat pengajuan lab

    //ajax untuk tambah data admin
    $('#form-admin').on('submit', function(e){
      e.preventDefault();
      const data = $('#form-admin').serialize();
      $.ajax({
        url: base_url + 'admin/tambah_admin',
        data: data,
        type: 'post',
        dataType: 'json',
        success: function(hasil){
         if(hasil.tambah == true){
          Swal.fire(
            'sukses',
            'Data Berhasil Di tambah',
            'success'
            )
        }else{
          Swal.fire(
            'Oops!',
            'Data gagal Di tambah.',
            'error'
            )
        }
        setTimeout(function(){
          location.reload(); 
        },800);
      }
    })
    })
    //end

    //ajax untuk hapus data admin
    $('#datatable').on('click','#tombol-hapusAdmin', function(){
      const id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url: base_url + 'admin/hapus_admin',
            data: {'id':id},
            type: 'post',
            dataType: 'json',
            success: function(hasil){
             if(hasil.delete == true){
              Swal.fire(
                'Terhapus',
                'Data Berhasil Di hapus',
                'success'
                )
            }else{
              Swal.fire(
                'Oops!',
                'Data gagal Di Hapus.',
                'error'
                )
            }
            setTimeout(function(){
              location.reload(); 
            },800);
          }
        })
        }
      })

    })
    //end

    //ajax tampil data admin
    $('#datatable').on('click','#tombol-editAdmin', function(){
      const id = $(this).data('id');
      $.ajax({
        url: base_url + 'admin/tampil_data_admin',
        data: {'id':id},
        dataType: 'json',
        type: 'post',
        success: function(hasil){
          $('.penampung-edit-admin').html(`
            <form id="form-edit-admin" method="post">
            <div class="form-group">
            <label for="kode_user">Kode Admin</label>
            <input required="" type="text" id="kode_user" name="kode_user" class="form-control" value="${hasil.kode_user}" >
            <input  type="text" name="kode_user_lama" hidden value="${hasil.kode_user}" >
            </div>
            <div class="form-group">
            <label for="nama">Nama</label>
            <input required="" type="text" name="nama" class="form-control" id="nama" value="${hasil.nama}"> 
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input  required="" type="email" id="email" name="email" class="form-control" value="${hasil.email}">
            </div>
            <div class="form-group">
            <label for="status_aktif">Status Aktif</label>
            <select id="status_aktif" name="status_aktif" class="form-control">
            <option ${hasil.status_aktif == 'aktif'?'selected':''} value="aktif">Aktif</option>
            <option ${hasil.status_aktif == 'tidak'?'selected':''} value="tidak">Tidak</option>
            </select>
            </div>
            <div class="form-group">
            <label for="username">Username</label>
            <input  required="" type="text" id="username" name="username" class="form-control" value="${hasil.username}">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input  required="" type="text" id="password" name="password" class="form-control" value="${hasil.text_password}">
            </div>
            <div class="form-group">
            <label for="no_hp">No HP</label>
            <input  required="" type="number" id="no_hp" name="no_hp" class="form-control" value="${hasil.no_hp}">
            </div>
            <button style="width:140px" type="submit" class="btn btn-primary ml-3" id="edit-admin">Edit</button>
            <button style="width:140px" type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
            <button style="width:140px" type="button" class="btn btn-secondary tombol-close ml-2" data-dismiss="modal">Close</button>
            </form>
            `)
          $('#modal-edit-admin').modal('show');
        }
      })
    })
    //end

    //ajax untuk edit data admin
    $('.penampung-edit-admin').on('submit','#form-edit-admin', function(e){
      e.preventDefault();
      const data = $('#form-edit-admin').serialize();
      $.ajax({
        url: base_url + 'admin/edit_data_admin',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function(hasil){
         $('#modal-edit-admin').modal('hide');
         if(hasil.edit == true){
          Swal.fire({
            icon: 'success',
            title: 'Berhasil...',
            text: 'Selamat Data Berhasil Di edit!',
          })
        }else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data Gagal Di edit!',
          })
        }
        setTimeout(function(){
          location.reload(); 
        },800);
      }
    })
    })
    //end

    //ajax untuk tombol approve
    $('#datatable').on('click','#tombol-approve', function(){
      const id = $(this).data('id');


      Swal.fire({
        title: 'Are you sure?',
        text: "Want To Approve It!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url: base_url + 'admin/approve_pengajuan',
            data:{'id':id},
            dataType: 'json',
            type: 'post',
            success: function(hasil){
             if(hasil.approve == true){
              Swal.fire({
                icon: 'success',
                title: 'Berhasil...',
                text: 'Selamat Berhasil Di approve!',
              })
            }else{
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data Gagal Di approve!',
              })
            }
            setTimeout(function(){
              location.reload(); 
            },800);
          }
        })

        }
      })
    })
    //end
  })
</script>

