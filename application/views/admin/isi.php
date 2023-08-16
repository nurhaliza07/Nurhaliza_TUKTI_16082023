<?php
//==================================== HOME ====================================
if ($page == 'home') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_santri; ?></h3>

                <p>Jumlah Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('admin/mahasiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_guru; ?></h3>

                <p>Jumlah UKM</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo base_url('admin/ukm') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    
  </div>
<?php
}

//==================================== MAHASISWA ====================================
else if ($page == 'mahasiswa') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">
          <a href=<?php echo base_url("admin/mahasiswa_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
            Tambah Mahasiswa</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            foreach ($mahasiswa as $d) { ?>
              <tr>

                <td><?php echo $d['nim'] ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo $d['tanggal_lahir'] ?></td>
                <td><?php echo $d['alamat'] ?></td>
                <td>
                  <a href=<?php echo base_url("admin/mahasiswa_edit/") . $d['id_mhs']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                  <a href=<?php echo base_url("admin/mahasiswa_detil/") . $d['id_mhs']; ?>>
                    <i class="fas fa-search-plus"></i></a>
                  <a href=<?php echo base_url("admin/mahasiswa_hapus/") . $d['id_mhs']; ?> onclick="return confirm('Yakin menghapus Mahasiswa : <?php echo $d['nama']; ?> ?');" ;><i class="fas fa-trash-alt"></i></a>

                </td>
              </tr>
            <?php
            }
            ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

//--------------------------------- Detil ---------------------------------
else if ($page == 'mahasiswa_detil') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <dl class="row">
            <dt class="col-sm-2">NIM</dt>
            <dd class="col-sm-10"><?php echo $d['nim']; ?></dd>
            <dt class="col-sm-2">Nama </dt>
            <dd class="col-sm-10"><?php echo $d['nama']; ?></dd>
            <dt class="col-sm-2">Tanggal Lahir</dt>
            <dd class="col-sm-10"><?php echo $d['tanggal_lahir']; ?></dd>
            <dt class="col-sm-2">Alamat</dt>
            <dd class="col-sm-10"><?php echo $d['alamat']; ?></dd>
           
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php

  //--------------------------------- Tambah ---------------------------------
} else if ($page == 'mahasiswa_tambah') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/mahasiswa_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama')); ?></span>
                </div>
              </div>

               <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" placeholder="Masukkan Tanggal Lahir">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tanggal_lahir')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Masukkan Alamat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat')); ?></span>
                </div>
              </div>

              

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php

  //--------------------------------- Edit ---------------------------------
} else if ($page == 'mahasiswa_edit') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/mahasiswa_edit/' . $d['nim']); ?>" class="form-horizontal">
        

            <div class="card-body">

              <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim', $d['nim']); ?>" placeholder="Masukkan NIM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama', $d['nama']); ?>" placeholder="Masukkan Nama">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir', $d['tanggal_lahir']); ?>" placeholder="Masukkan Tanggal Lahir">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tanggal_lahir')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat', $d['alamat']); ?>" placeholder="Masukkan Alamat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat')); ?></span>
                </div>
              </div>
             

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php
}

//==================================== UKM ====================================
else if ($page == 'ukm') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">
          <a href=<?php echo base_url("admin/ukm_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">Tambah UKM</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>Nama UKM</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <?php
            foreach ($ukm as $d) { ?>
              <tr>

                <td><?php echo $d['nama_ukm'] ?></td>
                <td><?php echo $d['deskripsi'] ?></td>
                <td>
                  <a href=<?php echo base_url("admin/ukm_edit/") . $d['id_ukm']; ?>><i class="fas fa-pencil-alt"></i> </a>
                  <a href=<?php echo base_url("admin/ukm_hapus/") . $d['id_ukm']; ?> onclick="return confirm('Yakin menghapus UKM : <?php echo $d['nama_ukm']; ?> ?');" ;> <i class="fas fa-trash-alt"></i></a>



                </td>


              </tr>
            <?php
            }
            ?>
          </table>

        </div>
      </div>
    </section>
  </div>

<?php
}

//--------------------------------- TAMBAH ---------------------------------
else if ($page == 'ukm_tambah') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        
        <div class="card-body">

          <?php echo validation_errors(); ?>

          <form method="POST" action="<?php echo base_url('admin/ukm_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nama_ukm" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_ukm" id="nama_ukm" value="<?php echo set_value('nama_ukm'); ?>" placeholder="Masukkan Nama UKM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                </div>

                 
              </div>
                <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi'); ?>" placeholder="Masukkan Deskripsi">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
       
      </div>
    </section>
  </div>

<?php
}

//--------------------------------- EDIT ---------------------------------
else if ($page == 'ukm_edit') {
?>
   <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/ukm_edit/' . $d['nama_ukm']); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nama_ukm" class="col-sm-2 col-form-label">Nama UKM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_ukm" id="nama_ukm" value="<?php echo set_value('nama_ukm', $d['nama_ukm']); ?>" placeholder="Masukkan Nama UKM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                </div>
              </div>

               <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi', $d['deskripsi']); ?>" placeholder="Masukkan Deskripsi">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                </div>
              </div>

            

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>

<?php
}


//=============PENDAFTARAN ANGGOTA ========

else if ($page == 'daftar') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">
        
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>UKM</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            foreach ($daftar as $d) { ?>
              <tr>
                <td><?php echo $d['nim'] ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo $d['nama_ukm'] ?></td>
              
                <td>
                  <a href=<?php echo base_url("admin/daftar_edit/") . $d['id_daftar']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                 
                  <a href=<?php echo base_url("admin/daftar_hapus/") . $d['id_daftar']; ?> onclick="return confirm('Yakin menghapus Mahasiswa : <?php echo $d['nama']; ?> ?');" ;><i class="fas fa-trash-alt"></i></a>

                </td>
              </tr>
            <?php
            }
            ?>
          </table>

        </div>
    </section>
  </div>

<?php


  //--------------------------------- Tambah ---------------------------------
} else if ($page == 'daftar_tambah') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/daftar_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_mhs', $ddmhs, set_value('id_mhs')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_mhs')); ?></span>
                </div>
              </div>

               <div class="form-group row">
                <label for="nama_ukm" class="col-sm-2 col-form-label">UKM</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_ukm', $ddukm, set_value('id_ukm')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_ukm')); ?></span>
                </div>
              </div>


             
              

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php

  //--------------------------------- Edit ---------------------------------
} else if ($page == 'daftar_edit') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/daftar_edit/' . $d['id_daftar']); ?>" class="form-horizontal">
        

            <div class="card-body">

              
             <div class="form-group row">
                <label for="id_mhs" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_mhs', $ddmhs, set_value('id_mhs', $d['id_mhs']), 'class=form-control'); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_mhs')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_ukm" class="col-sm-2 col-form-label">UKM</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_ukm', $ddukm, set_value('id_ukm', $d['id_ukm']), 'class=form-control'); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_ukm')); ?></span>
                </div>
              </div>
             

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php
}


?>