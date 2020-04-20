<!-- BEGIN: Footer-->
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; 2020 <a href="https://github/soffandluffy"
          target="_blank">SABO</a> All rights reserved.
      </span>
      <span class="right hide-on-small-only">
        Design and Developed by <a href="https://github/soffandluffy">SABO</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->