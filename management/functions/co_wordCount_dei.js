$(document).ready(function(){
  $('.co_form_dei').on('input',function(){
    var minMax=$(this).attr('id');
    var minMax=minMax.split("-");
    var min=minMax[0];
    var max=minMax[1];
    //checks in min amd max limits are set for the field
    if(minMax){
      var input=$(this).val();
      var letter_count=input.length;
          var wordAlert=letter_count+' characters'+' (minimum '+min+' maximum '+max+')';

          //limit user input
          $(this).attr('maxlength', max);
          //updates the nearest word count field
          $(this).next('#wordAlert').text(wordAlert);

          //removes wordcount when mouseleaves
          $(this).on('blur',function(){
            $(this).next('#wordAlert').text('');
          });

    }

  });
});
