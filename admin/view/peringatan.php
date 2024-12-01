
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Pelanggaran Siswa Berhasil Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header  with-border">
              <h3 class="box-title"></span>&nbsp;Siswa Bermasalah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="30%">NAMA SISWA</th>
                  <th width="15%">POINT</th>
                  <th width="10%">SP 1</th>
                  <th width="10%">SP 2</th>
                  <th width="10%">SP 3</th>
                  <th width="10%">HV</th>
                  <th width="10%">PD</th>
                  <th width="10%">INPUT</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa,kelas where siswa.c_kelas=kelas.c_kelas and siswa.status='Aktif'");
$vr=1;
while($akh=mysqli_fetch_array($smk)){
	$id=$akh['c_siswa'];
	
	//mencari total point
	$totalpel=mysqli_fetch_array(mysqli_query($con,"SELECT sum(bobot) as total FROM pelanggaran where c_siswa='$id' and tp='$tp'"));
	$jumlah=$totalpel['total'];
	
	if($jumlah<30){
	continue;
	}
?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nama']; ?><br>(<?php echo $akh['kelas']; ?>)</td>
                  <td><?php echo $jumlah; ?></td>
                  <td align="center">
                  <a class="btn btn-primary btn-sm" href="surat/sp-1.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_admin'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                  <?php
                      $sp1=mysqli_query($con,"select * from penanganan where c_siswa='$id' and jenis='SP1'");
                      $ar1=mysqli_fetch_array($sp1);
                      $idpen=$ar1['id'];

                      if(!empty($idpen)){
                  ?>
                   <a class="btn btn-danger btn-sm" href="<?php echo $basead; ?>delpena/<?php echo $ar1['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
                  <?php
                      }
                  ?>
                  </td>
                  <td align="center">
                    <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/sp-2.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_admin'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                  <?php
                      $sp1=mysqli_query($con,"select * from penanganan where c_siswa='$id' and jenis='SP2'");
                      $ar1=mysqli_fetch_array($sp1);
                      $idpen=$ar1['id'];

                      if(!empty($idpen)){
                  ?>
                   <a class="btn btn-danger btn-sm" href="<?php echo $basead; ?>delpena/<?php echo $ar1['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
                  <?php
                      }
                  ?>                  
                    <?php
                    }
                    ?>
                  </td>
                  <td align="center">
                  <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/sp-3.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_admin'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                  <?php
                      $sp1=mysqli_query($con,"select * from penanganan where c_siswa='$id' and jenis='SP3'");
                      $ar1=mysqli_fetch_array($sp1);
                      $idpen=$ar1['id'];

                      if(!empty($idpen)){
                  ?>
                   <a class="btn btn-danger btn-sm" href="<?php echo $basead; ?>delpena/<?php echo $ar1['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
                  <?php
                      }
                  ?>
                    <?php
                    }
                    ?>
                  </td>
                  <td align="center">
                  <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/hv.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_admin'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                  <?php
                      $sp1=mysqli_query($con,"select * from penanganan where c_siswa='$id' and jenis='Home Visit'");
                      $ar1=mysqli_fetch_array($sp1);
                      $idpen=$ar1['id'];

                      if(!empty($idpen)){
                  ?>
                   <a class="btn btn-danger btn-sm" href="<?php echo $basead; ?>delpena/<?php echo $ar1['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
                  <?php
                      }
                  ?>
                    <?php
                    }
                    ?>
                  </td>
                  <td align="center">
                  <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/pd.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_admin'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                  <?php
                      $sp1=mysqli_query($con,"select * from penanganan where c_siswa='$id' and jenis='Pengunduran Diri'");
                      $ar1=mysqli_fetch_array($sp1);
                      $idpen=$ar1['id'];

                      if(!empty($idpen)){
                  ?>
                   <a class="btn btn-danger btn-sm" href="<?php echo $basead; ?>delpena/<?php echo $ar1['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="glyphicon glyphicon-trash"></i></a>
                  <?php
                      }
                  ?>
                    <?php
                    }
                    ?>
                  </td>
                  <td>
                  <a class="btn btn-success btn-sm" href="<?php echo $basead; ?>tangan-1/<?php echo $akh['c_siswa']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                 
                  </td>
                </tr>

<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->