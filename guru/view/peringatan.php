
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
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa,kelas where siswa.c_kelas=kelas.c_kelas");
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
                  <a class="btn btn-primary btn-sm" href="surat/sp-1.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_guru'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a></td>
                  <td align="center">
                    <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/sp-2.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_guru'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                    <?php
                    }
                    ?>
                  </td>
                  <td align="center">
                  <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/sp-3.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_guru'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                    <?php
                    }
                    ?>
                  </td>
                  <td align="center">
                  <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/hv.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_guru'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                    <?php
                    }
                    ?>
                  </td>
                  <td align="center">
                  <?php 
                      if($jumlah>=250){
                    ?>
                  <a class="btn btn-primary btn-sm" href="surat/pd.php?id=<?php echo "$id";?>&adm=<?php echo $_SESSION['c_guru'];?>" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
                    <?php
                    }
                    ?>
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