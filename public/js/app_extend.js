function readURL(input) {
       if (input.files && input.files[0]) {

         if(input.files[0].size <= 1000000){
           var reader = new FileReader();
           reader.onload = function (e) {
               $('#icone')
                   .attr('src', e.target.result);
           };
           reader.readAsDataURL(input.files[0]);
         }else{
           var botaoBrowse =  document.getElementsByClassName("botaoBrowse");
           botaoBrowse.files[0] = null;

         }

       }
   }
