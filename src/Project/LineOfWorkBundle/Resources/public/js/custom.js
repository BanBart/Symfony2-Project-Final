function commercial(){

    $.post(Routing.generate('project_line_of_work_commercial'),function(data){
       $('.advertisement-block div').animate({'opacity': '0'},500,function(){
           $('.advertisement-block div').html(data).css('opacity','0').animate({'opacity':'1'},1000); 
       }); 
    });
   }


$(document).ready(function(){
    
    
    setInterval(commercial, 10000);

  
});
    
