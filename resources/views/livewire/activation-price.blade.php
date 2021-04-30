<div>
    <h4>Account activation price(₦)</h4>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">₦</span>
        </div>
        <input type="number" class="form-control" min="200" placeholder="Activation price(₦)" wire:model="setting.activation_price">
    </div>
</div>
@section('js')
<script>
Livewire.on('save', () => {
    // toastr.success('updated activation price');
    alert('afa');
});
</script>

@endsection