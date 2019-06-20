$(function() {
  // Multiple images preview in browser
  var imagesPreview = function(input, placeToInsertImagePreview) {

      if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();


              reader.onload = function(event) {
                  console.log(event);
                  var item = '<div class="uploadedImage"><img src="'+event.target.result+'"><input type="text" placeholder="Название (alt)" name="image[alt][]"><input type="text" placeholder="Заголовок (title)" name="images[title][]"><input type="text" placeholder="Описание (description)" name="images[descr][]"><input type="hidden" name="images[src][]" value="'+event.target.result+'"><a href="javascript:void(0);" class="btn btn-info btn-remove">Удалить</a></div>'

              reader.fileName = input.files[i].name;
              reader.onload = function(event, files_name) {
                  var item = '<div class="uploadedImage">' +
                      '<img src="'+event.target.result+'">' +
                      '<input type="text" placeholder="Название (alt)" name="images[alt][]">' +
                      '<input type="text" placeholder="Заголовок (title)" name="images[title][]">' +
                      '<input type="text" placeholder="Описание (description)" name="images[descr][]">' +
                      '<input type="hidden" name="images[src][]" value="'+event.target.result+'">' +
                      '<input type="hidden" name="images[name][]" value="'+this.fileName+'">' +
                      '<a href="javascript:void(0);" class="btn btn-info btn-remove">Удалить</a></div>'

                  $($.parseHTML(item)).appendTo(placeToInsertImagePreview);
                  $('.btn-remove').on('click', function () {	
                    $(this).closest('.uploadedImage').remove();
                  });
              };
              reader.readAsDataURL(input.files[i]);
          }
      }
  };

  $('#gallery-photo-add').on('change', function() {


      imagesPreview(this, 'div.gallery');
  });
  
});
