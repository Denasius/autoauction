$(function() {
    // Multiple images preview in browser
    function imagesPreview(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (var i = 0; i < filesAmount; i++) {
                var parth = upload_image(input.files[i],'lots', true);
                if (parth) {
                    console.log(parth);
                    $('.gallery.gallery__images').append('<div class="uploadedImage">' +
                        '<div class="img">' +
                        '<img src="/' +parth + '"></div>' +
                        '<input type="text" placeholder="Название (alt)" name="images[alt][]">' +
                        '<input type="text" placeholder="Заголовок (title)" name="images[title][]">' +
                        '<input type="text" placeholder="Описание (description)" name="images[descr][]">' +
                        '<input type="hidden" name="images[src][]" value="' + parth + '">' +
                        '<a href="javascript:void(0);" class="btn btn-info btn-remove">Удалить</a></div>');
                }
            }
        }
    }
    $('#gallery-photo-add').on('change', function () {
        imagesPreview(this, 'div.gallery');
    });
});
//Загрузка файлов, функция вернет урл до картинки который положила на сервер
function upload_image(image, folder = false, seo_url = false) {
    //Собираем данные
    var parth = false;
    var form_data = new FormData();
    form_data.append('file', image);
    if (folder) form_data.append('folder', folder);
    if (seo_url) form_data.append('seo_url', seo_url);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('meta[name="upload_image"]').attr('content'),
        data: form_data,
        dataType: 'text',
        cache: false,
        async: false,
        contentType: false,
        processData: false,
        type: 'post',
        success: function (result) {
            parth = result;
        }
    });
    return parth;
}