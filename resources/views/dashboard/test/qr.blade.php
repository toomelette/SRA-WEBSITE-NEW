<div class="visible-print text-center">
    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate(Request::url()); !!}
    <p>Scan me to return to the original page.</p>
</div>