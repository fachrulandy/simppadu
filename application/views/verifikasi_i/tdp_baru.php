<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Perusahaan</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->tdp_baru_nama_perusahaan ?>" type="text" class="form-control input-sm" name="tdp_baru_nama_perusahaan" id="tdp_baru_nama_perusahaan" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Bentuk Perusahaan</label>
    <div class="col-sm-3">
    	<select disabled="" class="form-control input-sm" name="tdp_baru_kd_bentuk_perusahaan" id="tdp_baru_kd_bentuk_perusahaan">
            <option></option>
	    	<?php if($bentuk_perusahaan): foreach($bentuk_perusahaan as $r_bentuk_perusahaan): ?>
	    		<option <?php echo ($verifikasi->tdp_baru_id_bentuk_perusahaan == $r_bentuk_perusahaan->id_bentuk_perusahaan) ? 'selected=""' : '' ; ?> value="<?php echo $r_bentuk_perusahaan->id_bentuk_perusahaan ?>"><?php echo $r_bentuk_perusahaan->nama_bentuk_perusahaan ?></option>
			<?php endforeach; endif; ?>
    	</select>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Status Perusahaan</label>
    <div class="col-sm-3">
    	<select disabled="" class="form-control input-sm" name="tdp_baru_status_perusahaan" id="tdp_baru_status_perusahaan">
            <option></option>
	    	<option <?php echo ($verifikasi->tdp_baru_status_perusahaan == "Kantor Pusat") ? 'selected=""' : '' ; ?> value="Kantor Pusat">Kantor Pusat</option>
	    	<option <?php echo ($verifikasi->tdp_baru_status_perusahaan == "Kantor Cabang") ? 'selected=""' : '' ; ?> value="Kantor Cabang">Kantor Cabang</option>
    	</select>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pemilik / Penanggung Jawab</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->tdp_baru_nama_pemilik ?>" type="text" class="form-control input-sm" name="tdp_baru_nama_pemilik" id="tdp_baru_nama_pemilik" />
    </div>
</div>

<div class="form-group" style="margin-bottom: 0">
    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Usaha</label>

    <div class="col-sm-5">
        <input readonly="" value="<?php echo $verifikasi->tdp_baru_jenis_usaha ?>" type="text" class="form-control input-sm" id="tdp_baru_jenis_usaha" name="tdp_baru_jenis_usaha" />
    </div>
</div>

<br />


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kelengkapan Syarat</label>
    <div class="col-sm-10">
        <?php $array_id_syarat = explode('|', $verifikasi->id_syarat);?>
        <?php if($syarat): foreach ($syarat as $r_syarat): ?>
            <label>
                <input disabled="" <?php echo (in_array($r_syarat->id_syarat, $array_id_syarat)) ? 'checked=""' : '' ; ?> type="checkbox" name="id_syarat[]" value="<?php echo $r_syarat->id_syarat; ?>" id="id_syarat[]" /> <?php echo $r_syarat->nama_syarat; ?>
            </label>
            <br />
            
        <?php endforeach; endif; ?>
    </div>
</div>

