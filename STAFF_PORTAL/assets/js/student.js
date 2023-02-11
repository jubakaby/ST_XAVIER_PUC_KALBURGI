

$(document).ready(function(){



	jQuery(document).on("click", ".deleteStudent", function(){
			var row_id = $(this).data("row_id"),
				hitURL = baseURL + "deleteStudent",
				currentRow = $(this);

			var confirmation = confirm("Are you sure to delete this Student ?");

			if(confirmation)
			{
				jQuery.ajax({
				type : "POST",
				dataType : "json",
				url : hitURL,
				data : { row_id : row_id } 
				}).done(function(data){

					currentRow.parents('tr').remove();
					if(data.status = true) { alert("Student successfully deleted"); }
					else if(data.status = false) { alert("Student deletion failed"); }
					else { alert("Access denied..!"); }
				});
			}

		});

    

    

});