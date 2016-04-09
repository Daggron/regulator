$(document).ready(function(){
   $("#login_pop").click(function(){
        $(".login_box").slideToggle(700); 
        $("#login_pop").fadeToggle(-100);
        $("#cross").fadeToggle(-10);
   }); 
    
    $("#register_button").click(function(){
        $(".register_box").slideToggle(700);
        $(".login_box").slideToggle(200);
    })
    $("#login_button_r").click(function(){
       $(".register_box").slideToggle(200);
       $(".login_box").slideToggle(700); 
    });
    $("#cross").click(function(){
       $(".box").slideUp(700); 
       $("#login_pop").fadeToggle(-100);
       $("#cross").fadeToggle(-100);
    });
    
});
function email_val_l(){
    var l_email=document.getElementById('l_email').value;
    var indexofat=l_email.lastIndexOf('@');
    var indexofdot=l_email.lastIndexOf('.');
    if((indexofat<0)||(indexofat>indexofdot))
    {
        document.getElementById('l_email_error').style.display="block";
        return false
    }
        else{
            document.getElementById('l_email_error').style.display="none";
            document.login_form.submit();
    }
};
var namechk=0,mobchk=0,emailchk=0,passmatch=0;
function name_char_check(){
    var name=document.getElementById('name').value;
    var chars = /^[a-zA-Z-, ]+$/; 
        if(!name.match(chars)){
            document.getElementById('chars_invalid').style.display="block";  
            return false
        }
        else{
            document.getElementById('chars_invalid').style.display="none";
            namechk=1;
            return true
        }
    
};
function mob_val(){
    var mob = document.getElementById('mob').value;
    var chars = /^[0-9]+$/;
    if((mob.length<10)||(mob.length>10))
         {
		   document.getElementById('r_mobile_error').style.display="block";
		   return false
			}
    else if(!mob.match(chars))
		{
		   document.getElementById('r_mobile_error').style.display="block";
		   return false
			}
    else {
		   document.getElementById('r_mobile_error').style.display="none";
            mobchk=1;
		   return true
			}
    
}
function email_val_r(){
    var r_email=document.getElementById('r_email').value;
    var indexofat=r_email.lastIndexOf('@');
    var indexofdot=r_email.lastIndexOf('.');
    if((indexofat<0)||(indexofat>indexofdot))
    {
        document.getElementById('r_email_error').style.display="block";
        return false
    }
        else{
            document.getElementById('r_email_error').style.display="none";
            emailchk=1;
            return true
    }
};
function pass_match(){
    var pass=document.getElementById('pass').value;
    var cpass=document.getElementById('cpass').value;
    if(pass!=cpass){
        document.getElementById('password_mismatch').style.display="block";
        return false
    }
    else{
        document.getElementById('password_mismatch').style.display="none";
        passmatch=1;
        return true
    }
};
function final_val(){
    if(namechk&&mobchk&&emailchk&&passmatch){
        document.getElementById('register_form').submit();
    }
};
function r_process(){
  if((namechk=0)||(mobchk=0)||(emailchk=0)||(passmatch=0)){
      return false
  }
  else{
      document.register_form.submit();
  }
};

