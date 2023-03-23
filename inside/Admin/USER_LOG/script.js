

 var data='';
  var action = '';
  var savebutton = "<input type='button'   class='ajaxsave w3-button w3-green w3-round-large w3-hover-blue-grey' value='Save'>";
  var updatebutton = "<input type='button' class='ajaxupdate w3-button w3-green w3-round-large w3-hover-blue-grey' value='Update'>";
  var cancel = "<input type='button' class='ajaxcancel w3-button w3-red w3-round-large w3-hover-blue-grey' class='btn btn-danger' value='Cancel'>";
  var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
   var pre_tds; 
   var disarr=new Array('disabled','','','');
var field_arr = new Array('text','text');
  var field_pre_text= new Array('','Branch name');
  var field_name = new Array('','branch'); 
 $(function(){
 $.ajax({
	     url:"BRANCHDbManipulate.php",
                  type:"POST",
                  data:"actionfunction=showData",
        cache: false,
        success: function(response){
		 
		  $('#demoajax').html(response);
		  createInput();
		  
		}
		
	   });
 
  
 $('#demoajax').on('click','.ajaxsave',function(){
     
	   var name =  $("input[name='"+field_name[1]+"']");
	  
	   //var branch =$("input[name='"+field_name[2]+"']");
	   //var username = $("input[name='"+field_name[3]+"']");
	  // var password = $("input[name='"+field_name[4]+"']");
	   if(validate(name)){
	   data = "name="+name.val()+"&actionfunction=saveData";
       $.ajax({
	     url:"BRANCHDbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });
      }	
      else{
	   return;
	  }	  
	   });
 $('#demoajax').on('click','.ajaxedit',function(){
      var edittrid = $(this).parent().parent().attr('id');
    	var tds = $('#'+edittrid).children('td');
        var tdstr = '';
		var td = '';
		pre_tds = tds;
		for(var j=0;j<field_arr.length;j++){
		   
		    tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"' "+disarr[j]+"></td>";
			 
		
	  

			 
		  }
		  tdstr+="<td>"+updatebutton +" " + cancel+"</td>";
		  $('#createinput').remove();
		  $('#'+edittrid).html(tdstr);
	   });
	   
	   $('#demoajax').on('click','.ajaxupdate',function(){
       var edittrid = $(this).parent().parent().attr('id');
	  var bi =  $("input[name='"+field_name[0]+"']");
	   var bn = $("input[name='"+field_name[1]+"']");
	
	 if(validate(bi,bn)){
	  data = "bii="+bi.val()+"&bnn="+bn.val()+"&editid="+edittrid+"&actionfunction=updateData";
       $.ajax({
	     url:"BRANCHDbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });
}
else{
return;
}	   
	   });
	   	   $('#demoajax').on('click','.ajaxdelete',function(){
       var edittrid = $(this).parent().parent().attr('id');
	   
	   data = "deleteid="+edittrid+"&actionfunction=deleteData";
       $.ajax({
	     url:"BRANCHDbManipulate.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#demoajax').html(response);
		  createInput();
		     }
		}
		
	   });	   
	   });
 $('#demoajax').on('click','.ajaxcancel',function(){
      var edittrid = $(this).parent().parent().attr('id');
	  
        $('#'+edittrid).html(pre_tds);
		createInput();
	   });	   
	   });
	   
 function createInput(){
  var blankrow = "<tr id='createinput'>";   
  for(var i=1;i<field_arr.length;i++){
	  
	
	  blankrow+= "<td class='ajaxreq'><input type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[i]+"' id='other-long-box' /></td>";
	 
	  

	}
	blankrow+="<td class='ajaxreq'>"+savebutton+"</td></tr>";
  $('#demoajax').append(blankrow);	
  }
function validate(fname,lname,domain,email){
var contact = jQuery('input[name=contact]');
		
		
	
		return true;
		
}
