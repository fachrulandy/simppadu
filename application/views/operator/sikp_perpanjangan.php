<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Daftar</label>
    <div class="col-sm-3">
        <input value="<?php echo $fo->no_daftar; ?>" readonly="" type="text" class="form-control input-sm" name="no_daftar" id="no_daftar" />
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal Daftar</label>
    <div class="col-sm-2"><input readonly="" value="<?php echo $fo->tanggal_daftar ?>" type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control input-sm"></div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No SK Lalu</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $data_lalu->no_sk; ?>" type="text" class="form-control input-sm" name="no_sk" id="no_sk" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No SK</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $data_baru->no_sk; ?>" type="text" class="form-control input-sm" name="no_sk" id="no_sk" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Perawat</label>
    <div class="col-sm-3">
        <input value="<?php echo $data_lalu->nama_pemilik; ?>" type="text" class="form-control input-sm" name="nama_pemilik" id="nama_pemilik" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Tempat/Tanggal Lahir</label>
    <div class="col-sm-3">
        <input value="<?php echo $data_lalu->tempat_lahir ?>" type="text" class="form-control input-sm" name="tempat_lahir" id="tempat_lahir" />
    </div>

    <div class="col-sm-3">
        <input value="<?php echo $data_lalu->tanggal_lahir ?>" type="date" class="form-control input-sm" name="tanggal_lahir" id="tanggal_lahir" />
    </div>
</div>



<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Perawat</label>
    <div class="col-sm-6"><textarea name="alamat_pemilik" id="alamat_pemilik" class="form-control input-sm"><?php echo $data_lalu->alamat_pemilik ?></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Perawat</label>
    <div class="col-sm-4">
        <select name="id_kec_pemilik" id="id_kec_pemilik" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option <?php echo ($r_kec->id_kec == $data_lalu->id_kec_pemilik) ? 'readonly=""' : '' ?> value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_kec_pemilik').change(function(){

            var id_kec_pemilik = $('#id_kec_pemilik').val();

            console.log(id_kec_pemilik);

            $.ajax({
                url: '<?php echo site_url("c_ajax/load_combo_kel") ?>/' + id_kec_pemilik,
                success: function(data) {

                    $('#id_kel_pemilik').html(data);
                    
                }
            });
        });
    });
</script>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Gampong Perawat</label>
    <div class="col-sm-4">
        <select name="id_kel_pemilik" id="id_kel_pemilik" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kel as $r_kel): ?>
                <option <?php echo ($r_kel->id_kel == $data_lalu->id_kel_pemilik) ? 'readonly=""' : '' ?> value="<?php echo $r_kel->id_kel; ?>"><?php echo $r_kel->nm_kel; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nomor SIB/STR</label>
    <div class="col-sm-5">
        <input value="<?php echo $data_lalu->no_sib_str ?>" type="text" class="form-control input-sm" name="no_sib_str" id="no_sib_str" />
    </div>
</div>



<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Tempat Kerja</label>
    <div class="col-sm-7">
        <input value="<?php echo $data_lalu->nama_tempat_kerja; ?>" type="text" class="form-control input-sm" name="nama_tempat_kerja" id="nama_tempat_kerja" />
    </div>
</div>





<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Tempat Kerja</label>
    <div class="col-sm-6"><textarea name="alamat_tempat_kerja" id="alamat_tempat_kerja" class="form-control input-sm"><?php echo $data_lalu->alamat_tempat_kerja ?></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Tempat Kerja</label>
    <div class="col-sm-4">
        <select name="id_kec_tempat_kerja" id="id_kec_tempat_kerja" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option <?php echo ($r_kec->id_kec == $data_lalu->id_kec_tempat_kerja) ? 'selected=""' : '' ?> value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_kec_tempat_kerja').change(function(){

            var id_kec_tempat_kerja = $('#id_kec_tempat_kerja').val();

            console.log(id_kec_tempat_kerja);

            $.ajax({
                url: '<?php echo site_url("c_ajax/load_combo_kel") ?>/' + id_kec_tempat_kerja,
                success: function(data) {

                    $('#id_kel_tempat_kerja').html(data);
                    
                }
            });
        });
    });
</script>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Gampong Tempat Praktek</label>
    <div class="col-sm-4">
        <select name="id_kel_tempat_kerja" id="id_kel_tempat_kerja" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kel as $r_kel): ?>
                <option <?php echo ($r_kel->id_kel == $data_lalu->id_kel_tempat_kerja) ? 'selected=""' : '' ?> value="<?php echo $r_kel->id_kel; ?>"><?php echo $r_kel->nm_kel; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>


<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal terbit</label>
    <div class="col-sm-4"><input readonly="" value="<?php echo $data_baru->tanggal_terbit ?>" type="date" name="tanggal_terbit" id="tanggal_terbit" class="form-control input-sm"></div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal perpanjangan</label>
    <div class="col-sm-4"><input readonly="" value="<?php echo $data_baru->tanggal_perpanjangan ?>" type="date" name="tanggal_perpanjangan" id="tanggal_perpanjangan" class="form-control input-sm"></div>
</div>
