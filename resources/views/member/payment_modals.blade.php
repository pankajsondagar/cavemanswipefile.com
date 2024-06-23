<div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{ route('confirm.payment') }}">
        @csrf
        <input type="hidden" value="{{ $adminId->id }}" name="sponser_id"/>
        <input type="hidden" value="{{ $authMember->id }}" name="user_id"/>
        <input type="hidden" value="1" name="type"/>
        <input type="hidden" name="leader_id" value="{{ $plan->id }}"/>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">{{ $manualPayment->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $content !!}
            </br>
            <div class="row">
                <div class="col-md-6">
                    <textarea class="form-control" name="message" rows="3"></textarea>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm Payment</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="scrollmodal2" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{ route('confirm.payment') }}">
        @csrf
        <input type="hidden" value="{{ @$firstSponser->id }}" name="sponser_id"/>
        <input type="hidden" value="{{ @$authMember->id }}" name="user_id"/>
        <input type="hidden" value="2" name="type"/>
        <input type="hidden" name="leader_id" value="{{ $plan->id }}"/>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">{{ @$firstSponserManualPayment->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $content2 !!}
            </br>
            <div class="row">
                <div class="col-md-6">
                    <textarea class="form-control" name="message" rows="3"></textarea>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm Payment</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="scrollmodal3" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{ route('confirm.payment') }}">
        @csrf
        <input type="hidden" value="{{ @$secondSponser->id }}" name="sponser_id"/>
        <input type="hidden" value="{{ @$authMember->id }}" name="user_id"/>
        <input type="hidden" value="3" name="type"/>
        <input type="hidden" name="leader_id" value="{{ $plan->id }}"/>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">{{ @$secondSponserManualPayment->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $content3 !!}

            </br>
            <div class="row">
                <div class="col-md-6">
                    <textarea class="form-control" name="message" rows="3"></textarea>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm Payment</button>
            </div>
        </div>
        </form>
    </div>
</div>