<div style="z-index: 3; position: absolute; right:1rem;">
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast bg-light">
            <div class="toast-header bg-success"></div>
            <div class="toast-body ">
                {{ html_entity_decode($message) }}
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function(){
        $('.toast').toast({autohide: true, delay: 2500});
        $('.toast').toast('show');
    });
</script>
@endpush
