(function () {
  'use strict'

  feather.replace()

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  });

  // slug generator
  const TITLE = $('#title');
  const SLUG = $('#slug');
  TITLE.on('change', function() {
      fetch('/dashboard/posts/checkSlug?title=' + TITLE.val())
          .then(response => response.json())
          .then(data => SLUG.val(data.slug));
  });

  // post image upload
  $('#image').on('change', function(e) {
      const IMAGE_PREVIEW = $('.img-preview');
      IMAGE_PREVIEW.addClass('d-block');

      let file = this.files[0];
      
      if (file) {
          const oFReader = new FileReader();
          oFReader.onload = function(oFREvent) {
              IMAGE_PREVIEW.attr('src', oFREvent.target.result);
          }
          oFReader.readAsDataURL(file);
      }

  });
})()
