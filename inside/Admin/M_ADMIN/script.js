















 var data='';
  var action = '';
  var savebutton = "<input type='button'   class='ajaxsave w3-button w3-green w3-round-large w3-hover-blue-grey' value='Save'>";
  var updatebutton = "<input type='button' class='ajaxupdate w3-button w3-green w3-round-large w3-hover-blue-grey' value='Update'>";
  var cancel = "<input type='button' class='ajaxcancel w3-button w3-red w3-round-large w3-hover-blue-grey' class='btn btn-danger' value='Cancel'>";
  var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
   var pre_tds; 
var field_arr = new Array('text','text','text','text','text');
  var field_pre_text= new Array('Enter Fullname','Email','Branch ID','username','Default pw:cadd');
  var field_name = new Array('name','email','branch','Username','password'); 
    var di = new Array('','','','disabled','disabled'); 
    var wsize = new Array('','','5','10','25'); 
 $(function(){
 $.ajax({
	     url:"DbManipulate.php",
                  type:"POST",
                  data:"actionfunction=showData",
        cache: false,
        success: function(response){
		 
		  $('#demoajax').html(response);
		  createInput();
		  
		}
		
	   });
 
  
 $('#demoajax').on('click','.ajaxsave',function(){
     var retVal = confirm("Do you really want to Insert ?");
               if( retVal == true ){
	   var name =  $("input[name='"+field_name[0]+"']");
	   var email = $("input[name='"+field_name[1]+"']");
	   var branch =$("input[name='"+field_name[2]+"']");
	   var username = $("input[name='"+field_name[3]+"']");
	   var password = $("input[name='"+field_name[4]+"']");
	   if(validate(name,email,branch,username,password)){
	   data = "name="+name.val()+"&em="+email.val()+"&brnc="+branch.val()+"&un="+username.val()+"&pass="+password.val()+"&actionfunction=saveData";
       $.ajax({
	     url:"DbManipulate.php",
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
			 
		 if(j!=2){
	   
			   if(j==4){
				   
				    tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='' placeholder='Enter your new password' id='other-box'></td>";
			   }else{
				   
				   tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"' id='other-box'></td>";
			   }
	   
	  }else if(j=2){
		 //tdstr += "<div class='frmSearch'>";
		   tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"' id='search-box' onkeypress='myFunction()'></td>";
	 //tdstr +=  "<div id='suggesstion-box'></div></div>";
	  }
	  

			 
		  }
		  tdstr+="<td>"+updatebutton +" " + cancel+"</td>";
		  $('#createinput').remove();
		  $('#'+edittrid).html(tdstr);
	   });
	   
	   $('#demoajax').on('click','.ajaxupdate',function(){
		     var retVal = confirm("Do you really want to Update?");
               if( retVal == true ){
       var edittrid = $(this).parent().parent().attr('id');
	  var name =  $("input[name='"+field_name[0]+"']");
	   var email = $("input[name='"+field_name[1]+"']");
	   var branch =$("input[name='"+field_name[2]+"']");
	   var username = $("input[name='"+field_name[3]+"']");
	   var password = $("input[name='"+field_name[4]+"']");
	 if(validate(name,email,branch,username,password)){
	  data = "name="+name.val()+"&em="+email.val()+"&brnc="+branch.val()+"&un="+username.val()+"&pass="+password.val()+"&editid="+edittrid+"&actionfunction=updateData";
       $.ajax({
	     url:"DbManipulate.php",
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
       var edittrid = $(this).parent().parent().attr('id');
	   
	   data = "deleteid="+edittrid+"&actionfunction=deleteData";
       $.ajax({
	     url:"DbManipulate.php",
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
 
  }
function validate(fname,lname,domain,email){
var contact = jQuery('input[name=contact]');
		
		
	
		return true;
		
}
