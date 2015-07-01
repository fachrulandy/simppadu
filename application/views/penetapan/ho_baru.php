<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Daftar</label>
    <div class="col-sm-3">
        <input value="<?php echo $penetapan->no_daftar; ?>" readonly="" type="text" class="form-control input-sm" name="no_daftar" id="no_daftar" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Daftar</label>
    <div class="col-sm-3">
        <input value="<?php echo $penetapan->tanggal_daftar ; ?>" readonly="" type="date" class="form-control input-sm" name="tanggal_daftar" id="tanggal_daftar" />
    </div>
</div>



<hr>



<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pemilik</label>
    <div class="col-sm-5">
        <input value="<?php echo $penetapan->ho_baru_nama_pemilik ?>" type="text" class="form-control input-sm" name="ho_baru_nama_pemilik" id="ho_baru_nama_pemilik" />
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Perusahaan</label>
    <div class="col-sm-5">
        <input value="<?php echo $penetapan->ho_baru_nama_perusahaan ?>" type="text" class="form-control input-sm" name="ho_baru_nama_perusahaan" id="ho_baru_nama_perusahaan" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Bentuk Perusahaan</label>
    <div class="col-sm-3">
        <select class="form-control input-sm" name="ho_baru_id_bentuk_perusahaan" id="ho_baru_id_bentuk_perusahaan">
            <option></option>
            <?php if($bentuk_perusahaan): foreach($bentuk_perusahaan as $r_bentuk_perusahaan): ?>
                <option <?php echo ($penetapan->ho_baru_id_bentuk_perusahaan == $r_bentuk_perusahaan->id_bentuk_perusahaan) ? 'selected=""' : '' ?> value="<?php echo $r_bentuk_perusahaan->id_bentuk_perusahaan ?>"><?php echo $r_bentuk_perusahaan->nama_bentuk_perusahaan ?></option>
            <?php endforeach; endif; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label">Alamat Perusahaan</label>
    <div class="col-sm-6"><textarea name="ho_baru_alamat_perusahaan" id="ho_baru_alamat_perusahaan" class="form-control input-sm"></textarea></div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan Perusahaan</label>
    <div class="col-sm-4">
        <select name="ho_baru_id_kec_perusahaan" id="ho_baru_id_kec_perusahaan" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kec as $r_kec): ?>
                <option value="<?php echo $r_kec->id_kec; ?>"><?php echo $r_kec->nm_kec; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#ho_baru_id_kec_perusahaan').change(function(){

            var ho_baru_id_kec_perusahaan = $('#ho_baru_id_kec_perusahaan').val();

            console.log(ho_baru_id_kec_perusahaan);

            $.ajax({
                url: '<?php echo site_url("c_ajax/load_combo_kel") ?>/' + ho_baru_id_kec_perusahaan,
                success: function(data) {

                    $('#ho_baru_id_kel_perusahaan').html(data);
                    
                }
            });
        });
    });
</script>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Gampong Perusahaan</label>
    <div class="col-sm-4">
        <select name="ho_baru_id_kel_perusahaan" id="ho_baru_id_kel_perusahaan" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ($kel as $r_kel): ?>
                <option value="<?php echo $r_kel->id_kel; ?>"><?php echo $r_kel->nm_kel; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="help-block">Jika ada kecamatan atau gampong yang belum tersedia, silahkan hubungi administrator untuk menambahkan</p>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Bidang Usaha</label>
    <div class="col-sm-7">
        <input value="<?php echo $penetapan->ho_baru_nama_bidang_usaha ?>" type="text" class="form-control input-sm" name="ho_baru_nama_bidang_usaha" id="ho_baru_nama_bidang_usaha">
    </div>
</div>

<br />
<br />

<!-- start -->

<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-primary">

            <div class="panel-body">
                
                <div style="">
                    <input value="umum" type="radio" class="ho_baru_jenis_usaha" name="ho_baru_jenis_usaha" id="tab-radio-umum" > <!-- umum -->
                    <input value="tower" type="radio" class="ho_baru_jenis_usaha" name="ho_baru_jenis_usaha" id="tab-radio-tower"> <!-- tower -->
                </div>

                <ul class="nav nav-tabs">
                    <li class="active"><a id="tab-panel-umum">Jenis Usaha Umum</a></li>
                    <li><a id="tab-panel-tower">Jenis Tower</a></li>
                </ul>

                <script type="text/javascript">
                    
                </script>
            </div>

            <div class="panel-body" id="panel-umum">


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Panjang * Lebar</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_umum_panjang" id="ho_baru_umum_panjang" value="0">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_umum_lebar" id="ho_baru_umum_lebar" value="0">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Jumlah Lantai</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_umum_lantai" id="ho_baru_umum_lantai" value="1">
                    </div>
                </div>

               

                
                
            </div>

            <div class="panel-body" id="panel-tower">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Lahan : Panjang * Lebar</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_tower_lahan_panjang" id="ho_baru_tower_lahan_panjang" value="0">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_tower_lahan_lebar" id="ho_baru_tower_lahan_lebar" value="0">
                    </div>
                </div>


                <div class="form-group">

                    <label for="inputEmail3" class="col-sm-3 control-label">Akses Jalan : Panjang * Lebar</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_tower_akses_jalan_panjang" id="ho_baru_tower_akses_jalan_panjang" value="0">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_tower_akses_jalan_lebar" id="ho_baru_tower_akses_jalan_lebar" value="0">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Tinggi Tower</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_tower_tinggi" id="ho_baru_tower_tinggi" value="0">
                    </div>
                </div>

                
            </div>
            
            <hr />

            <div class="panel-body" id="panel-tower">
    
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Total</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control input-sm" name="ho_baru_total_luas" id="ho_baru_total_luas" value="0">
                    </div>
                </div>
                

                <script type="text/javascript">

                    function hitung_total_luas_umum(){
                        var umum_panjang = $('#ho_baru_umum_panjang').val();
                        var umum_lebar   = $('#ho_baru_umum_lebar').val();
                        var umum_lantai  = $('#ho_baru_umum_lantai').val();

                        var total_luas   = (umum_panjang * umum_lebar ) * umum_lantai;
                        console.log(total_luas);
                        $('#ho_baru_total_luas').val(total_luas);
                    }

                    function hitung_total_luas_tower(){
                        var tower_lahan_panjang       = $('#ho_baru_tower_lahan_panjang').val();
                        var tower_lahan_lebar         = $('#ho_baru_tower_lahan_lebar').val();
                        var tower_akses_jalan_panjang = $('#ho_baru_tower_akses_jalan_panjang').val();
                        var tower_akses_jalan_lebar   = $('#ho_baru_tower_akses_jalan_lebar').val();


                        var total_luas   = (tower_lahan_panjang * tower_lahan_lebar ) + (tower_akses_jalan_panjang * tower_akses_jalan_lebar);
                        console.log(total_luas);
                        $('#ho_baru_total_luas').val(total_luas);
                    }


                    function hitung_index_luas(){
                        var ho_baru_total_luas = $('#ho_baru_total_luas').val();
                        console.log(ho_baru_total_luas);
                        <?php $result = $this->db->get('t_index_luas')->result(); ?>
                        <?php if($result): foreach($result as $r): ?>
                            if(ho_baru_total_luas > <?php echo $r->minimal ?> && ho_baru_total_luas <= <?php echo $r->maximal ?>){
                                var ho_baru_nilai_index_luas = <?php echo $r->nilai_index_luas ?>;
                                var ho_baru_kode_index_luas = <?php echo $r->kode_index_luas ?>;
                                var ho_baru_nama_index_luas = "<?php echo $r->nama_index_luas ?>";
                            }
                        <?php endforeach; endif; ?>

                        $('#ho_baru_nilai_index_luas').val(ho_baru_nilai_index_luas);
                        $('#ho_baru_kode_index_luas').val(ho_baru_kode_index_luas);
                        $('#ho_baru_nama_index_luas').val(ho_baru_nama_index_luas);
                    }

                    $(document).ready(function(){
                        $('#tab-radio-umum').prop('checked', true);
                        $('#panel-umum').show();
                        $('#panel-tower').hide();
                    });

                    // $('#tab-panel-umum').click(function(){
                    //     $('#tab-radio-umum').prop('checked', true);
                    //     $('#tab-radio-tower').removeProp('checked');
                    //     $('#tab-panel-umum').parent('li').addClass('active');
                    //     $('#tab-panel-tower').parent('li').removeClass('active');
                    //     $('#panel-umum').show();
                    //     $('#panel-tower').hide();

                    //     var jenis = $('input[type="radio"][name="ho_baru_jenis_usaha"]:checked').val();
                    //     console.log(jenis);
                    //     if(jenis == 'umum'){
                    //         hitung_total_luas_umum();    
                    //     }else if(jenis == 'tower'){
                    //         hitung_total_luas_tower();
                    //     }

                    //     hitung_index_luas();
                    // });

                    $('#tab-panel-umum, #tab-panel-tower').click(function(){

                        var tab = $(this).attr('id');

                        if(tab == 'tab-panel-umum'){
                            $('#tab-radio-umum').prop('checked', true);
                            $('#tab-radio-tower').removeProp('checked');
                            $('#tab-panel-umum').parent('li').addClass('active');
                            $('#tab-panel-tower').parent('li').removeClass('active');
                            $('#panel-umum').show();
                            $('#panel-tower').hide();

                            hitung_total_luas_umum();   

                        }else if(tab == 'tab-panel-tower'){
                            $('#tab-radio-umum').removeProp('checked');
                            $('#tab-radio-tower').prop('checked', true);
                            $('#tab-panel-umum').parent('li').removeClass('active');
                            $('#tab-panel-tower').parent('li').addClass('active');
                            $('#panel-umum').hide();
                            $('#panel-tower').show();

                            hitung_total_luas_tower();
                        }

                        hitung_index_luas();
                        
                    });

                    $('#ho_baru_umum_panjang, #ho_baru_umum_lebar, #ho_baru_umum_lantai').change(function(){
                        hitung_total_luas_umum();
                    });

                    $('#ho_baru_tower_lahan_panjang, #ho_baru_tower_lahan_lebar, #ho_baru_tower_akses_jalan_panjang, #ho_baru_tower_akses_jalan_lebar').change(function(){
                        hitung_total_luas_tower();
                    });

                    

                    // hitung nilai index luas

                    // var ho_baru_nilai_index_luas        = $('#ho_baru_nilai_index_luas').val();

                    $('#ho_baru_umum_panjang, #ho_baru_umum_lebar, #ho_baru_umum_lantai, #ho_baru_tower_lahan_panjang, #ho_baru_tower_lahan_lebar, #ho_baru_tower_akses_jalan_panjang, #ho_baru_tower_akses_jalan_lebar').change(function(){

                    
                        var ho_baru_total_luas = $('#ho_baru_total_luas').val();
                        console.log(ho_baru_total_luas);
                        <?php $result = $this->db->get('t_index_luas')->result(); ?>
                        <?php if($result): foreach($result as $r): ?>
                            if(ho_baru_total_luas > <?php echo $r->minimal ?> && ho_baru_total_luas <= <?php echo $r->maximal ?>){
                                var ho_baru_nilai_index_luas = <?php echo $r->nilai_index_luas ?>;
                                var ho_baru_kode_index_luas = <?php echo $r->kode_index_luas ?>;
                                var ho_baru_nama_index_luas = "<?php echo $r->nama_index_luas ?>";
                            }
                        <?php endforeach; endif; ?>

                        $('#ho_baru_nilai_index_luas').val(ho_baru_nilai_index_luas);
                        $('#ho_baru_kode_index_luas').val(ho_baru_kode_index_luas);
                        $('#ho_baru_nama_index_luas').val(ho_baru_nama_index_luas);

                        
                    });

                </script>

            </div>

        </div>
    </div>
</div>

<!-- end -->


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Luas</label>
    <div class="col-sm-4">
        <input type="type" class="form-control input-sm" name="ho_baru_nama_index_luas" id="ho_baru_nama_index_luas" readonly="">
        <input type="hidden" class="form-control input-sm" name="ho_baru_kode_index_luas" id="ho_baru_kode_index_luas">
    </div>

    <div class="col-sm-1">
        <input type="text" readonly="" class="form-control input-sm" name="ho_baru_nilai_index_luas" id="ho_baru_nilai_index_luas">
    </div>
</div>



<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Gangguan</label>
    <div class="col-sm-4">
        
        <select class="form-control input-sm" name="ho_baru_kode_index_gangguan" id="ho_baru_kode_index_gangguan">
            <option></option>
            <?php if($index_gangguan): foreach($index_gangguan as $r_index_gangguan): ?>
                <option value="<?php echo $r_index_gangguan->kode_index_gangguan ?>" nilai_index_gangguan="<?php echo $r_index_gangguan->nilai_index_gangguan; ?>"><?php echo $r_index_gangguan->nama_index_gangguan ?></option>
            <?php endforeach; endif; ?>
        </select>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ho_baru_kode_index_gangguan').change(function(){
                var ho_baru_nilai_index_gangguan = $('#ho_baru_kode_index_gangguan > option:selected').attr('nilai_index_gangguan');
                console.log(ho_baru_nilai_index_gangguan);
                $('#ho_baru_nilai_index_gangguan').val(ho_baru_nilai_index_gangguan);
            });
        })
    </script>

    <div class="col-sm-1">
        <input type="text" readonly="" class="form-control input-sm" name="ho_baru_nilai_index_gangguan" id="ho_baru_nilai_index_gangguan">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Lokasi</label>
    <div class="col-sm-4">
        <select class="form-control input-sm" name="ho_baru_kode_index_lokasi" id="ho_baru_kode_index_lokasi">
            <option></option>
            <?php if($index_lokasi): foreach($index_lokasi as $r_index_lokasi): ?>
                <option value="<?php echo $r_index_lokasi->kode_index_lokasi ?>" nilai_index_lokasi="<?php echo $r_index_lokasi->nilai_index_lokasi ?>"><?php echo $r_index_lokasi->nama_index_lokasi ?></option>
            <?php endforeach; endif; ?>
        </select>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ho_baru_kode_index_lokasi').change(function(){
                var ho_baru_nilai_index_lokasi = $('#ho_baru_kode_index_lokasi > option:selected').attr('nilai_index_lokasi');
                console.log(ho_baru_nilai_index_lokasi);
                $('#ho_baru_nilai_index_lokasi').val(ho_baru_nilai_index_lokasi);
            });
        })
    </script>
    
    <div class="col-sm-1">
        <input type="text" readonly="" class="form-control input-sm" name="ho_baru_nilai_index_lokasi" id="ho_baru_nilai_index_lokasi">
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Indeks Harga Dasar</label>
    <div class="col-sm-4">
        <select class="form-control input-sm" name="ho_baru_kode_index_harga_dasar" id="ho_baru_kode_index_harga_dasar">
            <option></option>
            <?php if($index_harga_dasar): foreach($index_harga_dasar as $r_index_harga_dasar): ?>
                <option value="<?php echo $r_index_harga_dasar->kode_index_harga_dasar ?>" nilai_index_harga_dasar="<?php echo $r_index_harga_dasar->nilai_index_harga_dasar ?>"><?php echo $r_index_harga_dasar->nama_index_harga_dasar ?></option>
            <?php endforeach; endif; ?>
        </select>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ho_baru_kode_index_harga_dasar').change(function(){
                var ho_baru_nilai_index_harga_dasar = $('#ho_baru_kode_index_harga_dasar > option:selected').attr('nilai_index_harga_dasar');
                console.log(ho_baru_nilai_index_harga_dasar);
                $('#ho_baru_nilai_index_harga_dasar').val(ho_baru_nilai_index_harga_dasar);
            });
        })
    </script>
    
    <div class="col-sm-1">
        <input type="text" readonly="" class="form-control input-sm" name="ho_baru_nilai_index_harga_dasar" id="ho_baru_nilai_index_harga_dasar">
    </div>
</div>




<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"></label>
    <div class="col-sm-1">
        <a class="btn btn-primary btn-xs" id="hitung" value="hitung" name="hitung">Hitung</a>
    </div>

    <script type="text/javascript">
            $(document).ready(function(){
                $('#hitung').click(function(){
                    var ho_baru_nilai_index_lokasi      = $('#ho_baru_nilai_index_lokasi').val();
                    var ho_baru_nilai_index_luas        = $('#ho_baru_nilai_index_luas').val();
                    var ho_baru_nilai_index_gangguan    = $('#ho_baru_nilai_index_gangguan').val();
                    var ho_baru_nilai_index_harga_dasar = $('#ho_baru_nilai_index_harga_dasar').val();

                    console.log(ho_baru_nilai_index_lokasi);
                    console.log(ho_baru_nilai_index_luas);
                    console.log(ho_baru_nilai_index_gangguan);
                    console.log(ho_baru_nilai_index_harga_dasar);

                    if(ho_baru_nilai_index_lokasi == 0 || ho_baru_nilai_index_luas == 0 || ho_baru_nilai_index_gangguan == 0 || ho_baru_nilai_index_harga_dasar == 0){
                        alert('Anda belum melengkapi kriteria Perhitungan Penetepan');
                    }else{
                        var nilai_retribusi         = ho_baru_nilai_index_lokasi * ho_baru_nilai_index_luas * ho_baru_nilai_index_gangguan * ho_baru_nilai_index_harga_dasar;
                        $('#ho_baru_nilai_retribusi').val(nilai_retribusi);
                    }
                    /**
                     * input#nilai_retribusi 
                     * berada pada file : v_penetapan_utama.php
                     */
                });
            });
        </script>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nilai Retribusi</label>
    

    <div class="col-sm-4">
        <input type="text" class="form-control input-sm" name="ho_baru_nilai_retribusi" class="ho_baru_nilai_retribusi" id="ho_baru_nilai_retribusi">
    </div>
</div>
                    
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Peninjauan Lapangan</label>
    <div class="col-sm-3">
        <input value="" type="date" class="form-control input-sm" name="ho_baru_tanggal_peninjauan_lapangan" id="ho_baru_tanggal_peninjauan_lapangan" />
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"></label>
    <div class="col-sm-4">
        
        <input type="submit" class="btn btn-primary btn-xs" value="tetapkan" name="tetapkan" id="tetapkan">

        <script type="text/javascript">
            $("#tetapkan").click(function(event){
                var ho_baru_nilai_retribusi      = $('#ho_baru_nilai_retribusi').val();
                
                if(ho_baru_nilai_retribusi == ''){
                    event.preventDefault(); // cancel default behavior
                    alert('Anda belum melengkapi kriteria Perhitungan Penetepan');
                    
                }
                
              });
        </script>
    </div>
</div>
                    

<script type="text/javascript">
   $(document).ready(function(){
        $('#containerForm').bootstrapValidator({
            container: 'tooltip',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'ho_baru_tanggal_peninjauan_lapangan': {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal Peninjauan Lapangan harus diisi'
                        }
                    }
                },
                'ho_baru_id_kec_pemilik': {
                    validators: {
                        notEmpty: {
                            message: 'Kecamatan Pemilik harus dipilih'
                        }
                    }
                },
                'ho_baru_id_kel_pemilik': {
                    validators: {
                        notEmpty: {
                            message: 'Gampong Pemilik harus dipilih'
                        }
                    }
                },
                'ho_baru_nama_bidang_usaha': {
                    validators: {
                        notEmpty: {
                            message: 'Nama Bidang Usaha harus diisi'
                        }
                    }
                },
                'ho_baru_ket_luas_tempat_usaha[]': {
                    validators: {
                        notEmpty: {
                            message: 'Keterangan Luas Tempat Usaha Tidak Boleh Kosong'
                        }
                    }
                },
                'ho_baru_panjang_tempat_usaha[]': {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong'
                        },
                        greaterThan: {
                            inclusive: false,
                            value: 0,
                            message: 'Tidak Boleh 0 (Nol)'
                        }
                    }
                },
                'ho_baru_lebar_tempat_usaha[]': {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong'
                        },
                        greaterThan: {
                            inclusive: false,
                            value: 0,
                            message: 'Tidak Boleh 0 (Nol)'
                        }
                    }
                },
                'ho_baru_kode_index_gangguan': {
                    validators: {
                        notEmpty: {
                            message: 'harus dipilih'
                        }
                    }
                },
                'ho_baru_kode_index_lokasi': {
                    validators: {
                        notEmpty: {
                            message: 'harus dipilih'
                        }
                    }
                },
                'ho_baru_kode_index_harga_dasar': {
                    validators: {
                        notEmpty: {
                            message: 'harus dipilih'
                        }
                    }
                }


                
                
            }
        });
    });
</script>
