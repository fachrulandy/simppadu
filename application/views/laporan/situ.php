
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan
            <small>Rekap Bulanan SITU</small>
        </h1>
        
    </section>

    <!-- Main content -->
    <section class="content">

        

        <!-- Main row -->
        <div class="row">
            
            <div class="col-lg-12">

                <div class="panel panel-default">
                    
                
                    <div class="panel-body">
                        <br />
                        <?php echo validation_errors('<p>', '</p>'); ?>
                        <form class="form-horizontal" role="form" method="post">
                            <div id="form-utama">
                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Filter Bulan</label>
                                    <div class="col-sm-2">
                                       <!--  <input type="month" class="form-control input-sm" name="periode" id="periode" value="<?php // echo date('Y-m') ?>"> -->
                                        <select class="form-control input-sm" name="bulan" id="bulan">
                                            <option value="">-</option>
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                                <option value="<?php echo $i ?>"><?php echo get_nama_bulan($i) ?></option>
                                            <?php endfor; ?>
                                        </select>
                                       
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Filter Tahun</label>
                                    <div class="col-sm-2">
                                       <!--  <input type="month" class="form-control input-sm" name="periode" id="periode" value="<?php // echo date('Y-m') ?>"> -->
                                        <select class="form-control input-sm" name="tahun" id="tahun">
                                            <option value="">-</option>

                                            <?php
                                            // dapat tahun terendah dari table situ
                                            $tahun_rendah   = $this->db->query("SELECT MIN(YEAR(tanggal_terbit)) AS min_year FROM t_situ")->result()[0]->min_year;
                                            $tahun_sekarang = date("Y");

                                            for($th = $tahun_rendah; $th <= $tahun_sekarang; $th++){
                                                ?>
                                                    <option value="<?php echo $th ?>"><?php echo $th ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                       
                                    </div>
                                </div>
                                
                                <hr />
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Per Kecamatan Perusahaan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control input-sm" name="id_kec_perusahaan" id="id_kec_perusahaan">
                                            <option></option>
                                            <?php if($kec): foreach($kec as $r_kec): ?>
                                                <option value="<?php echo $r_kec->id_kec ?>"><?php echo $r_kec->nm_kec; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>

                             


                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3">
                                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('c_laporan'); ?>">Kembali</a>
                                        <input type="submit" class="btn btn-xs btn-primary" name="cetak" id="cetak" value="Cetak">
                                    </div>
                                </div>
                                
                                
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->




