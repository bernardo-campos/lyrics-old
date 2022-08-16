<div class="animate" id="MailPreviewDriverBox" style="
    position:absolute;
    top:10px;
    right:10px;
    z-index:99999;
    background:#fff;
    border:solid 1px #ccc;
    padding: 15px;
">
    Se ha enviado un email
    <ul>
        <li>
            <a style="text-decoration: underline" target="_blank" href="{{ $previewUrl }}&file_type=html">Visualizar en nueva pestaña</a>
        </li>
        <li>
            <a style="text-decoration: underline" href="{{ $previewUrl }}&file_type=eml">Abrir en cliente de email</a>
        </li>
    </ul>
    <span onclick="closePopup()" id="close" style="
           cursor: pointer;
           font-size: smaller;
           position: absolute;
           top: 2px;
           right: 6px;
           font-family: monospace;">X</span>
</div>
<script type="text/javascript">
    function closePopup() {
        document.body.removeChild(document.getElementById('MailPreviewDriverBox'));
    }
    @if($timeoutInSeconds)
        setTimeout(closePopup(), {{ $timeoutInSeconds }} * 1000);
    @endif
</script>
<style>
.animate {
  animation-duration: 0.6s;
  animation-name: animate-fade;
  animation-delay: 0.1s;
  animation-fill-mode: backwards;
}

@keyframes animate-fade {
  0% {opacity: 0;}
  100% {opacity: 1;}
}
</style>
