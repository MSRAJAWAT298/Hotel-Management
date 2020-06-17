$(document).ready(function(){
	var flag=true;
	$("#myForm").submit(function(event){

		if($("#bname").val()=="")
		{ 
			$("#error1").text("Enter Hotel name");
			flag=false;  
		}
		else
		{
			flag=true;
			$("#error1").text("");
		}


		if($("#location").val()=="")
		{ 
			$("#error_location").text("Select Hotel industry");
			flag=false;  
		}
		else
		{
			flag=true;
			$("#error_location").text("");
		}

		if($("#room_type").val()=="")
		{ 
			$("#error_cat").text("Select room_type");
			flag=false;  
		}
		else
		{
			flag=true;
			$("#error_cat").text("");
		}
		

		if($("#room_number").val()=="")
		{ 
			$("#error_room_number").text("Enter number of rooms");
			flag=false;  
		}
		else
		{
			flag=true;
			$("#error_room_number").text("");
		}
		
		if($("#rating").val()=="")
		{ 
			$("#error_rating").text("Enter Select rating");
			flag=false;  
		}
		else
			{
				flag=true;
				$("#error_rating").text("");
			}

		if($("#date").val()=="")
		{ 
			$("#error_date").text("Enter Register date ");
			flag=false;  
		}
		else
			{
				flag=true;
				$("#error_date").text("");
			}

		if($("#summary").val()=="")
		{ 
			$("#error_summary").text("Enter Hotel sort description");
			flag=false;  
		}
		else
			{
				flag=true;
				$("#error_summary").text("");
			}

		if($("#details").val()=="")
			{
				$("#error_details").text("Enter Hotel description");
				flag=false;  
			}
			else
				{
					flag=true;
					$("#error_details").text("");
				}
				//console.log(flag);
				//alert("testing");
				if(flag==false){event.preventDefault();}
	});

$('#submit').click(function(){
	// alert("testing");
	if($("#file-input").val()=="")
	{ 
		$("#error_img1").text("Please Upload small pic");
		flag=false; 		  
	}
	else
	{
		flag=true;
		$("#error_img1").text("");
	}
	
	if($("#file-input2").val()=="")
	{ 
		$("#error_img2").text("Please Upload Large Image ");
		flag=false;  
	}
	else
		{
			flag=true;
			$("#error_img2").text("");
		}
	});
});
