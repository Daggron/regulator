$(document).ready(function(){
    $("#gobutton").on('click',function(){
        var data = " ";
        var no = $("#noSubjects").val();
        var no = parseInt(no);
        for(var i=1;i<=no;i++){
            var data = data + "<div class='parsedData col-sm-offset-4 col-sm-4 col-xs-12'><h2>Subject " + i +" Details</h2><fieldset><input name='subjectname[]' class='form-control' type='text' placeholder='Subject Name*' required><input name='percent" + i +"' class='form-control minchk' type='number' placeholder='Minimum Attendace (in %) *'> <label class=' text-center color-shark'>&nbsp;Lecture Days</label> <div class='selectGroup'><input type='checkbox' name='s" + i +"day1' id='s" + i +"day1' class='css-checkbox' value='mon'><label for='s" + i +"day1' class='css-label'>Monday</label><br><input type='checkbox' name='s" + i +"day2' id='s" + i +"day2' class='css-checkbox' value='tues'><label for='s" + i +"day2' class='css-label'>Tuesday</label> <br> <input type='checkbox' name='s" + i +"day3' id='s" + i +"day3' class='css-checkbox' value='wed'><label for='s" + i +"day3' class='css-label'>Wednesday</label></div><div class='selectGroup pull-right'><input type='checkbox' name='s" + i +"day4' id='s" + i +"day4' class='css-checkbox' value='thurs'><label for='s" + i +"day4' class='css-label'>Thursday</label><br><input type='checkbox' name='s" + i +"day5' id='s" + i +"day5' class='css-checkbox' value='fri'><label for='s" + i +"day5' class='css-label'>Friday</label><br><input type='checkbox' name='s" + i +"day6' id='s" + i +"day6' class='css-checkbox' value='sat'><label for='s" + i +"day6' class='css-label'>Saturday</label></div></fieldset></div>";
        }
            data = data + "<div class='col-sm-offset-4 col-sm-4 col-xs-12'><button onClick='formsub()' id='submitButton' class='btn btn-slider ' type='submit'>Submit</button> </div>";
        $(".contentArea").html(data);
        });
    
    
    $(document).on('change','.minchk',function(){
      
        if($(".minchk").val()>100){
            
            alert("Percentage Can't be more than 100");
            
        }
        else if($(".minchk").val()<0){
             alert("Percentage Can't be negetive");
        }
        
    });
    $(document).on('change','#cd',function(){
        var selected = new Date($("#cd").val());
        var current = new Date();
        if(selected>current){
            alert("You can't select future commencement date");
        }
    });
    
});

function formsub(){
  document.getElementById('first_form').submit();
};
