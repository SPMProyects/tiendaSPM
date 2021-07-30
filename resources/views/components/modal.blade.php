<div class="modal fade" id="{{ $id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img class="w-50" src="{{ $image }}" alt="">
            <p>
                {{ $text }}
            </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"><a href="{{ $buttonLink }}">{{ $buttonText }}</a></button>
        </div>
      </div>
    </div>
  </div>