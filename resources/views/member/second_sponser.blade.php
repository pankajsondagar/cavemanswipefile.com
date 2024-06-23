@if(@$secondSponserPayment) 
    @if($secondSponserPayment->is_confirm)
        <span class="text-success mt-4">Paid</span>
    @elseif($secondSponserPayment->is_declined)
        <span class="text-danger mt-4">Declined</span>
    @else 
        <span class="text-warning mt-4">Waiting For Confirmation</span>
    @endif
@else 
    @if(@$adminPayment->is_confirm)
        <button type="button" class="openPopup btn btn-success btn-sm mt-4" data-toggle="modal" data-target="#scrollmodal3">
            Make Payment 
        </button>
    @else 
        <span class="text-warning mt-4">-</span>
    @endif
@endif