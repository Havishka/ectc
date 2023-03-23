 var data='';
  var action = '';
  var savebutton = "<input type='button'   class='ajaxsave w3-button w3-green w3-round-large w3-hover-blue-grey' value='Save'>";
  var updatebutton = "<input type='button' class='ajaxupdate w3-button w3-green w3-round-large w3-hover-blue-grey' value='Update'>";
  var cancel = "<input type='button' class='ajaxcancel w3-button w3-red w3-round-large w3-hover-blue-grey' class='btn btn-danger' value='Cancel'>";
  var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
   var pre_tds; 
var field_arr = new Array('text','text','text','text');
var disarr=new Array('disabled','','','');


var disarr=new Array('disabled','','','');
  var field_pre_text= new Array('Auto Incriment ++','Course name','Course Fee','Duration in months');
  var field_name = new Array('','cname','cf','cd'); 
  
  
   var field_ins = new Array('','first','second','third'); 
    var field_insplace = new Array('','First installement','Second installement','Third installement'); 
	
	
	
  var installm = new Array('text','text','text'); 
 $(function(){
 $.ajax({
	     url:"COURSEDbManipulate.php",
                  type:"POST",
                  data:"actionfunction=showData",
        cache: false,
        success: function(response){
		 
		  $('#demoajax').html(response);
		  createInput();
		  
		}
		
	   });
 
  
 $('#demoajax').on('click','.ajaxsave',function(){
     
	 
	  var retVal = confirm("Do you want to add ?");
               if( retVal == true ){
	 
	   var cnamex =  $("input[name='"+field_name[1]+"']");
	   var cfx = $("input[name='"+field_name[2]+"']");
	   var cdx =$("input[name='"+field_name[3]+"']");
	 
	 
	 //installemnt
	 
	    var f =  $("input[name='"+field_ins[1]+"']");
	   var s = $("input[name='"+field_ins[2]+"']");
	   var t =$("input[name='"+field_ins[3]+"']");
	   
	   
	   
	   if(validate(cnamex))
	   {
	   data = "cname="+cnamex.val()+"&cf="+cfx.val()+"&cd="+cdx.val()+"&fi="+f.val()+"&si="+s.val()+"&ti="+t.val()+"&actionfunction=saveData";
       $.ajax({
	     url:"COURSEDbManipulate.php",
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
		   
		    // tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
		
	   tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"' id='other-box' "+disarr[j]+"></td>";
	
 
		  }
		  tdstr+="<td>"+updatebutton +" " + cancel+"</td>";
		  $('#createinput').remove();
		  $('#'+edittrid).html(tdstr);
	   });
	   
	   $('#demoajax').on('click','.ajaxupdate',function(){
		   
		   var retVal = confirm("Do you really want to Update?");
               if( retVal == true ){
       var edittrid = $(this).parent().parent().attr('id');
	 var cnamex =  $("input[name='"+field_name[1]+"']");
	   var cfx = $("input[name='"+field_name[2]+"']");
	   var cdx =$("input[name='"+field_name[3]+"']");
	 if(validate(cnamex)){
	  data = "cname="+cnamex.val()+"&cf="+cfx.val()+"&cd="+cdx.val()+"&editid="+edittrid+"&actionfunction=updateData";
       $.ajax({
	     url:"COURSEDbManipulate.php",
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

 }
else{
return;
}	   
	   });
	   	   $('#demoajax').on('click','.ajaxdelete',function(){
			   
			   var retVal = confirm("Do you really want to delete ?");
               if( retVal == true ){
                 //document.write ("User wants to continue!");
				  var edittrid = $(this).parent().parent().attr('id');
	   
							   data = "deleteid="+edittrid+"&actionfunction=deleteData";
							   $.ajax({
								 url:"COURSEDbManipulate.php",
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
                  return true;
               }
               else{
                  //document.write ("User does not want to continue!");
                  return false;
               }
			   
       
	   });
 $('#demoajax').on('click','.ajaxcancel',function(){
      var edittrid = $(this).parent().parent().attr('id');
	  
        $('#'+edittrid).html(pre_tds);
		createInput();
	   });	   
	   });
	   
 function createInput(){
  var blankrow = "<tr id='createinput'>";   
  for(var i=0;i<field_arr.length;i++){
	  
	
		//  blankrow+= "<td class='ajaxreq' ><input type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[i]+"' id='other-box' /></td>";
	

	 blankrow+= "<td class='ajaxreq' ><input type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[i]+"' id='other-box' "+disarr[i]+"/><br><br><input type='"+field_arr[i]+"' name='"+field_ins[i]+"' placeholder='"+field_insplace[i]+"' id='other-box' "+disarr[i]+"/></td>";
	

	}
	blankrow+="<td class='ajaxreq'>"+savebutton+"</td></tr>";
  $('#demoajax').append(blankrow);	
  }
function validate(fname,lname,domain,email){
var contact = jQuery('input[name=contact]');
		
		
	
		return true;
		
}
