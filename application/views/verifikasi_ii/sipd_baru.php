<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Daftar</label>
    <div class="col-sm-3">
        <input value="<?php echo $verifikasi->no_daftar; ?>" readonly="" type="text" class="form-control input-sm" name="no_daftar" id="no_daftar" />
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal Daftar</label>
    <div class="col-sm-2"><input readonly="" value="<?php echo $verifikasi->tanggal_daftar ?>" type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control input-sm"></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No SK</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->no_sk; ?>" type="text" class="form-control input-sm" name="no_sk" id="no_sk" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Perusahaan</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->nama_perusahaan; ?>" type="text" class="form-control input-sm" name="nama_perusahaan" id="nama_perusahaan" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Bentuk Perusahaan</label>
    <div class="col-sm-3">
        <select readonly="" class="form-control input-sm" name="id_bentuk_perusahaan" id="id_bentuk_perusahaan">
            <option></option>
            <?php if($bentuk_perusahaan): foreach($bentuk_perusahaan as $r_bentuk_perusahaan): ?>
                <option <?php echo ($verifikasi->id_bentuk_perusahaan == $r_bentuk_perusahaan->id_bentuk_perusahaan) ? 'selected=""' : ''; ?> value="<?php echo $r_bentuk_perusahaan->id_bentuk_perusahaan ?>"><?php echo $r_bentuk_perusahaan->nama_bentuk_perusahaan ?></option>
            <?php endforeach; endif; ?>
        </select>
    </div>
</div>



<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pemilik</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->nama_pemilik; ?>" type="text" class="form-control input-sm" name="nama_pemilik" id="nama_pemilik" />
    </div>
</div>


<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Perusahaan</label>
    <div class="col-sm-6"><textarea readonly="" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control input-sm"><?php echo $verifikasi->alamat_perusahaan ?></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Perusahaan</label>
    <div class="col-sm-4">
        <select readonly="" name="id_kec_perusahaan" id="id_kec_perusahaan" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option <?php echo ($verifikasi->id_kec_perusahaan == $r_kec->id_kec) ? 'selected=""' : ''; ?> value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_kec_perusahaan').change(function(){

            var id_kec_perusahaan = $('#id_kec_perusahaan').val();

            console.log(id_kec_perusahaan);

            $.ajax({
                url: '<?php echo site_url("c_ajax/load_combo_kel") ?>/' + id_kec_perusahaan,
                success: function(data) {

                    $('#id_kel_perusahaan').html(data);
                    
                }
            });
        });
    });
</script>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kelurahan Perusahaan</label>
    <div class="col-sm-4">
        <select readonly="" name="id_kel_perusahaan" id="id_kel_perusahaan" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kel as $r_kel): ?>
                <option <?php echo ($verifikasi->id_kel_perusahaan == $r_kel->id_kel) ? 'selected=""' : ''; ?> value="<?php echo $r_kel->id_kel; ?>"><?php echo $r_kel->nm_kel; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Bahan Pengambilan/Penambangan</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->jenis_bahan ?>" type="text" class="form-control input-sm" name="jenis_bahan" id="jenis_bahan" />
    </div>
</div>



<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Lokasi Pengambilan</label>
    <div class="col-sm-6"><textarea readonly="" name="alamat_lokasi" id="alamat_lokasi" class="form-control input-sm"><?php echo $verifikasi->alamat_lokasi ?></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Lokasi Pengambilan</label>
    <div class="col-sm-4">  
        <select readonly="" name="id_kec_lokasi" id="id_kec_lokasi" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option <?php echo ($verifikasi->id_kec_lokasi == $r_kec->id_kec) ? 'selected=""' : ''; ?> value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_kec_lokasi').change(function(){

            var id_kec_lokasi = $('#id_kec_lokasi').val();

            console.log(id_kec_lokasi);

            $.ajax({
                url: '<?php echo site_url("c_ajax/load_combo_kel") ?>/' + id_kec_lokasi,
                success: function(data) {

                    $('#id_kel_lokasi').html(data);
                    
                }
            });
        });
    });
</script>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kelurahan Lokasi Pengambilan</label>
    <div class="col-sm-4">
        <select readonly="" name="id_kel_lokasi" id="id_kel_lokasi" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kel as $r_kel): ?>
                <option <?php echo ($verifikasi->id_kel_lokasi == $r_kel->id_kel) ? 'selected=""' : ''; ?> value="<?php echo $r_kel->id_kel; ?>"><?php echo $r_kel->nm_kel; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Luas Wilayah (M<sup>2</sup>)</label>
    <div class="col-sm-2">
        <input readonly="" value="<?php echo $verifikasi->luas_wilayah ?>" type="number" class="form-control input-sm" name="luas_wilayah" id="luas_wilayah" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Utara</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->batas_utara ?>" type="text" class="form-control input-sm" name="batas_utara" id="batas_utara" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Selatan</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->batas_selatan ?>" type="text" class="form-control input-sm" name="batas_selatan" id="batas_selatan" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Barat</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->batas_barat ?>" type="text" class="form-control input-sm" name="batas_barat" id="batas_barat" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Timur</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->batas_timur ?>" type="text" class="form-control input-sm" name="batas_timur" id="batas_timur" />
    </div>
</div>



<div class="form-group">
    <label for="" class="col-sm-2 control-label">Koordinat N</label>
    <label for="" class="col-sm-3 control-label"></label>
    <label for="" class="col-sm-2 control-label">Koordinat E</label>
    <label for="" class="col-sm-3 control-label"></label>
    
</div>

<?php 
$array_koordinat_n = explode('|', $verifikasi->koordinat_n);
$array_koordinat_e = explode('|', $verifikasi->koordinat_e);



?>

<div class="form-group">
    <label for="" class="col-sm-2 control-label"></label>
    <div class="col-sm-3" id="container_koordinat_n">
        <?php for($i = 0; $i < count($array_koordinat_n); $i++): ?>
            <input readonly="" type="text" name="koordinat_n[]" id="koordinat_n[]" value="<?php echo $array_koordinat_n[$i] ?>" class="form-control input-sm" style="margin-bottom: 5px;">
        <?php endfor; ?>
    </div>
    <label for="" class="col-sm-2 control-label"></label>
    <div class="col-sm-3" id="container_koordinat_e">
        <?php for($i = 0; $i < count($array_koordinat_e); $i++): ?>
            <input readonly="" type="text" name="koordinat_e[]" id="koordinat_e[]" value="<?php echo $array_koordinat_e[$i] ?>" class="form-control input-sm" style="margin-bottom: 5px;">
        <?php endfor; ?>
    </div>
    
</div>






<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal terbit</label>
    <div class="col-sm-4"><input readonly="" value="<?php echo $verifikasi->tanggal_terbit ?>" type="date" name="tanggal_terbit" id="tanggal_terbit" class="form-control input-sm"></div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal berlaku</label>
    <div class="col-sm-4"><input readonly="" value="<?php echo $verifikasi->tanggal_perpanjangan ?>" type="date" name="tanggal_perpanjangan" id="tanggal_perpanjangan" class="form-control input-sm"></div>
</div>
