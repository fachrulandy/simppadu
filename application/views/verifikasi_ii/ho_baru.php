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

<hr />


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Direktur / Penanggung Jawab</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->nama_pemilik; ?>" type="text" class="form-control input-sm" name="nama_pemilik" id="nama_pemilik" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin Pemilik</label>
    <div class="col-sm-2" style="padding-top: 3px;">
            
        <label>
            <input checked="" type="radio" name="jenis_kelamin_pemilik" value="1" id="jenis_kelamin_pemilik"  /> 
            Laki-laki
        </label>

        <label>
            <input type="radio" name="jenis_kelamin_pemilik" value="0" id="jenis_kelamin_pemilik"  /> 
            Perempuan
        </label>
        
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pekerjaan Pemilik</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->pekerjaan_pemilik ?>" type="text" class="form-control input-sm" name="pekerjaan_pemilik" id="pekerjaan_pemilik" />
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Pemilik</label>
    <div class="col-sm-6"><textarea readonly="" name="alamat_pemilik" id="alamat_pemilik" class="form-control input-sm"><?php echo $verifikasi->alamat_pemilik ?></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Pemilik</label>
    <div class="col-sm-4">
        <select readonly="" name="id_kec_pemilik" id="id_kec_pemilik" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option <?php echo ($verifikasi->id_kec_pemilik == $r_kec->id_kec) ? 'selected=""' : '' ?>  value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
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
    <label for="inputEmail3" class="col-sm-2 control-label">Gampong Pemilik</label>
    <div class="col-sm-4">
        <select readonly="" name="id_kel_pemilik" id="id_kel_pemilik" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kel as $r_kel): ?>
                <option <?php echo ($verifikasi->id_kel_pemilik == $r_kel->id_kel) ? 'selected=""' : '' ?> value="<?php echo $r_kel->id_kel; ?>"><?php echo $r_kel->nm_kel; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>


<hr />



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
    <label for="" class="col-sm-2 control-label">Alamat Perusahaan</label>
    <div class="col-sm-6"><textarea readonly="" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control input-sm"><?php echo $verifikasi->alamat_perusahaan; ?></textarea></div>
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
    <label for="inputEmail3" class="col-sm-2 control-label">Bidang Usaha</label>
    <div class="col-sm-7">
        <input readonly="" value="<?php echo $verifikasi->nama_bidang_usaha ?>" type="text" class="form-control input-sm" name="nama_bidang_usaha" id="nama_bidang_usaha">
    </div>
</div>

<hr />

<?php // echo "<pre>".print_r($verifikasi, true)."</pre>"; ?>

<div class="row">
    <div class="col-lg-12">
        <?php switch ($verifikasi->jenis_usaha) {
            case 'umum':
                ?>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div style="">
                                <input checked="" value="umum" type="radio" class="jenis_usaha" name="jenis_usaha" id="tab-radio-umum" > <!-- umum -->
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a id="tab-panel-umum">Jenis Usaha Umum</a></li>
                            </ul>
                        </div>

                        <div class="panel-body" id="panel-umum">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Panjang * Lebar</label>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="umum_panjang" id="umum_panjang" value="<?php echo $verifikasi->umum_panjang ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="umum_lebar" id="umum_lebar" value="<?php echo $verifikasi->umum_lebar ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Jumlah Lantai</label>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="umum_lantai" id="umum_lantai" value="<?php echo $verifikasi->umum_lantai ?>">
                                </div>
                            </div>
                        </div>
                        
                        <hr />

                        <div class="panel-body" id="panel-tower">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Total</label>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="total_luas" id="total_luas" value="<?php echo $verifikasi->total_luas ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                break;

            case 'tower':
                ?>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div style="">
                                
                                <input checked="" value="tower" type="radio" class="jenis_usaha" name="jenis_usaha" id="tab-radio-tower"> <!-- tower -->
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a id="tab-panel-tower">Jenis Tower</a></li>
                            </ul>
                        </div>

                        <div class="panel-body" id="panel-tower">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Lahan : Panjang * Lebar</label>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="tower_lahan_panjang" id="tower_lahan_panjang" value="<?php echo $verifikasi->tower_lahan_panjang ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="tower_lahan_lebar" id="tower_lahan_lebar" value="<?php echo $verifikasi->tower_lahan_lebar ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Akses Jalan : Panjang * Lebar</label>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="tower_akses_jalan_panjang" id="tower_akses_jalan_panjang" value="<?php echo $verifikasi->tower_akses_jalan_panjang ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="tower_akses_jalan_lebar" id="tower_akses_jalan_lebar" value="<?php echo $verifikasi->tower_akses_jalan_lebar ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tinggi Tower</label>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="tower_tinggi" id="tower_tinggi" value="<?php echo $verifikasi->tower_tinggi ?>">
                                </div>
                            </div>
                        </div>
                        
                        <hr />

                        <div class="panel-body" id="panel-tower">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Total</label>
                                <div class="col-sm-3">
                                    <input readonly="" type="number" class="form-control input-sm" name="total_luas" id="total_luas" value="<?php echo $verifikasi->total_luas ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                break;
            
            default:
                # code...
                break;
        } ?>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Luas</label>
    <div class="col-sm-4">
        <input type="text" value="<?php echo $this->m_index_luas->get_nama_where_kode($verifikasi->kode_index_luas) ?>" class="form-control input-sm" name="nama_index_luas" id="nama_index_luas" readonly="">
        <input type="hidden" value="<?php echo $verifikasi->kode_index_luas ?>" class="form-control input-sm" name="kode_index_luas" id="kode_index_luas">
    </div>

    <div class="col-sm-1">
        <input type="text" value="<?php echo $this->m_index_luas->get_nilai($verifikasi->kode_index_luas) ?>" readonly="" class="form-control input-sm" name="nilai_index_luas" id="nilai_index_luas">
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Gangguan</label>
    <div class="col-sm-4">
        
        <select readonly="" class="form-control input-sm" name="kode_index_gangguan" id="kode_index_gangguan">
            <option></option>
            <?php if($index_gangguan): foreach($index_gangguan as $r_index_gangguan): ?>
                <option <?php echo ($verifikasi->kode_index_gangguan == $r_index_gangguan->kode_index_gangguan) ? 'selected=""' : '' ?> 
                    value="<?php echo $r_index_gangguan->kode_index_gangguan ?>" 
                    nilai_index_gangguan="<?php echo $r_index_gangguan->nilai_index_gangguan; ?>">
                    <?php echo $r_index_gangguan->nama_index_gangguan ?>
                </option>
            <?php endforeach; endif; ?>
        </select>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            
            var nilai_index_gangguan = $('#kode_index_gangguan > option:selected').attr('nilai_index_gangguan');
            console.log('Nilai index gangguan ' + nilai_index_gangguan);
            $('#nilai_index_gangguan').val(nilai_index_gangguan);
        })
    </script>

    <div class="col-sm-1">
        <input type="text" readonly="" class="form-control input-sm" name="nilai_index_gangguan" id="nilai_index_gangguan">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Lokasi</label>
    <div class="col-sm-4">
        <select readonly="" class="form-control input-sm" name="kode_index_lokasi" id="kode_index_lokasi">
            <option></option>
            <?php if($index_lokasi): foreach($index_lokasi as $r_index_lokasi): ?>
                <option <?php echo ($verifikasi->kode_index_lokasi == $r_index_lokasi->kode_index_lokasi) ? 'selected=""' : '' ?> value="<?php echo $r_index_lokasi->kode_index_lokasi ?>" nilai_index_lokasi="<?php echo $r_index_lokasi->nilai_index_lokasi ?>"><?php echo $r_index_lokasi->nama_index_lokasi ?></option> 
            <?php endforeach; endif; ?>
        </select>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            
            var nilai_index_lokasi = $('#kode_index_lokasi > option:selected').attr('nilai_index_lokasi');
            console.log(nilai_index_lokasi);
            $('#nilai_index_lokasi').val(nilai_index_lokasi);
        })
    </script>
    
    <div class="col-sm-1">
        <input type="text" readonly="" class="form-control input-sm" name="nilai_index_lokasi" id="nilai_index_lokasi">
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Harga Dasar</label>
    <div class="col-sm-4">
        <select readonly="" class="form-control input-sm" name="kode_index_harga_dasar" id="kode_index_harga_dasar">
            <option></option>
            <?php if($index_harga_dasar): foreach($index_harga_dasar as $r_index_harga_dasar): ?>
                <option <?php echo ($verifikasi->kode_index_harga_dasar == $r_index_harga_dasar->kode_index_harga_dasar) ? 'selected=""' : '' ?> value="<?php echo $r_index_harga_dasar->kode_index_harga_dasar ?>" nilai_index_harga_dasar="<?php echo $r_index_harga_dasar->nilai_index_harga_dasar ?>"><?php echo $r_index_harga_dasar->nama_index_harga_dasar ?></option>
            <?php endforeach; endif; ?>
        </select>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            
            var nilai_index_harga_dasar = $('#kode_index_harga_dasar > option:selected').attr('nilai_index_harga_dasar');
            console.log(nilai_index_harga_dasar);
            $('#nilai_index_harga_dasar').val(nilai_index_harga_dasar);
        })
    </script>
    
    <div class="col-sm-1">
        <input type="text" readonly="" class="form-control input-sm" name="nilai_index_harga_dasar" id="nilai_index_harga_dasar">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nilai Retribusi</label>
    

    <div class="col-sm-4">
        <input readonly="" value="<?php echo $verifikasi->nilai_retribusi ?>" type="text" class="form-control input-sm" name="nilai_retribusi" class="nilai_retribusi" id="nilai_retribusi">
    </div>
</div>






<input value="<?php echo $verifikasi->kode_index_luas ?>" type="hidden" name="kode_index_luas" id="kode_index_luas">
<input value="<?php echo $verifikasi->kode_index_gangguan ?>" type="hidden" name="kode_index_gangguan" id="kode_index_gangguan">
<input value="<?php echo $verifikasi->kode_index_lokasi ?>" type="hidden" name="kode_index_lokasi" id="kode_index_lokasi">
<input value="<?php echo $verifikasi->kode_index_harga_dasar ?>" type="hidden" name="kode_index_harga_dasar" id="kode_index_harga_dasar">
<input value="<?php echo $verifikasi->nilai_retribusi ?>" type="hidden" name="nilai_retribusi" id="nilai_retribusi">
<!-- ########################################################### -->


<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal peninjauan lapangan</label>
    <div class="col-sm-6"><input readonly="" value="<?php echo $verifikasi->tanggal_peninjauan_lapangan ?>" type="date" name="tanggal_peninjauan_lapangan" id="tanggal_peninjauan_lapangan" class="form-control input-sm"></div>
</div>

<hr>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">NPWPD / NPWRD</label>
    <div class="col-sm-3">
        <input readonly="" value="<?php echo $verifikasi->npwpd_npwrd ?>" type="text" class="form-control input-sm" name="npwpd_npwrd" id="npwpd_npwrd" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Status Kepemilikan Tanah</label>
    <div class="col-sm-3">
        <select readonly="" class="form-control input-sm" name="status_kepemilikan_tanah" id="status_kepemilikan_tanah">
            <option></option>
            <option <?php echo ($verifikasi->status_kepemilikan_tanah == 'Hak Milik') ? 'selected=""' : '' ?> value="Hak Milik">Hak Milik</option>
            <option <?php echo ($verifikasi->status_kepemilikan_tanah == 'Hak Pakai') ? 'selected=""' : '' ?> value="Hak Pakai">Hak Pakai</option>
            <option <?php echo ($verifikasi->status_kepemilikan_tanah == 'Sewa') ? 'selected=""' : '' ?> value="Sewa">Sewa</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Utara</label>
    <div class="col-sm-4">
        <input readonly="" value="<?php echo $verifikasi->batas_utara ?>" type="text" class="form-control input-sm" name="batas_utara" id="batas_utara" />
    </div>
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Selatan</label>
    <div class="col-sm-4">
        <input readonly="" value="<?php echo $verifikasi->batas_selatan ?>" type="text" class="form-control input-sm" name="batas_selatan" id="batas_selatan" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Barat</label>
    <div class="col-sm-4">
        <input readonly="" value="<?php echo $verifikasi->batas_barat ?>" type="text" class="form-control input-sm" name="batas_barat" id="batas_barat" />
    </div>
    <label for="inputEmail3" class="col-sm-2 control-label">Batas Timur</label>
    <div class="col-sm-4">
        <input readonly="" value="<?php echo $verifikasi->batas_timur ?>" type="text" class="form-control input-sm" name="batas_timur" id="batas_timur" />
    </div>
</div>


<input type="hidden" name="kode_index_luas" id="kode_index_luas" value="<?php echo $verifikasi->kode_index_luas ?>">
<input type="hidden" name="kode_index_gangguan" id="kode_index_gangguan" value="<?php echo $verifikasi->kode_index_gangguan ?>">
<input type="hidden" name="kode_index_lokasi" id="kode_index_lokasi" value="<?php echo $verifikasi->kode_index_lokasi ?>">
<input type="hidden" name="kode_index_harga_dasar" id="kode_index_harga_dasar" value="<?php echo $verifikasi->kode_index_harga_dasar ?>">

<input type="hidden" name="nilai_retribusi" id="nilai_retribusi" value="<?php echo $verifikasi->nilai_retribusi ?>">

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mesin Penggerak</label>
    <div class="col-sm-6">
        <input readonly="" value="<?php echo $verifikasi->mesin_penggerak ?>" type="text" class="form-control input-sm" name="mesin_penggerak" id="mesin_penggerak" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Bahan Bakar Mesin Penggerak</label>
    <div class="col-sm-3">
        <select readonly="" class="form-control input-sm" name="bahan_bakar" id="bahan_bakar">
            <option <?php echo ($verifikasi == 'Bensin') ? 'selected=""' : '' ?> value="Bensin">Bensin</option>
            <option <?php echo ($verifikasi == 'Solar') ? 'selected=""' : '' ?> value="Solar">Solar</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pembangkit Listrik</label>
    <div class="col-sm-6">
        <input readonly="" value="<?php echo $verifikasi->pembangkit_listrik ?>" type="text" class="form-control input-sm" name="pembangkit_listrik" id="pembangkit_listrik" />
    </div>
</div>

<hr />

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal Surat Permohonan</label>
    <div class="col-sm-3"><input readonly="" value="<?php echo $verifikasi->tanggal_permohonan ?>" type="date" name="tanggal_permohonan" id="tanggal_permohonan" class="form-control input-sm"></div>
</div>



<hr />



<div class="form-group">
    <label for="" class="col-sm-2 control-label">Memperhatikan</label>
    <div class="col-sm-6" id="input_fields_wrap">
        <?php $array_memperhatikan = explode('|', $verifikasi->memperhatikan); if(count($array_memperhatikan) > 0): foreach($array_memperhatikan as $memperhatikan): ?>
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-sm-10">
                    <textarea readonly="" name="memperhatikan[]" id="memperhatikan[]" class="form-control input-sm"><?php echo $memperhatikan ?></textarea>
                </div>
            </div>
        <?php endforeach; else: ?>
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-sm-10">
                    <textarea readonly="" name="memperhatikan[]" id="memperhatikan[]" class="form-control input-sm"></textarea>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
</div>


<hr />




<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal terbit</label>
    <div class="col-sm-6"><input readonly="" value="<?php echo $verifikasi->tanggal_terbit ?>" type="date" name="tanggal_terbit" id="tanggal_terbit" class="form-control input-sm"></div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal daftar ulang</label>
    <div class="col-sm-6"><input readonly="" value="<?php echo $verifikasi->tanggal_daftar_ulang ?>" type="date" name="tanggal_terbit" id="tanggal_terbit" class="form-control input-sm"></div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal berlaku</label>
    <div class="col-sm-6"><input readonly="" value="<?php echo $verifikasi->tanggal_perpanjangan ?>" type="date" name="tanggal_perpanjangan" id="tanggal_perpanjangan" class="form-control input-sm"></div>
</div>







