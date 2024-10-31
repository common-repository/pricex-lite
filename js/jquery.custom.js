(function( $ ) {
    $(function() {
         
        // Add Color Picker to all inputs that have 'color-field' class
        $( '.cpa-color-picker' ).wpColorPicker();
         
    });
	
	// shortcode generator
	
	$('.show_sc').on( "click", function (){
		var tbl = $('#tabl_select').val();
		var post_num = $('#post_num').val();
		var post_cat = $('#post_cat').val();
		if( !(tbl == '' || post_num == '' || post_cat == '') ){
			$('#show-shortcode').html('<div clas="show-shortcode">[pricex-table table="'+tbl+'" num="'+post_num+'" cat="'+post_cat+'"]</div>');
		}else{
			alert(' Please don\'t empty any field ');	
		}
		
	});
	
})( jQuery );