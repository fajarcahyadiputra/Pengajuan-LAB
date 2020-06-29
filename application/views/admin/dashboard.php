<?php if(!$this->session->userdata('username')){ 

  redirect('auth');
}else{
  ?>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper" style="height: 500px" >


    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumblah Request</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($pengajuan) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumblah Guru</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo count($guru) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- New User Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumblah LAB</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo count($lab) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->

    </div>
    <hr>  
    <h5>Welcome, <span class="font-weight-bold"><?php echo  $this->session->userdata('username') ?></span></h5>
    <!---Container Fluid-->
  </div>

<?php } ?>
