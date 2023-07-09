function init() {
  up.log.config.banner = false;
  up.log.enable();

  up.on('up:fragment:inserted', function () {
    $('[modal-backdrop]').remove();
  });

  $(document).on('click', '[data-modal-toggle]', function (evt) {
    evt.preventDefault();

    var modal = $(this).data('modalToggle');
    var type = $(this).data('type');
    var title = $('#'.concat(modal)).data('title');

    $('#'.concat(modal)).removeClass('hidden').addClass('justify-center items-center flex');
    $('body').append('<div modal-backdrop="" class="modal-backdrop"></div>');

    $('#'.concat(modal)).find('h3').html('Add '.concat(title));
    $('#'.concat(modal)).find('form').attr('action', window.location.href);
    $('#'.concat(modal)).find('input:not([name="is_required"])').val('');

    if (type === 'edit') {
      var data = $(this).data();
      var id = data.id;

      $('#'.concat(modal)).find('h3').html('Edit '.concat(title));
      $('#'.concat(modal)).find('form').attr('action', window.location.href.concat('/update/'.concat(id)));

      delete data.id;
      delete data.modalToggle;
      delete data.type;

      for (var item in data) {
        $('#'.concat(modal)).find(('input[name="'.concat(item)).concat('"]')).val(JSON.parse(data[item]));
      }
    }
  });

  $(document).on('click', '[data-modal-hide]', function (evt) {
    evt.preventDefault();

    var modal = $(this).data('modalHide');

    $('#'.concat(modal)).addClass('hidden').removeClass('justify-center items-center flex');
    $('[modal-backdrop]').remove();
  });

  $(document).on('click', '[data-delete-id]', function (evt) {
    evt.preventDefault();

    var id = $(this).data('deleteId');
    var href = $(this).data('href');

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
      if (result.isConfirmed) {
        up.render({ url: [href, id].join('/'), target: 'main' })
      }
    });
  });
}

window.addEventListener('DOMContentLoaded', init);
