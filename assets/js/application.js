/*
$(function checkAll(){
  $('.table-checkable th .checkall').click(function () {  	
		$(this).parents('table').find('td').find(':checkbox').attr('checked', this.checked);
	});
}); */


$(function setDeleteButton(){
    if($('table.table-data').find(':checkbox').is(':checked')){
    	
        $('.panel .btn:contains("Delete")').removeClass('disabled');
    } else {
        $('.panel .btn:contains("Delete")').addClass('disabled');
    }  
    $('table.table-data').find(':checkbox').change(function(){
        if($('table.table-data').find(':checkbox').is(':checked')){
            $('.panel .btn:contains("Delete")').removeClass('disabled');
        } else {
            $('.panel .btn:contains("Delete")').addClass('disabled');
        }  
    });    
    $('.panel .btn:contains("Delete")').attr('onClick','').click(function(){
        if($('table.table-data').find(':checkbox').is(':checked')){
            var url = $(this).attr('data-url');
            deleteTrue(url);
            return false;
        } else {
            alert('Silahkan pilih data yang akan dihapus terlebih dahulu!');
            return false;
        }    
   }); 
});
function deleteTrue(turl){
    var jawab = confirm("Anda yakin akan menghapus data terpilih ?");
    if (jawab) {
    	$.ajax({
            url: turl,
            type: 'post',
            data: $('.formdata').serialize()
        }).done(function() {
        	location.reload();
        });
    }
    else {
    	alert('no');
    }
}
