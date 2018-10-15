<!-- alert -->
@if (Session::get('alert'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Session::get('alert') ?>
    </div>
@endif
