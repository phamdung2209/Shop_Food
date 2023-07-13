<div id="popup-captcha" class="modal text-center">
    <div class="header">Cảnh báo</div>
    <div class="content">
        <p>Xin vui lòng check vào ô <b>Tôi không phải là người máy</b> để tiếp tục tính năng</p>
        <div class="form-group">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            <script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
        </div>
    </div>
    <div class="footer">
        <button type="submit" class="btn btn-pink js-submit-captcha">Xác nhận</button>
    </div>
</div>
