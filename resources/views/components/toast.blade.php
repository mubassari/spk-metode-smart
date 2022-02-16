<div style="z-index: 3; position: fixed; right: 1rem; bottom: 0.5rem; width: 20rem;">
    <div aria-live="polite" aria-atomic="true" class="d-flex flex-column-reverse" style="position: relative;">
        <div class="toast bg-light mb-3">
            <div class="toast-header bg-{{ $status ?: 'primary' }}"></div>
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
