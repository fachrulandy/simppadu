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
    <label for="inputEmail3" class="col-sm-2 control-label">No SK</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $agenda->no_sk; ?>" type="text" class="form-control input-sm" name="no_sk" id="no_sk" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Perusahaan</label>
    <div class="col-sm-3">
        <input value="<?php echo $fo->sib_baru_nama_perusahaan; ?>" type="text" class="form-control input-sm" name="nama_perusahaan" id="nama_perusahaan" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Merek (Milik Sendiri/Lisensi)</label>
    <div class="col-sm-3">
        <select class="form-control input-sm" name="merek_perusahaan" id="merek_perusahaan" >
            <option value=""></option>
            <option value="Milik Sendiri">Milik Sendiri</option>
            <option value="Lisensi">Lisensi</option>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Perusahaan</label>
    <div class="col-sm-6"><textarea name="alamat_perusahaan" id="alamat_perusahaan" class="form-control input-sm"></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Perusahaan</label>
    <div class="col-sm-4">
        <select name="id_kec_perusahaan" id="id_kec_perusahaan" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
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
        <select name="id_kel_perusahaan" id="id_kel_perusahaan" class="form-control input-sm">
            
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>



<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
    <div class="col-sm-3">
        <input value="" type="text" class="form-control input-sm" name="no_telp" id="no_telp" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pemilik</label>
    <div class="col-sm-3">
        <input value="<?php echo $fo->sib_baru_nama_pemilik ?>" type="text" class="form-control input-sm" name="nama_pemilik" id="nama_pemilik" />
    </div>
</div>


<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Pemilik</label>
    <div class="col-sm-6"><textarea name="alamat_pemilik" id="alamat_pemilik" class="form-control input-sm"></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Pemilik</label>
    <div class="col-sm-4">
        <select name="id_kec_pemilik" id="id_kec_pemilik" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
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
    <label for="inputEmail3" class="col-sm-2 control-label">Kelurahan Pemilik</label>
    <div class="col-sm-4">
        <select name="id_kel_pemilik" id="id_kel_pemilik" class="form-control input-sm">
            
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nomor Pokok Wajib Pajak (NPWPD)</label>
    <div class="col-sm-3">
        <input value="" type="text" class="form-control input-sm" name="npwpd" id="npwpd" />
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Modal dan Kekayaan bersih perusahaan (tidak termasuk Tanah dan banguanan) dalam Rp. (Rupiah)</label>
    <div class="col-sm-3"><input type="number" name="modal" id="modal" value="" class="form-control input-sm"></div>

    <script type="text/javascript">
        $('#modal').change(function(){
            $('#ket_status_modal').val(get_status_modal_perusahaan($(this).val()));
        });
    </script>
    <div class="col-sm-1"><input readonly="" type="text" class="form-control input-sm" name="ket_status_modal" id="ket_status_modal"></div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Kode KBLI</label>
    <div class="col-sm-10">
        <ul>
            <?php  
            $array_kbli_5 = explode('|', $agenda->id_kbli);
            ?>
            <?php if($array_kbli_5): foreach($array_kbli_5 as $kbli_5): ?>
                <li class="control-label" style="text-align: left;"><?php echo $kbli_5; ?> : <?php echo $this->m_kbli->get_judul_kbli($kbli_5); ?></li>
            <?php endforeach; endif; ?>
        </ul>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Bidang Usaha</label>
    <div class="col-sm-6">
        <select name="id_bidang_sib" id="id_bidang_sib" class="form-control input-sm">
            <option ></option>
            <?php if($bidang_sib): foreach($bidang_sib as $r_bidang_sib): ?>
                <option value="<?php echo $r_bidang_sib->id_bidang_sib; ?>"><?php echo $r_bidang_sib->nama_bidang_sib; ?></option>
            <?php endforeach; endif; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Kelembagaan</label>
    <div class="col-sm-5">
        
        <select name="id_kelembagaan" id="id_kelembagaan" class="form-control input-sm">
            <option></option>
            <?php if($kelembagaan_siup): foreach($kelembagaan_siup as $kelembagaan_siup): ?>
                <option value="<?php echo $kelembagaan_siup->id_kelembagaan ?>"><?php echo $kelembagaan_siup->kelembagaan ?></option>
            <?php endforeach; endif; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Jenis Barang / Jasa Dagangan Utama</label>
    <div class="col-sm-6"><textarea name="barang_jasa_dagangan_utama" id="barang_jasa_dagangan_utama" class="form-control input-sm"></textarea></div>
</div>


<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal Berlaku</label>
    <div class="col-sm-6"><input readonly="" type="date" name="tanggal_berlaku" id="tanggal_berlaku" value="<?php echo $agenda->tanggal_terbit ?>" class="form-control input-sm"></div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal Berakhir</label>
    <div class="col-sm-6"><input readonly="" type="date" name="tanggal_perpanjangan" id="tanggal_perpanjangan" value="<?php echo $agenda->tanggal_perpanjangan ?>" class="form-control input-sm"></div>
</div>

