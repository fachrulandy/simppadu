<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Perusahaan</label>
    <div class="col-sm-3">
        <input type="text" class="form-control input-sm" name="ho_baru_nama_perusahaan" id="ho_baru_nama_perusahaan" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Bentuk Perusahaan</label>
    <div class="col-sm-3">
    	<select class="form-control input-sm" name="ho_baru_id_bentuk_perusahaan" id="ho_baru_id_bentuk_perusahaan">
            <option></option>
	    	<?php if($bentuk_perusahaan): foreach($bentuk_perusahaan as $r_bentuk_perusahaan): ?>
	    		<option value="<?php echo $r_bentuk_perusahaan->id_bentuk_perusahaan ?>"><?php echo $r_bentuk_perusahaan->nama_bentuk_perusahaan ?></option>
			<?php endforeach; endif; ?>
    	</select>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Bidang Usaha</label>
    <div class="col-sm-5">
        <input type="text" class="form-control input-sm" name="ho_baru_nama_bidang_usaha" id="ho_baru_nama_bidang_usaha">
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pemilik / Penanggung Jawab</label>
    <div class="col-sm-3">
        <input type="text" class="form-control input-sm" name="ho_baru_nama_pemilik" id="ho_baru_nama_pemilik" />
        <label style="padding-top: 10px;">

            <input type="checkbox" id="samakan_nama"> Samakan dengan Nama Pemohon.
            <script type="text/javascript">
            $('#samakan_nama').click(function(){
                console.log('test');
                if($(this).is(':checked')){
                    var nama_pemohon = $('#nama_pemohon').val();
                    console.log(nama_pemohon);
                    $('#ho_baru_nama_pemilik').val(nama_pemohon);
                }else{
                    $('#ho_baru_nama_pemilik').val('');
                }
            });
            </script>
        </label>
    </div>
</div>



<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kelengkapan Syarat</label>
    <div class="col-sm-10">
        <?php if($syarat): foreach ($syarat as $r_syarat): ?>
            <label>
                <input type="checkbox" name="id_syarat[]" value="<?php echo $r_syarat->id_syarat; ?>" id="id_syarat[]" /> <?php echo $r_syarat->nama_syarat; ?>
            </label>
            <br />
            
        <?php endforeach; endif; ?>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"></label>
    <div class="col-sm-4">
        <a href="<?php echo site_url('c_fo') ?>" class="btn btn-default btn-sm">Kembali</a>
        <input type="submit" class="btn btn-primary btn-sm" value="Simpan" name="simpan">
    </div>
</div>