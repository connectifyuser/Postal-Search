(function(jq){
	"use strict";
	let postalSearch = {
		datatablObj:false,
		IntilizeDatatable: function(){
			jq('.postaltable').DataTable({
				 "bSort" : false
			});
		},

		SearchByPostCode: function(postCode){
			jq('#loaderimg').show();
			
			jq.ajax({
				url:'/search-postcode',
				type:'GET',
				data:{
					postcode: postCode,
				},
			    dataType: 'json',
			    success:function(res){
			    	jq('#loaderimg').hide();
					if ( jq.fn.DataTable.isDataTable('.postaltable') ) {
					  jq('.postaltable').DataTable().destroy();
					}
						jq('.postaltable tbody').empty();
				    	if (res.status == 'ok') {
				    		jq('.postal_data_main').show();
				    		jq('.postal-data').html(res.html);
				    		postalSearch.IntilizeDatatable();
				    	} else {
				    		jq('#loaderimg').hide();
				    		jq('.postal_data_main').hide();
				    		jq('.postal-data').html('');
				    		jq('.no_record').html(res.html);
				    	}
				    }
				});
			},
		}
	 	/*Events*/
		jq(document).ready(function(){
		 		jq('.search-btn').on('click', function(){
		 		let  postCode = jq.trim(jq('.post_code_inp').val());
		 		postalSearch.SearchByPostCode(postCode);
	 		});
	 		/*Events*/
	 	});
})(jQuery);