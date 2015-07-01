
/**
 *
 * code untuk mendisable enter key pada form agar tidak meng submit form
 */
$('form').bind("keypress", function(e) {
  if (e.keyCode == 13) {               
    e.preventDefault();
    return false;
  }
});


function tambahDate(date1,date2)
{
	 date1=parseInt(date1.parse(date1),10);
	 date2=parseInt(date1.parse(date2),10);
	 var result=date1 + date2;
	 
	 return result;
}

function dateToInputFormat(dateObj){
	var dateString = dateObj.getFullYear() + '/'
                    + ('0' + dateObj.getMonth()).slice(-2) + '/'
                    + ('0' + dateObj.getDate()).slice(-2) ;
                    
    return dateString;
}

function load_combo_kel(id_element_kec, id_element_kel){

	var value_id_element_kec = $(id_element_kec).val();
	console.log(value_id_element_kec);

    $.ajax({
        url: '<?php echo site_url("c_ajax/load_kel") ?>/' + value_id_element_kec,
        success: function(data) {
            $(id_element_kel).html(data);
        }
    });
}

function get_status_modal_perusahaan(nilai_modal){

    var status_perusahaan;

    if(nilai_modal < 51000000){
        status_perusahaan = 'M';
    }else if (nilai_modal < 501000000) {
        status_perusahaan = 'PK';
    }else if (nilai_modal < 10100000000) {
        status_perusahaan = 'PM';
    }else{
        status_perusahaan = 'PB';
    }

    return status_perusahaan;
}





